{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- COMPONENTE: SIDEBAR ALUMNO --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<aside style="width:220px; flex-shrink:0; background:#ffffff; border-right:1px solid #e5e7eb; display:flex; flex-direction:column; padding:20px 12px; gap:2px;">

    {{-- Logo e Institución --}}
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #334155;">
        <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
        <div>
            <p style="font-weight:700; font-size:14px; color:#fff;">ITM Aguilares</p>
            <p style="font-size:11px; color:#64748b;">Portal Estudiantil</p>
        </div>
    </div>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Sección: Mi Portal --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <p style="font-size:9px; color:#9ca3af; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:6px 8px 3px;">Mi portal</p>

    {{-- Enlace: Inicio --}}
    <a href="{{ route('alumno.dashboard') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'inicio' ? 'background:rgba(245,158,11,.1); color:#d97706;' : 'background:transparent; color:#6b7280;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        Inicio
    </a>

    {{-- Enlace: Inscripción --}}
    <a href="{{ route('alumno.inscripcion') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'inscripcion' ? 'background:rgba(245,158,11,.1); color:#d97706; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg>
        Inscripción
    </a>

    {{-- Enlace: Mis Notas --}}
    <a href="{{ route('alumno.notas') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'notas' ? 'background:rgba(245,158,11,.1); color:#d97706; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
        Mis notas
    </a>

    {{-- Enlace: Estado de Pagos --}}
    <a href="{{ route('alumno.pagos') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'pagos' ? 'background:rgba(245,158,11,.1); color:#d97706; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        Estado de pagos
    </a>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Usuario Info --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="margin-top:auto; padding-top:14px; border-top:1px solid #e5e7eb; display:flex; align-items:center; gap:10px;">
        <div style="width:32px; height:32px; border-radius:50%; background:#f59e0b; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
            {{ strtoupper(substr($alumno->nombre,0,1).substr($alumno->apellido,0,1)) }}
        </div>
        <div style="flex:1; overflow:hidden;">
            <p style="font-size:13px; font-weight:500; color:#1f2937; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $alumno->nombre_completo }}</p>
            <p style="font-size:11px; color:#6b7280;">{{ $alumno->codigo }}</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
                <button type="button" title="Salir" style="background:none; border:none; cursor:pointer; color:#6b7280; padding:4px;"
                    onclick="openLogoutModal(this.closest('form'))"
                    onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='#6b7280'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            </button>
        </form>
    </div>
</aside>
<x-logout-modal />
