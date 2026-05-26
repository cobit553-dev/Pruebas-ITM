<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITM — Iniciar sesión</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- ===== LADO IZQUIERDO ===== --}}
    <div class="hidden md:flex w-1/2 flex-col items-center justify-center gap-6 px-12" style="background:#0d2e4d;">

        {{-- Logo --}}
        <div class="w-36 h-36 rounded-full bg-white flex items-center justify-center flex-shrink-0" style="border: 4px solid #f59e0b;">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="Logo ITM" class="w-28 h-28 object-contain rounded-full">
        </div>

        {{-- Nombre institución --}}
        <div class="text-center">
            <p class="text-white font-semibold text-xl leading-snug">Instituto de Computación<br>de Aguilares</p>
            <p class="text-sm mt-1" style="color:#6b9cc2;">Sistema de Gestión Académica</p>
        </div>

        {{-- Línea dorada --}}
        <div class="w-10 h-0.5 rounded" style="background:#f59e0b;"></div>

        <p class="text-sm text-center max-w-xs leading-relaxed" style="color:#4a7a9b;">
            Administración de alumnos, maestros, notas y pagos en un solo lugar.
        </p>

    </div>

    {{-- ===== LADO DERECHO ===== --}}
    <div class="flex-1 flex flex-col items-center justify-center px-8 md:px-16 bg-white">

        {{-- Logo pequeño visible en móvil --}}
        <div class="flex md:hidden items-center gap-3 mb-8">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" class="w-10 h-10 rounded-xl object-cover">
            <div>
                <p class="font-semibold text-sm text-gray-800">I.T.M.</p>
                <p class="text-xs text-gray-400">Inst. Comp. Aguilares</p>
            </div>
        </div>

        <div class="w-full max-w-sm">

            <div class="mb-7">
                <h2 class="text-2xl font-semibold text-gray-800">Bienvenido</h2>
                <p class="text-sm text-gray-400 mt-1">Ingresa tus credenciales para continuar</p>
            </div>

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200">
                    @foreach ($errors->all() as $error)
                        <p class="text-xs text-red-600">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="director@itm.edu.sv"
                        class="w-full px-3 py-2.5 text-sm border border-gray-200 rounded-lg bg-gray-50 text-gray-800 outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100 transition"
                    >
                </div>

                {{-- Contraseña --}}
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="w-full px-3 py-2.5 text-sm border border-gray-200 rounded-lg bg-gray-50 text-gray-800 outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-100 transition"
                    >
                </div>

                {{-- Recuérdame + olvidé contraseña --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-3.5 h-3.5 accent-amber-500">
                        <span class="text-xs text-gray-500">Recuérdame</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-medium" style="color:#f59e0b;">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                {{-- Botón --}}
                <button
                    type="submit"
                    class="w-full py-2.5 rounded-lg text-sm font-medium text-white flex items-center justify-center gap-2 transition hover:opacity-90"
                    style="background:#0d2e4d;"
                >
                    Iniciar sesión
                </button>

            </form>

            <p class="text-xs text-gray-400 text-center mt-8">
                I.T.M. — <span class="font-medium" style="color:#f59e0b;">Instituto de Computación de Aguilares</span> © {{ date('Y') }}
            </p>

        </div>
    </div>

</div>

</body>
</html>
