{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- COMPONENTE: SIDEBAR ADMINISTRADOR (TEMA OSCURO) --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<aside style="width:220px; flex-shrink:0; background:#1e293b; border-right:1px solid #334155; display:flex; flex-direction:column; padding:20px 12px; gap:2px;">

    {{-- Logo e Institución --}}
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #334155;">
        <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
        <div>
            <p style="font-weight:700; font-size:14px; color:#fff;">ITM Aguilares</p>
            <p style="font-size:11px; color:#64748b;">Administración</p>
        </div>
    </div>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Sección: Principal --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <p style="font-size:9px; color:#475569; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:10px 8px 3px;">PRINCIPAL</p>

    <a href="{{ route('admin.dashboard') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'dashboard' ? 'background:rgba(16,185,129,.18); color:#10b981;' : 'background:transparent; color:#64748b;' }}"
       onmouseover="if(this.style.color === 'rgb(100, 116, 139)') { this.style.background='#334155'; this.style.color='#e2e8f0'; }"
       onmouseout="if(this.style.color === 'rgb(226, 232, 240)') { this.style.background='transparent'; this.style.color='#64748b'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        Panel principal
    </a>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Sección: Gestión --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <p style="font-size:9px; color:#475569; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:10px 8px 3px;">GESTIÓN</p>

    <a href="{{ route('admin.alumnos') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'alumnos' ? 'background:rgba(16,185,129,.18); color:#10b981; font-weight:600;' : 'background:transparent; color:#64748b; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(100, 116, 139)') { this.style.background='#334155'; this.style.color='#e2e8f0'; }"
       onmouseout="if(this.style.color === 'rgb(226, 232, 240)') { this.style.background='transparent'; this.style.color='#64748b'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        Alumnos
    </a>

    <a href="{{ route('admin.maestros') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'maestros' ? 'background:rgba(16,185,129,.18); color:#10b981; font-weight:600;' : 'background:transparent; color:#64748b; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(100, 116, 139)') { this.style.background='#334155'; this.style.color='#e2e8f0'; }"
       onmouseout="if(this.style.color === 'rgb(226, 232, 240)') { this.style.background='transparent'; this.style.color='#64748b'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Maestros
    </a>

    <a href="{{ route('admin.materias') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'materias' ? 'background:rgba(16,185,129,.18); color:#10b981; font-weight:600;' : 'background:transparent; color:#64748b; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(100, 116, 139)') { this.style.background='#334155'; this.style.color='#e2e8f0'; }"
       onmouseout="if(this.style.color === 'rgb(226, 232, 240)') { this.style.background='transparent'; this.style.color='#64748b'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
        Materias
    </a>

    <a href="{{ route('admin.secciones') }}"
       style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; text-decoration:none; transition:all .15s; cursor:pointer;
              {{ $active === 'secciones' ? 'background:rgba(16,185,129,.18); color:#10b981; font-weight:600;' : 'background:transparent; color:#64748b; font-weight:400;' }}"
       onmouseover="if(this.style.color === 'rgb(100, 116, 139)') { this.style.background='#334155'; this.style.color='#e2e8f0'; }"
       onmouseout="if(this.style.color === 'rgb(226, 232, 240)') { this.style.background='transparent'; this.style.color='#64748b'; }">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        Secciones
    </a>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- Usuario Info --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="margin-top:auto; padding-top:14px; border-top:1px solid #334155; display:flex; align-items:center; gap:10px;">
        <div style="width:32px; height:32px; border-radius:50%; background:#10b981; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
            ADM
        </div>
        <div style="flex:1; overflow:hidden;">
            <p style="font-size:13px; font-weight:500; color:#e2e8f0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">Administrador</p>
            <p style="font-size:11px; color:#475569;">Sistema</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" title="Salir" style="background:none; border:none; cursor:pointer; color:#475569; padding:4px;"
                    onmouseover="this.style.color='#f87171'" onmouseout="this.style.color='#475569'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            </button>
        </form>
    </div>
</aside>
