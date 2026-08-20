<?php

namespace Tests\Feature;

use App\Models\Maestro;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherRoleAccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Las vistas del proyecto usan el directivo @vite, que en entorno de
     * testing necesita el manifest de assets. Como no hay compilación de
     * Vite disponible, se deshabilita Vite para que renderice sin assets.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    /**
     * Un invitado (no autenticado) es redirigido al login al intentar
     * acceder a la gestión de maestros.
     */
    public function test_guest_is_redirected_to_login_for_admin_maestros(): void
    {
        $response = $this->get(route('admin.maestros'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Un usuario con rol "docente" NO puede acceder a la gestión de
     * maestros (recibe 403).
     */
    public function test_docente_receives_403_for_admin_maestros(): void
    {
        $docente = User::factory()->create(['role' => 'docente']);

        $response = $this->actingAs($docente)->get(route('admin.maestros'));

        $response->assertStatus(403);
    }

    /**
     * Un usuario con rol "admin" SÍ puede acceder a la gestión de maestros.
     */
    public function test_admin_can_access_admin_maestros(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get(route('admin.maestros'));

        $response->assertStatus(200);
    }

    /**
     * Un administrador NO puede acceder al panel de docente (recibe 403).
     */
    public function test_admin_receives_403_for_docente_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get(route('docente.dashboard'));

        $response->assertStatus(403);
    }

    /**
     * Un usuario con rol "docente" que tiene su registro de maestro
     * asociado SÍ puede acceder al panel de docente.
     */
    public function test_docente_with_maestro_record_can_access_docente_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'docente']);

        Maestro::create([
            'user_id'  => $user->id,
            'nombre'   => 'Carlos',
            'apellido' => 'Pérez',
            'codigo'   => 'CP001',
            'activo'   => true,
        ]);

        $response = $this->actingAs($user)->get(route('docente.dashboard'));

        $response->assertStatus(200);
    }

    /**
     * Un usuario con rol "alumno" NO puede acceder ni a la gestión de
     * maestros ni al panel de docente (recibe 403 en ambos).
     */
    public function test_alumno_receives_403_for_admin_and_docente_routes(): void
    {
        $alumno = User::factory()->create(['role' => 'alumno']);

        $this->actingAs($alumno)->get(route('admin.maestros'))->assertStatus(403);
        $this->actingAs($alumno)->get(route('docente.dashboard'))->assertStatus(403);
    }
}
