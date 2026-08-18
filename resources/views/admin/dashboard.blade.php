<x-app-layout>
<div class="page-layout admin-sidebar">

    <aside class="sidebar sidebar-scroll">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" class="sidebar-brand-img">
            <div>
                <p style="font-weight:700; font-size:14px; color:#0f172a;">ITM Aguilares</p>
                <p style="font-size:11px; color:#94a3b8;">Sistema Académico</p>
            </div>
        </div>

        <p class="sidebar-section-label">Principal</p>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link"
           style="background:#f0fdf4; color:#16a34a; border:1px solid #bbf7d0; font-weight:600;">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Panel principal
        </a>

        @foreach([
            ['Alumnos',route('admin.alumnos'),'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'],
            ['Maestros',route('admin.maestros'),'M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3z']
        ] as [$label,$href,$path])
        <a href="{{ $href }}" class="sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/><circle cx="12" cy="7" r="4"/></svg>
            {{ $label }}
        </a>
        @endforeach

        <p class="sidebar-section-label">Académico</p>
        @foreach([
            ['Materias',route('admin.materias'),'M4 19.5A2.5 2.5 0 0 1 6.5 17H20'],
            ['Secciones',route('admin.secciones'),'M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z'],
['Inscripciones',route('admin.inscripciones'),'M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2'],
             ['Notas',route('admin.notas'),'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z'],
             ['Boletas',route('admin.boletas'),'M9 11l3 3L22 4']
        ] as [$label,$href,$path])
        <a href="{{ $href }}" class="sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
            {{ $label }}
        </a>
        @endforeach

        <p class="sidebar-section-label">Finanzas</p>
        @foreach([
            ['Mensualidades',route('admin.mensualidades'),'M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6'],
            ['Pagos',route('admin.pagos'),'M1 4h22v16H1z']
        ] as [$label,$href,$path])
        <a href="{{ $href }}" class="sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
            {{ $label }}
        </a>
        @endforeach

        <div class="sidebar-user">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:32px; height:32px; border-radius:50%; flex-shrink:0; object-fit:cover;">
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#0f172a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ Auth::user()->name }}</p>
                <p style="font-size:11px; color:#94a3b8;">Director</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <button type="button" title="Salir"
                        onclick="openLogoutModal(document.getElementById('logoutForm'))"
                        class="sidebar-btn-logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </button>
            </form>
        </div>
    </aside>

    <div class="main-content main-content-alt">

        <header class="page-header">
            <div>
                <h2 style="font-size:17px; font-weight:700; margin:0; color:#0f172a;">Panel del Director</h2>
                <p style="font-size:12px; color:#94a3b8; margin:0;">Ciclo escolar {{ now()->year }} · I.T.M. Aguilares</p>
            </div>
            <span style="font-size:12px; color:#94a3b8;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div class="content-body">

            <div class="banner-dark">
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:#ffffff; margin:0 0 4px;">Bienvenido, {{ Auth::user()->name }}</h3>
                    <p style="font-size:13px; color:#94a3b8; margin:0;">Resumen del ciclo escolar {{ now()->year }}</p>
                </div>
                <div style="display:flex; gap:12px;">
                    <div class="banner-stat">
                        <p style="font-size:22px; font-weight:700; color:#4ade80; margin:0;">{{ $pagosAlDia }}%</p>
                        <p style="font-size:11px; color:#86efac; margin:0;">Pagos al día</p>
                    </div>
                    <div class="banner-stat">
                        <p style="font-size:22px; font-weight:700; color:#4ade80; margin:0;">{{ $promedioGeneral !== null ? number_format($promedioGeneral, 1) : '—' }}</p>
                        <p style="font-size:11px; color:#86efac; margin:0;">Promedio general</p>
                    </div>
                </div>
            </div>

            <div class="card-grid-4">
                @foreach([
                    [$totalAlumnos,'Alumnos inscritos','#dbeafe','#1d4ed8','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2', route('admin.alumnos')],
                    [$totalMaestros,'Maestros activos','#fef3c7','#b45309','M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5', route('admin.maestros')],
                    [$totalMaterias,'Materias activas','#d1fae5','#065f46','M4 19.5A2.5 2.5 0 0 1 6.5 17H20', route('admin.materias')],
                    [$pagosPendientes,'Pagos pendientes','#fee2e2','#991b1b','M12 1v22', route('admin.pagos')],
                ] as [$val,$label,$bg,$color,$path,$href])
                <a href="{{ $href }}" style="text-decoration:none;">
                    <div class="stat-card-white">
                        <div class="stat-icon-box" style="background:{{ $bg }};">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="{{ $color }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="{{ $path }}"/><circle cx="9" cy="7" r="4"/></svg>
                        </div>
                        <p style="font-size:26px; font-weight:700; color:#0f172a; margin:0 0 4px;">{{ $val }}</p>
                        <p style="font-size:12px; color:#64748b; margin:0;">{{ $label }}</p>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="card-grid-2">

                <div class="card">
                    <div class="card-header">
                        <p style="font-size:14px; font-weight:600; color:#0f172a; margin:0;">Maestros activos</p>
                        <a href="{{ route('admin.maestros') }}" class="btn-link" style="color:#16a34a;">Gestionar</a>
                    </div>
                    @php $coloresAvatar = ['#1d4ed8', '#7c3aed', '#0f766e', '#b45309', '#be123c']; @endphp
                    @forelse($maestrosActivos as $maestro)
                    @php
                        $materiasMaestro = $maestro->detalleCursos->pluck('materia.nombre')->filter()->unique()->implode(', ');
                    @endphp
                    <div style="display:flex; align-items:center; gap:12px; padding:12px 18px; {{ !$loop->first ? 'border-top:1px solid #f1f5f9;' : '' }}">
                        <div class="icon-box-sm" style="background:{{ $coloresAvatar[$loop->index % count($coloresAvatar)] }}; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
                            {{ strtoupper(substr($maestro->nombre, 0, 1) . substr($maestro->apellido, 0, 1)) }}
                        </div>
                        <div style="flex:1; overflow:hidden;">
                            <p style="font-size:13px; font-weight:500; color:#0f172a; margin:0;">{{ $maestro->nombre }} {{ $maestro->apellido }}</p>
                            <p style="font-size:11px; color:#94a3b8; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $materiasMaestro ?: 'Sin materias asignadas' }}</p>
                        </div>
                        <span class="stat-badge-green">Activo</span>
                    </div>
                    @empty
                    <div style="padding:20px 18px; text-align:center; color:#94a3b8; font-size:12px;">
                        No hay maestros registrados.
                    </div>
                    @endforelse
                </div>

                <div class="card">
                    <div class="card-header">
                        <p style="font-size:14px; font-weight:600; color:#0f172a; margin:0;">Estado de mensualidades</p>
                        <a href="{{ route('admin.mensualidades') }}" class="btn-link" style="color:#16a34a;">Ver detalle</a>
                    </div>
                    @forelse($estadoMensualidades as $m)
                    <div style="display:flex; align-items:center; gap:10px; padding:10px 18px; border-top:1px solid #f8fafc;">
                        <p style="font-size:13px; color:#334155; margin:0; flex:1;">{{ $m['mes'] }} {{ $m['anio'] }}</p>
                        <span style="font-size:11px; color:#94a3b8;">{{ $m['pagadas'] }}/{{ $m['total'] }} pagadas</span>
                        <span style="font-size:11px; background:{{ $m['completo'] ? '#d1fae5' : '#fef3c7' }}; color:{{ $m['completo'] ? '#065f46' : '#92400e' }}; padding:3px 10px; border-radius:20px; font-weight:600;">
                            {{ $m['completo'] ? 'Pagado' : 'Pendiente' }}
                        </span>
                    </div>
                    @empty
                    <div style="padding:20px 18px; text-align:center; color:#94a3b8; font-size:12px;">
                        Aún no se han generado mensualidades.
                    </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>

<x-logout-modal />
</x-app-layout>
