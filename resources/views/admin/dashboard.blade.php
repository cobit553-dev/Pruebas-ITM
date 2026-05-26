<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ADMINISTRADOR - DASHBOARD --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'dashboard'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ADMIN: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#ffffff;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#ef4444; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#1f2937;">Panel de Administración</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">Gestión del sistema ITM Aguilares</p>
                </div>
            </div>
            <span style="font-size:12px; color:#6b7280;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: TARJETAS DE RESUMEN --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:16px; margin-bottom:24px;">

                {{-- Tarjeta: Usuarios --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,.1);">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; display:flex; align-items:center; justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <a href="{{ route('admin.usuarios') }}" style="color:#1d4ed8; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">0</p>
                    <p style="font-size:12px; color:#6b7280; margin:4px 0 0;">Usuarios registrados</p>
                </div>

                {{-- Tarjeta: Cursos --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,.1);">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#b45309" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
                        </div>
                        <a href="{{ route('admin.cursos') }}" style="color:#b45309; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">0</p>
                    <p style="font-size:12px; color:#6b7280; margin:4px 0 0;">Cursos activos</p>
                </div>

                {{-- Tarjeta: Docentes --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,.1);">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:#e0e7ff; display:flex; align-items:center; justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#4f46e5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <a href="{{ route('admin.docentes') }}" style="color:#4f46e5; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">0</p>
                    <p style="font-size:12px; color:#6b7280; margin:4px 0 0;">Docentes</p>
                </div>

                {{-- Tarjeta: Reportes --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,.1);">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; display:flex; align-items:center; justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="12" y1="2" x2="12" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <a href="{{ route('admin.reportes') }}" style="color:#16a34a; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">0</p>
                    <p style="font-size:12px; color:#6b7280; margin:4px 0 0;">Reportes generados</p>
                </div>

            </div>

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: BIENVENIDA --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:24px;">
                <h3 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 12px;">Bienvenido al Panel de Administración</h3>
                <p style="font-size:14px; color:#6b7280; margin:0;">Desde aquí puedes gestionar todos los aspectos del sistema:</p>
                <ul style="font-size:13px; color:#6b7280; margin:16px 0 0; padding-left:20px;">
                    <li style="margin-bottom:8px;">Administrar usuarios, docentes y alumnos</li>
                    <li style="margin-bottom:8px;">Crear y gestionar cursos</li>
                    <li style="margin-bottom:8px;">Generar reportes del sistema</li>
                    <li style="margin-bottom:8px;">Configurar parámetros del sistema</li>
                </ul>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
