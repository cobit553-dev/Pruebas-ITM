<x-guest-layout>
<div style="width:100%; max-width:420px; padding:16px;">
    <div style="background:#1e293b; border-radius:20px; padding:36px 32px; border:1px solid #334155;">

        <div style="text-align:center; margin-bottom:28px;">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:80px; height:80px; border-radius:14px; margin:0 auto 14px; display:block; object-fit:cover;">
            <h1 style="font-size:22px; font-weight:700; color:#10b981; margin:0 0 4px;">ITM Aguilares</h1>
            <p style="font-size:13px; color:#64748b; margin:0;">Crear nueva cuenta</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:12px; color:#94a3b8; margin-bottom:6px;">Nombre completo</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       style="width:100%; background:#0f172a; border:1px solid #334155; border-radius:10px; padding:10px 14px; color:#fff; font-size:14px; outline:none; box-sizing:border-box;"
                       onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#334155'"
                       placeholder="Tu nombre completo">
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:12px; color:#94a3b8; margin-bottom:6px;">Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       style="width:100%; background:#0f172a; border:1px solid #334155; border-radius:10px; padding:10px 14px; color:#fff; font-size:14px; outline:none; box-sizing:border-box;"
                       onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#334155'"
                       placeholder="correo@itm.com">
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div style="margin-bottom:14px;">
                <label style="display:block; font-size:12px; color:#94a3b8; margin-bottom:6px;">Contraseña</label>
                <input type="password" name="password" required
                       style="width:100%; background:#0f172a; border:1px solid #334155; border-radius:10px; padding:10px 14px; color:#fff; font-size:14px; outline:none; box-sizing:border-box;"
                       onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#334155'"
                       placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div style="margin-bottom:22px;">
                <label style="display:block; font-size:12px; color:#94a3b8; margin-bottom:6px;">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" required
                       style="width:100%; background:#0f172a; border:1px solid #334155; border-radius:10px; padding:10px 14px; color:#fff; font-size:14px; outline:none; box-sizing:border-box;"
                       onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#334155'"
                       placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <button type="submit"
                    style="width:100%; padding:11px; background:#10b981; border:none; border-radius:10px; color:#fff; font-size:14px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.opacity='.88'" onmouseout="this.style.opacity='1'">
                Crear cuenta
            </button>
        </form>

        <p style="text-align:center; font-size:13px; color:#475569; margin-top:20px;">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" style="color:#10b981; text-decoration:none; font-weight:500;">Iniciar sesión</a>
        </p>
    </div>
</div>
</x-guest-layout>
