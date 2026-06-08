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
                    <p style="font-size:12px; color:#6b7280; margin:0;">Elige una materia para registrar notas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#6b7280;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div class="content-body">

            {{-- DOCENTE: TARJETAS DE CURSOS Y MATERIAS --}}
            <div class="card-grid">
                @forelse($cursos as $cursoId => $materias)
                    @php
                        $curso = $materias->first()->curso;
                    @endphp

                    {{-- Tarjeta del curso --}}
                    <div class="card card-hover-shadow">
                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                            <div class="icon-box-xs icon-box-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            </div>
                            <div>
                                <h3 style="font-size:16px; font-weight:700; color:#1f2937; margin:0;">Sección {{ $curso->seccion }}</h3>
                                <p style="font-size:12px; color:#6b7280; margin:0;">{{ $curso->nivel }}</p>
                            </div>
                        </div>

                        <p style="font-size:12px; color:#6b7280; margin:0 0 16px;">Materias asignadas:</p>

                        {{-- Lista de materias --}}
                        <div style="display:flex; flex-direction:column; gap:8px;">
                            @foreach($materias as $detalle)
                                <a href="{{ route('docente.notas', ['detalle_curso_id' => $detalle->id]) }}" style="display:flex; align-items:center; gap:10px; padding:10px 12px; background:#f3f4f6; border:1px solid #e5e7eb; border-radius:8px; text-decoration:none; transition:all .3s; color:#1f2937;"
                                   onmouseover="this.style.background='#e5e7eb'; this.style.borderColor='#3b82f6'; this.style.color='#1d4ed8'"
                                   onmouseout="this.style.background='#f3f4f6'; this.style.borderColor='#e5e7eb'; this.style.color='#1f2937'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
                                    <span style="font-size:13px; flex:1;">{{ $detalle->materia->nombre }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="empty-state" style="grid-column:1/-1;">
                        <div class="empty-icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#4f46e5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                        </div>
                        <p style="font-size:14px; color:#6b7280; margin:0;">No tienes materias asignadas</p>
                        <p style="font-size:12px; color:#9ca3af; margin:8px 0 0;">Contacta con el administrador para asignarte materias</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
<x-logout-modal />
</x-app-layout>
