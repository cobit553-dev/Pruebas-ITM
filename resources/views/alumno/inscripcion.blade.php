<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ALUMNO - INSCRIPCIÓN --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;" class="fade-in">

    @include('components.alumno-sidebar', ['active' => 'inscripcion'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ALUMNO: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
<    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#ffffff;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:36px; height:36px; border-radius:10px; object-fit:cover;">
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#1f2937;">Portal Estudiantil</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $alumno->nombre_completo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#6b7280;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;" class="fade-in">

            {{-- Mensajes --}}
            @if(session('success'))
            <div style="background:rgba(16,185,129,.15); border:1px solid rgba(16,185,129,.3); color:#34d399; padding:12px 16px; border-radius:10px; font-size:13px; margin-bottom:16px;">
                ✓ {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div style="background:rgba(239,68,68,.15); border:1px solid rgba(239,68,68,.3); color:#f87171; padding:12px 16px; border-radius:10px; font-size:13px; margin-bottom:16px;">
                ✕ {{ session('error') }}
            </div>
            @endif

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ALUMNO: SECCIÓN INSCRIPCIÓN --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:24px;">
                <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0 0 18px;">Inscripción a sección</h3>

                @if($inscripcion)
                {{-- Ya inscrito --}}
                <div style="background:#dcfce7; border:1px solid #86efac; border-radius:12px; padding:20px; display:flex; align-items:center; gap:16px;">
                    <div style="width:46px; height:46px; border-radius:12px; background:#bbf7d0; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <div>
                        <p style="font-size:14px; font-weight:600; color:#16a34a; margin:0 0 4px;">Ya estás inscrito</p>
                        <p style="font-size:13px; color:#4b5563; margin:0;">
                            Sección <strong>{{ $inscripcion->curso->seccion }}</strong> —
                            Turno {{ $inscripcion->curso->nivel }} ·
                            Inscrito el {{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->isoFormat('D [de] MMMM YYYY') }}
                        </p>
                    </div>
                </div>
                @else
                {{-- Formulario inscripción --}}
                @if($cursosDisponibles->count() > 0)
                <form method="POST" action="{{ route('alumno.inscribirse') }}">
                    @csrf
                    <p style="font-size:13px; color:#6b7280; margin:0 0 16px;">Selecciona la sección a la que deseas inscribirte. Solo puedes estar en una sección a la vez.</p>

                    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:12px; margin-bottom:20px;">
                        @foreach($cursosDisponibles as $curso)
                        <label style="cursor:pointer;">
                            <input type="radio" name="curso_id" value="{{ $curso->id }}" style="display:none;" class="curso-radio">
                            <div class="curso-card" style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:12px; padding:16px; text-align:center; transition:all .15s;">
                                <div style="width:40px; height:40px; border-radius:10px; background:#ede9fe; display:flex; align-items:center; justify-content:center; margin:0 auto 10px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                </div>
                                <p style="font-size:15px; font-weight:700; color:#1f2937; margin:0 0 4px;">Sección {{ $curso->seccion }}</p>
                                <p style="font-size:11px; color:#6b7280; margin:0;">Turno {{ $curso->nivel }}</p>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <button type="submit"
                            style="padding:10px 24px; background:#f59e0b; border:none; border-radius:8px; color:#fff; font-size:14px; font-weight:700; cursor:pointer;"
                            onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e0b'">
                        Confirmar inscripción
                    </button>
                </form>
                @else
                <p style="color:#6b7280; font-size:13px;">No hay secciones disponibles en este momento.</p>
                @endif
                @endif
            </div>

        </div>
    </div>
</div>

<script>
document.querySelectorAll('.curso-radio').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.curso-card').forEach(c => {
            c.style.borderColor = '#e5e7eb';
            c.style.background  = '#f9fafb';
        });
        const card = radio.nextElementSibling;
        card.style.borderColor = '#fbbf24';
        card.style.background  = '#fefce8';
    });
});
</script>
</x-app-layout>
