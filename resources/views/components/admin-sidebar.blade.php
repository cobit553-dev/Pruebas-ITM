{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- COMPONENTE: SIDEBAR ADMINISTRADOR --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<aside style="width:220px; flex-shrink:0; background:#ffffff; border-right:1px solid #e5e7eb; display:flex; flex-direction:column; padding:20px 12px; gap:2px;">

    {{-- Logo e Institución --}}
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
        <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
        <div>
            <p style="font-weight:700; font-size:14px; color:#1f2937;">ITM Aguilares</p>
            <p style="font-size:11px; color:#6b7280;">Administración</p>
        </div>
    </div>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Sección: Sistema --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <p style="font-size:9px; color:#9ca3af; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:6px 8px 3px;">Sistema</p>

    {{-- Enlace: Dashboard --}}
    <a href="{{ route('admin.dashboard') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'dashboard' ? 'background:rgba(59,130,246,.1); color:#1d4ed8;' : 'background:transparent; color:#6b7280;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        Dashboard
    </a>

    {{-- Enlace: Usuarios --}}
    <a href="{{ route('admin.usuarios') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'usuarios' ? 'background:rgba(59,130,246,.1); color:#1d4ed8; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Usuarios
    </a>

    {{-- Enlace: Cursos --}}
    <a href="{{ route('admin.cursos') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'cursos' ? 'background:rgba(59,130,246,.1); color:#1d4ed8; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
        Cursos
    </a>

    {{-- Enlace: Docentes --}}
    <a href="{{ route('admin.docentes') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'docentes' ? 'background:rgba(59,130,246,.1); color:#1d4ed8; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Docentes
    </a>

    {{-- Enlace: Reportes --}}
    <a href="{{ route('admin.reportes') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'reportes' ? 'background:rgba(59,130,246,.1); color:#1d4ed8; font-weight:600;' : 'background:transparent; color:#6b7280; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(107, 114, 128)') { this.style.background='#f3f4f6'; this.style.color='#1f2937'; }"
       onmouseout="if(this.style.color === 'rgb(31, 41, 55)') { this.style.background='transparent'; this.style.color='#6b7280'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="12" y1="2" x2="12" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        Reportes
    </a>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Usuario Info --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="margin-top:auto; padding-top:14px; border-top:1px solid #e5e7eb; display:flex; align-items:center; gap:10px;">
        <div style="width:32px; height:32px; border-radius:50%; background:#ef4444; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
            ADM
        </div>
        <div style="flex:1; overflow:hidden;">
            <p style="font-size:13px; font-weight:500; color:#1f2937; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">Administrador</p>
            <p style="font-size:11px; color:#6b7280;">Sistema</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" title="Salir" style="background:none; border:none; cursor:pointer; color:#6b7280; padding:4px;"
                    onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='#6b7280'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            </button>
        </form>
    </div>
</aside>
