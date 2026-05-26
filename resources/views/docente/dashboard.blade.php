<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: DOCENTE - DASHBOARD --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;" class="fade-in">

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- DOCENTE: SIDEBAR --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <aside style="width:220px; flex-shrink:0; background:#1e293b; border-right:1px solid #334155; display:flex; flex-direction:column; padding:20px 12px; gap:2px; overflow-y:auto;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #334155;">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
            <div>
                <p style="font-weight:700; font-size:14px; color:#fff;">ITM Aguilares</p>
                <p style="font-size:11px; color:#64748b;">Sistema Académico</p>
            </div>
        </div>

        <p style="font-size:9px; color:#475569; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:6px 8px 3px;">Académico</p>
        <a href="{{ route('docente.dashboard') }}" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; background:rgba(59,130,246,.15); color:#60a5fa; text-decoration:none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Panel principal
        </a>

        <a href="{{ route('docente.notas') }}" style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#64748b; text-decoration:none; transition:all .15s;"
           onmouseover="this.style.background='#334155';this.style.color='#e2e8f0'" onmouseout="this.style.background='transparent';this.style.color='#64748b'">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            Registro de notas
        </a>

        <div style="margin-top:auto; padding-top:14px; border-top:1px solid #334155; display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:#60a5fa; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
                {{ strtoupper(substr($docente->nombre,0,1).substr($docente->apellido,0,1)) }}
            </div>
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#e2e8f0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $docente->nombre_completo }}</p>
                <p style="font-size:11px; color:#475569;">Docente</p>
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

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- DOCENTE: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden;">

        {{-- Header --}}
        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#60a5fa; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0;">Seleccionar Curso y Materia</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">Elige la sección para registrar notas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- DOCENTE: TARJETAS DE CURSOS Y MATERIAS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px;">
                @forelse($cursos as $cursoId => $materias)
                    @php
                        $curso = $materias->first()->curso;
                    @endphp

                    {{-- Tarjeta del curso --}}
                    <div style="background:linear-gradient(135deg, #1e3a4f 0%, #2d4a5f 100%); border:1px solid rgba(34,211,238,.2); border-radius:14px; padding:20px; transition:all .3s; cursor:pointer;"
                         onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='rgba(34,211,238,.5)'; this.style.boxShadow='0 8px 20px rgba(34,211,238,.15)'"
                         onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(34,211,238,.2)'; this.style.boxShadow='none'">

                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                            <div style="width:40px; height:40px; border-radius:10px; background:rgba(34,211,238,.2); display:flex; align-items:center; justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            </div>
                            <div>
                                <h3 style="font-size:16px; font-weight:700; color:#fff; margin:0;">Sección {{ $curso->seccion }}</h3>
                                <p style="font-size:12px; color:rgba(174,194,224,.7); margin:0;">{{ $curso->nivel }}</p>
                            </div>
                        </div>

                        <p style="font-size:12px; color:rgba(174,194,224,.8); margin:0 0 16px;">Materias asignadas:</p>

                        {{-- Lista de materias --}}
                        <div style="display:flex; flex-direction:column; gap:8px;">
                            @foreach($materias as $detalle)
                                <a href="{{ route('docente.notas', ['detalle_curso_id' => $detalle->id]) }}" style="display:flex; align-items:center; gap:10px; padding:10px 12px; background:rgba(34,211,238,.1); border:1px solid rgba(34,211,238,.2); border-radius:8px; text-decoration:none; transition:all .3s;"
                                   onmouseover="this.style.background='rgba(34,211,238,.2)'; this.style.borderColor='rgba(34,211,238,.4)'; this.style.color='#22d3ee'"
                                   onmouseout="this.style.background='rgba(34,211,238,.1)'; this.style.borderColor='rgba(34,211,238,.2)'; this.style.color='#e2e8f0'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
                                    <span style="font-size:13px; color:#e2e8f0; flex:1;">{{ $detalle->materia->nombre }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div style="grid-column:1/-1; background:#1e3a4f; border:1px dashed rgba(34,211,238,.3); border-radius:14px; padding:40px; text-align:center;">
                        <div style="width:60px; height:60px; border-radius:12px; background:rgba(34,211,238,.1); display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                        </div>
                        <p style="font-size:14px; color:rgba(174,194,224,.8); margin:0;">No tienes materias asignadas</p>
                        <p style="font-size:12px; color:rgba(174,194,224,.6); margin:8px 0 0;">Contacta con el administrador para asignarte materias</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
</x-app-layout>
