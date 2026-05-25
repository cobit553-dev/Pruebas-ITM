<x-guest-layout>
<div style="width:100%; min-height:100vh; display:flex; align-items:center; justify-content:center; padding:16px; background:linear-gradient(135deg, #0c1e3a 0%, #1a3a52 50%, #0f2744 100%);">
    <div style="width:100%; max-width:480px;">
        {{-- Banner superior --}}
        <div style="background:linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #0e7490 100%); border-radius:20px 20px 0 0; padding:40px 32px; text-align:center; box-shadow:0 10px 30px rgba(6,182,212,.2);">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:100px; height:100px; border-radius:20px; margin-bottom:16px; display:block; margin-left:auto; margin-right:auto; border:4px solid rgba(255,255,255,.9); box-shadow:0 4px 12px rgba(0,0,0,.3);">
            <h1 style="font-size:28px; font-weight:800; color:#fff; margin:0 0 8px; text-shadow:0 2px 4px rgba(0,0,0,.1);">ITM Aguilares</h1>
            <p style="font-size:14px; color:rgba(255,255,255,.95); margin:0;">Portal de Acceso Académico</p>
        </div>

        {{-- Tarjeta de login --}}
        <div style="background:linear-gradient(135deg, #1e3a4f 0%, #2d4a5f 50%, #1f3f4f 100%); border-radius:0 0 20px 20px; padding:40px 32px; border:1px solid rgba(6,182,212,.2); border-top:none; box-shadow:0 20px 40px rgba(0,0,0,.3);">

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12px; color:rgba(174,194,224,.9); margin-bottom:8px; font-weight:600; text-transform:uppercase; letter-spacing:.5px;">Correo electrónico</label>
                    <div style="position:relative;">
                        <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:rgba(6,182,212,.6);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               style="width:100%; background:rgba(30,58,79,.6); border:2px solid {{ $errors->get('email') ? '#ef4444' : 'rgba(6,182,212,.3)' }}; border-radius:12px; padding:12px 14px 12px 44px; color:#fff; font-size:14px; outline:none; box-sizing:border-box; transition:all .3s; backdrop-filter:blur(4px);"
                               onfocus="this.style.borderColor='rgba(6,182,212,.8)'; this.style.boxShadow='0 0 15px rgba(6,182,212,.3)'; this.style.background='rgba(30,58,79,.8)'"
                               onblur="this.style.borderColor='rgba(6,182,212,.3)'; this.style.boxShadow='none'; this.style.background='rgba(30,58,79,.6)'"
                               placeholder="alumno@itm.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" style="color:#f87171; font-size:12px;" />
                </div>

                {{-- Contraseña --}}
                <div style="margin-bottom:24px;">
                    <label style="display:block; font-size:12px; color:rgba(174,194,224,.9); margin-bottom:8px; font-weight:600; text-transform:uppercase; letter-spacing:.5px;">Contraseña</label>
                    <div style="position:relative;">
                        <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:rgba(6,182,212,.6);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input id="password" type="password" name="password" required
                               style="width:100%; background:rgba(30,58,79,.6); border:2px solid {{ $errors->get('password') ? '#ef4444' : 'rgba(6,182,212,.3)' }}; border-radius:12px; padding:12px 14px 12px 44px; color:#fff; font-size:14px; outline:none; box-sizing:border-box; transition:all .3s; backdrop-filter:blur(4px);"
                               onfocus="this.style.borderColor='rgba(6,182,212,.8)'; this.style.boxShadow='0 0 15px rgba(6,182,212,.3)'; this.style.background='rgba(30,58,79,.8)'"
                               onblur="this.style.borderColor='rgba(6,182,212,.3)'; this.style.boxShadow='none'; this.style.background='rgba(30,58,79,.6)'"
                               placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" style="color:#f87171; font-size:12px;" />
                </div>

                {{-- Recordarme y ¿Olvidaste? --}}
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
                    <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:rgba(174,194,224,.8); cursor:pointer;">
                        <input type="checkbox" name="remember" style="accent-color:#06b6d4; width:16px; height:16px; cursor:pointer;">
                        Recordarme
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size:13px; color:rgba(6,182,212,.9); text-decoration:none; transition:color .3s;"
                       onmouseover="this.style.color='#06b6d4'" onmouseout="this.style.color='rgba(6,182,212,.9)'">
                        ¿Olvidaste tu contraseña?
                    </a>
                    @endif
                </div>

                {{-- Botón submit --}}
                <button type="submit"
                        style="width:100%; padding:13px; background:linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); border:none; border-radius:12px; color:#fff; font-size:15px; font-weight:700; cursor:pointer; transition:all .3s; box-shadow:0 4px 15px rgba(6,182,212,.3);"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(6,182,212,.4)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(6,182,212,.3)'">
                    Iniciar sesión
                </button>

                {{-- Divisor --}}
                <div style="display:flex; align-items:center; margin:24px 0; gap:12px;">
                    <div style="flex:1; height:1px; background:rgba(6,182,212,.2);"></div>
                    <span style="font-size:12px; color:rgba(174,194,224,.5);">O</span>
                    <div style="flex:1; height:1px; background:rgba(6,182,212,.2);"></div>
                </div>

                {{-- Opción registrarse --}}
                @if (Route::has('register'))
                <div style="background:rgba(6,182,212,.1); border:1px dashed rgba(6,182,212,.3); border-radius:12px; padding:16px; text-align:center; backdrop-filter:blur(4px);">
                    <p style="font-size:13px; color:rgba(174,194,224,.8); margin:0;">¿No tienes cuenta?</p>
                    <a href="{{ route('register') }}" style="display:inline-block; color:#06b6d4; text-decoration:none; font-weight:600; margin-top:8px; transition:color .3s;"
                       onmouseover="this.style.color='#22d3ee'" onmouseout="this.style.color='#06b6d4'">
                        Regístrate aquí →
                    </a>
                </div>
                @endif
            </form>

            {{-- Footer info --}}
            <div style="margin-top:24px; padding-top:20px; border-top:1px solid rgba(6,182,212,.1); text-align:center;">
                <p style="font-size:11px; color:rgba(174,194,224,.6); margin:0;">
                    <span style="display:block; margin-bottom:6px;">Instituto Técnico Metropolitano</span>
                    Sistema Académico © 2026
                </p>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>

