<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Maestro;
use App\Models\Alumno;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    $userId = Auth::id();
    $esDocente = Maestro::where('user_id', $userId)->exists();
    $esAlumno = Alumno::where('user_id', $userId)->exists();

    if ($esDocente) {
        return redirect()->intended(route('docente.notas'));
    }

    if ($esAlumno) {
        return redirect()->intended(route('alumno.dashboard'));
    }

    return redirect()->intended(route('dashboard'));
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
