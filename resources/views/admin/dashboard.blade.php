<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    {{-- ===== SIDEBAR ===== --}}
    <aside style="width:220px; flex-shrink:0; background:#ffffff; border-right:1px solid #e2e8f0; display:flex; flex-direction:column; padding:20px 12px; gap:2px; overflow-y:auto;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #e2e8f0;">
            <img src="{{ asset('images/logo_itm.png') }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
            <div>
                <p style="font-weight:700; font-size:14px; color:#0f172a;">ITM Aguilares</p>
                <p style="font-size:11px; color:#94a3b8;">Sistema Académico</p>
            </div>
        </div>

        <p style="font-size:9px; color:#94a3b8; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:6px 8px 3px;">Principal</p>
        <a href="{{ route('dashboard') }}" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; background:#f0fdf4; color:#16a34a; text-decoration:none; border:1px solid #bbf7d0;">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Panel principal
        </a>

        @foreach([['Alumnos','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'],['Encargados','M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'],['Maestros','M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3z'],['Directores','M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z']] as [$label,$path])
        <a href="#" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#475569; text-decoration:none;"
           onmouseover="this.style.background='#f1f5f9';this.style.color='#0f172a'" onmouseout="this.style.background='transparent';this.style.color='#475569'">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/><circle cx="12" cy="7" r="4"/></svg>
            {{ $label }}
        </a>
        @endforeach

        <p style="font-size:9px; color:#94a3b8; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:10px 8px 3px;">Académico</p>
        @foreach([['Materias','M4 19.5A2.5 2.5 0 0 1 6.5 17H20'],['Secciones','M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z'],['Inscripciones','M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2'],['Notas','M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'],['Boletas','M9 11l3 3L22 4']] as [$label,$path])
        <a href="#" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#475569; text-decoration:none;"
           onmouseover="this.style.background='#f1f5f9';this.style.color='#0f172a'" onmouseout="this.style.background='transparent';this.style.color='#475569'">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
            {{ $label }}
        </a>
        @endforeach

        <p style="font-size:9px; color:#94a3b8; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:10px 8px 3px;">Finanzas</p>
        @foreach([['Mensualidades','M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6'],['Pagos','M1 4h22v16H1z']] as [$label,$path])
        <a href="#" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#475569; text-decoration:none;"
           onmouseover="this.style.background='#f1f5f9';this.style.color='#0f172a'" onmouseout="this.style.background='transparent';this.style.color='#475569'">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
            {{ $label }}
        </a>
        @endforeach

        {{-- Usuario + logout --}}
        <div style="margin-top:auto; padding-top:14px; border-top:1px solid #e2e8f0; display:flex; align-items:center; gap:10px;">
            <img src="{{ asset('images/logo_itm.png') }}" alt="ITM" style="width:32px; height:32px; border-radius:50%; flex-shrink:0; object-fit:cover;">
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#0f172a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ Auth::user()->name }}</p>
                <p style="font-size:11px; color:#94a3b8;">Director</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <button type="button" title="Salir"
                        onclick="openLogoutModal(document.getElementById('logoutForm'))"
                        style="background:none; border:none; cursor:pointer; color:#94a3b8; padding:4px;"
                        onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='#94a3b8'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        {{-- Header --}}
        <header style="background:#ffffff; border-bottom:1px solid #e2e8f0; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div>
                <h2 style="font-size:17px; font-weight:700; margin:0; color:#0f172a;">Panel del Director</h2>
                <p style="font-size:12px; color:#94a3b8; margin:0;">Ciclo escolar 2026 · I.T.M. Aguilares</p>
            </div>
            <span style="font-size:12px; color:#94a3b8;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        {{-- Content --}}
        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- Banner --}}
            <div style="background:#0f172a; border:1px solid #1e293b; border-radius:14px; padding:20px 24px; display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; border-left:4px solid #16a34a;">
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:#ffffff; margin:0 0 4px;">Bienvenido, {{ Auth::user()->name }}</h3>
                    <p style="font-size:13px; color:#94a3b8; margin:0;">Resumen del ciclo escolar 2026</p>
                </div>
                <div style="display:flex; gap:12px;">
                    <div style="background:rgba(22,163,74,.2); border:1px solid rgba(22,163,74,.3); border-radius:10px; padding:12px 18px; text-align:center;">
                        <p style="font-size:22px; font-weight:700; color:#4ade80; margin:0;">87%</p>
                        <p style="font-size:11px; color:#86efac; margin:0;">Pagos al día</p>
                    </div>
                    <div style="background:rgba(22,163,74,.2); border:1px solid rgba(22,163,74,.3); border-radius:10px; padding:12px 18px; text-align:center;">
                        <p style="font-size:22px; font-weight:700; color:#4ade80; margin:0;">8.4</p>
                        <p style="font-size:11px; color:#86efac; margin:0;">Promedio general</p>
                    </div>
                </div>
            </div>

            {{-- Métricas --}}
            <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:20px;">
                @foreach([
                    ['142','Alumnos inscritos','#dbeafe','#1d4ed8','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'],
                    ['9','Maestros activos','#fef3c7','#b45309','M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5'],
                    ['13','Materias activas','#d1fae5','#065f46','M4 19.5A2.5 2.5 0 0 1 6.5 17H20'],
                    ['18','Pagos pendientes','#fee2e2','#991b1b','M12 1v22'],
                ] as [$val,$label,$bg,$color,$path])
                <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; padding:18px; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <div style="width:36px; height:36px; background:{{ $bg }}; border-radius:8px; display:flex; align-items:center; justify-content:center; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="{{ $color }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <p style="font-size:26px; font-weight:700; color:#0f172a; margin:0 0 4px;">{{ $val }}</p>
                    <p style="font-size:12px; color:#64748b; margin:0;">{{ $label }}</p>
                </div>
                @endforeach
            </div>

            {{-- Tablas --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">

                {{-- Maestros --}}
                <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:14px; overflow:hidden; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <div style="padding:14px 18px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; justify-content:space-between;">
                        <p style="font-size:14px; font-weight:600; color:#0f172a; margin:0;">Maestros activos</p>
                        <a href="#" style="font-size:12px; color:#16a34a; text-decoration:none; font-weight:500;">Gestionar</a>
                    </div>
                    @foreach([
                        ['CM','Carlos Mendoza','Windows, Word, Excel','#1d4ed8'],
                        ['AL','Ana López','CorelDRAW, Photoshop, HTML','#7c3aed'],
                    ] as [$ini,$nombre,$materias,$bg])
                    <div style="display:flex; align-items:center; gap:12px; padding:12px 18px; border-top:1px solid #f1f5f9;">
                        <div style="width:34px; height:34px; border-radius:50%; background:{{ $bg }}; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">{{ $ini }}</div>
                        <div style="flex:1; overflow:hidden;">
                            <p style="font-size:13px; font-weight:500; color:#0f172a; margin:0;">{{ $nombre }}</p>
                            <p style="font-size:11px; color:#94a3b8; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $materias }}</p>
                        </div>
                        <span style="font-size:11px; background:#d1fae5; color:#065f46; padding:3px 10px; border-radius:20px; font-weight:600;">Activo</span>
                    </div>
                    @endforeach
                </div>

                {{-- Mensualidades --}}
                <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:14px; overflow:hidden; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <div style="padding:14px 18px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; justify-content:space-between;">
                        <p style="font-size:14px; font-weight:600; color:#0f172a; margin:0;">Estado de mensualidades</p>
                        <a href="#" style="font-size:12px; color:#16a34a; text-decoration:none; font-weight:500;">Ver detalle</a>
                    </div>
                    @foreach([
                        ['Enero 2026','Pagado','#d1fae5','#065f46'],
                        ['Febrero 2026','Pagado','#d1fae5','#065f46'],
                        ['Marzo 2026','Pagado','#d1fae5','#065f46'],
                        ['Abril 2026','Pendiente','#fef3c7','#92400e'],
                        ['Mayo 2026','Pendiente','#fef3c7','#92400e'],
                    ] as [$mes,$estado,$bg,$color])
                    <div style="display:flex; align-items:center; padding:10px 18px; border-top:1px solid #f8fafc;">
                        <p style="font-size:13px; color:#334155; margin:0; flex:1;">{{ $mes }}</p>
                        <span style="font-size:11px; background:{{ $bg }}; color:{{ $color }}; padding:3px 10px; border-radius:20px; font-weight:600;">{{ $estado }}</span>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Modal cerrar sesión --}}
<x-logout-modal />

</x-app-layout>
