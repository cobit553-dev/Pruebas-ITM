<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ALUMNO - DASHBOARD (INICIO) --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;" class="fade-in">

    @include('components.alumno-sidebar', ['active' => 'inicio'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ALUMNO: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden;">

        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:36px; height:36px; border-radius:10px; object-fit:cover;">
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0;">Portal Estudiantil</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">{{ $alumno->nombre_completo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;" class="fade-in">

            {{-- Alertas --}}
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
            {{-- ALUMNO: BANNER DE BIENVENIDA --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#1c1400; border:1px solid #854d0e; border-radius:14px; padding:20px 24px; display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:#fbbf24; margin:0 0 4px;">Bienvenido, {{ $alumno->nombre }}</h3>
                    <p style="font-size:13px; color:#92400e; margin:0;">Ciclo escolar 2026 · I.T.M. Aguilares</p>
                </div>
                <div style="display:flex; gap:12px;">
                    <div style="background:rgba(245,158,11,.2); border:1px solid rgba(245,158,11,.3); border-radius:10px; padding:12px 18px; text-align:center;">
                        <p style="font-size:22px; font-weight:700; color:#fbbf24; margin:0;">{{ $inscripcion ? 'Sec. '.$inscripcion->curso->seccion : '—' }}</p>
                        <p style="font-size:11px; color:#92400e; margin:0;">Mi sección</p>
                    </div>
                    <div style="background:rgba(245,158,11,.2); border:1px solid rgba(245,158,11,.3); border-radius:10px; padding:12px 18px; text-align:center;">
                        <p style="font-size:22px; font-weight:700; color:#fbbf24; margin:0;">{{ $promedio ? round($promedio) : '—' }}</p>
                        <p style="font-size:11px; color:#92400e; margin:0;">Promedio</p>
                    </div>
                </div>
            </div>

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ALUMNO: TARJETAS DE RESUMEN --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:20px;">
                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="width:34px; height:34px; background:rgba(59,130,246,.2); border-radius:8px; display:flex; align-items:center; justify-content:center; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0 0 4px;">{{ $inscripcion ? 'Inscrito' : 'Sin sección' }}</p>
                    <p style="font-size:12px; color:#64748b; margin:0;">Estado de inscripción</p>
                </div>
                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="width:34px; height:34px; background:rgba(245,158,11,.2); border-radius:8px; display:flex; align-items:center; justify-content:center; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0 0 4px;">{{ $notas->count() }}</p>
                    <p style="font-size:12px; color:#64748b; margin:0;">Notas registradas</p>
                </div>
                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="width:34px; height:34px; background:rgba(245,158,11,.2); border-radius:8px; display:flex; align-items:center; justify-content:center; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0 0 4px;">—</p>
                    <p style="font-size:12px; color:#64748b; margin:0;">Pagos pendientes</p>
                </div>
            </div>

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ALUMNO: ÚLTIMAS NOTAS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            @if($notas->count() > 0)
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                <div style="padding:14px 18px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                    <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Últimas notas</p>
                    <a href="{{ route('alumno.notas') }}" style="font-size:12px; color:#f59e0b; background:none; border:none; cursor:pointer; text-decoration:none;">Ver todas</a>
                </div>
                @foreach($notas->take(5) as $nota)
                <div style="display:flex; align-items:center; padding:11px 18px; border-top:1px solid #0f172a;">
                    <p style="font-size:13px; color:#cbd5e1; flex:1; margin:0;">{{ $nota->detalleCurso->materia->nombre }}</p>
                    <p style="font-size:11px; color:#475569; margin:0 16px;">Prof. {{ $nota->detalleCurso->maestro->nombre_completo }}</p>
                    @php $p = $nota->promedio; @endphp
                    <span style="width:32px; height:32px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; color:#fff;
                        background:{{ $p >= 9 ? '#059669' : ($p >= 7 ? '#d97706' : ($p >= 6 ? '#ea580c' : '#dc2626')) }};">
                        {{ $p ?? '—' }}
                    </span>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
</x-app-layout>
