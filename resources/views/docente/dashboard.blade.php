<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: DOCENTE - DASHBOARD --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div class="page-layout fade-in">

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- DOCENTE: SIDEBAR --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <aside class="sidebar sidebar-scroll">

        <div class="sidebar-brand">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" class="sidebar-brand-img">
            <div>
                <p style="font-weight:700; font-size:14px; color:#1f2937;">ITM Aguilares</p>
                <p style="font-size:11px; color:#6b7280;">Sistema Académico</p>
            </div>
        </div>

        <p class="sidebar-section-label" style="color:#9ca3af;">Académico</p>
        <a href="{{ route('docente.dashboard') }}" class="sidebar-link sidebar-link-active">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Panel principal
        </a>

        <a href="{{ route('docente.notas') }}" class="sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 0 0 0-2 2v16a2 0 0 0 2 2h12a2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            Registro de notas
        </a>

        <div class="sidebar-user">
            <div class="sidebar-avatar sidebar-avatar-blue">
                {{ strtoupper(substr($docente->nombre,0,1).substr($docente->apellido,0,1)) }}
            </div>
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#1f2937; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $docente->nombre_completo }}</p>
                <p style="font-size:11px; color:#6b7280;">Docente</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="button" title="Salir" class="sidebar-btn-logout"
                        onclick="openLogoutModal(this.closest('form'))">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </button>
            </form>
        </div>
    </aside>

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- DOCENTE: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div class="main-content">

        <header class="page-header">
            <div style="display:flex; align-items:center; gap:12px;">
                <div class="icon-box" style="background:#3b82f6;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#1f2937;">Mis Cursos</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">Listado de materias asignadas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#6b7280;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div class="content-body">

            {{-- Tabla de cursos y materias --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; justify-content:space-between;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Materias Asignadas</p>
                    </div>
                    <div style="display:flex; gap:10px; align-items:center;">
                        <span style="font-size:12px; color:#6b7280;">
                            <span style="background:#f0fdf4; color:#16a34a; padding:3px 8px; border-radius:5px; font-size:11px; font-weight:600;">{{ $cursos->count() }} cursos</span>
                        </span>
                    </div>
                </div>
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">#</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Sección</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Nivel</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Materias</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cursos as $cursoId => $materias)
                            @php
                                $curso = $materias->first()->curso;
                            @endphp
                            <tr style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                                onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                                <td style="padding:13px 24px; color:#6b7280; font-size:13px;">{{ $loop->iteration }}</td>
                                <td style="padding:13px 24px; font-size:13px; color:#111827; font-weight:500;">{{ $curso->seccion }}</td>
                                <td style="padding:13px 24px;">
                                    <span style="background:#f3f4f6; color:#374151; padding:3px 10px; border-radius:5px; font-size:12px;">{{ $curso->nivel }}</span>
                                </td>
                                <td style="padding:13px 24px;">
                                    <div style="display:flex; flex-wrap:wrap; gap:6px; align-items:center;">
                                        @foreach($materias as $detalle)
                                            <span style="background:#dbeafe; color:#1d4ed8; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:500;">{{ $detalle->materia->nombre }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td style="padding:13px 24px; text-align:center;">
                                    @foreach($materias as $detalle)
                                        <a href="{{ route('docente.notas', ['detalle_curso_id' => $detalle->id]) }}"
                                            style="display:inline-block; padding:5px 12px; background:#3b82f6; color:#fff; border-radius:6px; font-size:12px; font-weight:600; text-decoration:none; margin-right:4px;"
                                            onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                                            Registrar notas
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">No tienes materias asignadas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<x-logout-modal />
</x-app-layout>
