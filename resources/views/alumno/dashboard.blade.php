<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;" class="fade-in">

    {{-- ===== SIDEBAR ===== --}}
    <aside style="width:220px; flex-shrink:0; background:#1e293b; border-right:1px solid #334155; display:flex; flex-direction:column; padding:20px 12px; gap:2px;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #334155;">
            <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM Aguilares" style="width:38px; height:38px; border-radius:10px; flex-shrink:0; object-fit:cover;">
            <div>
                <p style="font-weight:700; font-size:14px; color:#fff;">ITM Aguilares</p>
                <p style="font-size:11px; color:#64748b;">Portal Estudiantil</p>
            </div>
        </div>

        <p style="font-size:9px; color:#475569; text-transform:uppercase; letter-spacing:.1em; font-weight:600; padding:6px 8px 3px;">Mi portal</p>

        <a href="#inicio" onclick="showSection('inicio')"
           style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; font-weight:600; background:rgba(245,158,11,.18); color:#fbbf24; text-decoration:none; cursor:pointer;" id="nav-inicio">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Inicio
        </a>

        <a href="#inscripcion" onclick="showSection('inscripcion')"
           style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#64748b; text-decoration:none; cursor:pointer; transition:all .15s;" id="nav-inscripcion"
           onmouseover="hoverOn(this)" onmouseout="hoverOff(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg>
            Inscripción
        </a>

        <a href="#notas" onclick="showSection('notas')"
           style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#64748b; text-decoration:none; cursor:pointer; transition:all .15s;" id="nav-notas"
           onmouseover="hoverOn(this)" onmouseout="hoverOff(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            Mis notas
        </a>

        <a href="#pagos" onclick="showSection('pagos')"
           style="display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; font-size:13px; color:#64748b; text-decoration:none; cursor:pointer; transition:all .15s;" id="nav-pagos"
           onmouseover="hoverOn(this)" onmouseout="hoverOff(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            Estado de pagos
        </a>

        <div style="margin-top:auto; padding-top:14px; border-top:1px solid #334155; display:flex; align-items:center; gap:10px;">
            <div style="width:32px; height:32px; border-radius:50%; background:#f59e0b; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700; flex-shrink:0;">
                {{ strtoupper(substr($alumno->nombre,0,1).substr($alumno->apellido,0,1)) }}
            </div>
            <div style="flex:1; overflow:hidden;">
                <p style="font-size:13px; font-weight:500; color:#e2e8f0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $alumno->nombre_completo }}</p>
                <p style="font-size:11px; color:#475569;">{{ $alumno->codigo }}</p>
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

    {{-- ===== MAIN ===== --}}
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

            {{-- ===== SECCIÓN: INICIO ===== --}}
            <div id="sec-inicio">
                {{-- Banner --}}
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

                {{-- Tarjetas resumen --}}
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

                {{-- Últimas notas --}}
                @if($notas->count() > 0)
                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                    <div style="padding:14px 18px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                        <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Últimas notas</p>
                        <button onclick="showSection('notas')" style="font-size:12px; color:#f59e0b; background:none; border:none; cursor:pointer;">Ver todas</button>
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

            {{-- ===== SECCIÓN: INSCRIPCIÓN ===== --}}
            <div id="sec-inscripcion" style="display:none;">
                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; padding:24px;">
                    <h3 style="font-size:15px; font-weight:600; color:#e2e8f0; margin:0 0 18px;">Inscripción a sección</h3>

                    @if($inscripcion)
                    {{-- Ya inscrito --}}
                    <div style="background:#0f2a1a; border:1px solid #166534; border-radius:12px; padding:20px; display:flex; align-items:center; gap:16px;">
                        <div style="width:46px; height:46px; border-radius:12px; background:#14532d; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#34d399" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <div>
                            <p style="font-size:14px; font-weight:600; color:#34d399; margin:0 0 4px;">Ya estás inscrito</p>
                            <p style="font-size:13px; color:#6ee7b7; margin:0;">
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
                        <p style="font-size:13px; color:#64748b; margin:0 0 16px;">Selecciona la sección a la que deseas inscribirte. Solo puedes estar en una sección a la vez.</p>

                        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:12px; margin-bottom:20px;">
                            @foreach($cursosDisponibles as $curso)
                            <label style="cursor:pointer;">
                                <input type="radio" name="curso_id" value="{{ $curso->id }}" style="display:none;" class="curso-radio">
                                <div class="curso-card" style="background:#0f172a; border:1px solid #334155; border-radius:12px; padding:16px; text-align:center; transition:all .15s;">
                                    <div style="width:40px; height:40px; border-radius:10px; background:#1e3a5f; display:flex; align-items:center; justify-content:center; margin:0 auto 10px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    </div>
                                    <p style="font-size:15px; font-weight:700; color:#e2e8f0; margin:0 0 4px;">Sección {{ $curso->seccion }}</p>
                                    <p style="font-size:11px; color:#475569; margin:0;">Turno {{ $curso->nivel }}</p>
                                </div>
                            </label>
                            @endforeach
                        </div>

                        <button type="submit"
                                style="padding:10px 24px; background:#f59e0b; border:none; border-radius:8px; color:#000; font-size:14px; font-weight:700; cursor:pointer;"
                                onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e0b'">
                            Confirmar inscripción
                        </button>
                    </form>
                    @else
                    <p style="color:#64748b; font-size:13px;">No hay secciones disponibles en este momento.</p>
                    @endif
                    @endif
                </div>
            </div>

            {{-- ===== SECCIÓN: NOTAS ===== --}}
            <div id="sec-notas" style="display:none;">
                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                    <div style="padding:14px 18px; border-bottom:1px solid #334155;">
                        <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Mis notas</p>
                        @if($inscripcion)
                        <p style="font-size:12px; color:#475569; margin:3px 0 0;">Sección {{ $inscripcion->curso->seccion }} · Turno {{ $inscripcion->curso->nivel }}</p>
                        @endif
                    </div>

                    @if($notas->count() > 0)
                    <div style="overflow-x:auto;">
                        <table style="width:100%; border-collapse:collapse; font-size:13px;">
                            <thead>
                                <tr style="background:#0f172a;">
                                    <th style="padding:10px 16px; text-align:left; color:#475569; font-weight:500; font-size:11px; text-transform:uppercase;">Materia</th>
                                    <th style="padding:10px 12px; text-align:left; color:#475569; font-weight:500; font-size:11px; text-transform:uppercase;">Docente</th>
                                    <th style="padding:10px 8px; text-align:center; color:#a78bfa; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">Laboratorio</th>
                                    <th style="padding:10px 8px; text-align:center; color:#fbbf24; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">Ex. Teórico</th>
                                    <th style="padding:10px 8px; text-align:center; color:#34d399; font-weight:600; font-size:11px; text-transform:uppercase; width:90px;">Práctica</th>
                                    <th style="padding:10px 8px; text-align:center; color:#f87171; font-weight:600; font-size:11px; text-transform:uppercase; width:80px;">SOS</th>
                                    <th style="padding:10px 8px; text-align:center; color:#e2e8f0; font-weight:700; font-size:11px; text-transform:uppercase; width:80px;">Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notas as $nota)
                                @php $p = $nota->promedio; @endphp
                                <tr style="border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                                    <td style="padding:12px 16px; color:#e2e8f0; font-weight:500;">{{ $nota->detalleCurso->materia->nombre }}</td>
                                    <td style="padding:12px 12px; color:#64748b; font-size:12px;">{{ $nota->detalleCurso->maestro->nombre_completo }}</td>
                                    <td style="padding:12px 8px; text-align:center; color:#c4b5fd;">{{ $nota->laboratorio ?? '—' }}</td>
                                    <td style="padding:12px 8px; text-align:center; color:#fcd34d;">{{ $nota->examen_teorico ?? '—' }}</td>
                                    <td style="padding:12px 8px; text-align:center; color:#6ee7b7;">{{ $nota->practica ?? '—' }}</td>
                                    <td style="padding:12px 8px; text-align:center; color:#fca5a5;">{{ $nota->sos ?? '—' }}</td>
                                    <td style="padding:12px 8px; text-align:center;">
                                        @if($p !== null)
                                        <span style="width:32px; height:32px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; color:#fff;
                                            background:{{ $p >= 9 ? '#059669' : ($p >= 7 ? '#d97706' : ($p >= 6 ? '#ea580c' : '#dc2626')) }};">
                                            {{ $p }}
                                        </span>
                                        @else
                                        <span style="color:#334155;">—</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @elseif($inscripcion)
                    <div style="padding:40px; text-align:center;">
                        <p style="color:#475569; font-size:13px;">Aún no tienes notas registradas.</p>
                    </div>
                    @else
                    <div style="padding:40px; text-align:center;">
                        <p style="color:#475569; font-size:13px;">Debes inscribirte a una sección primero.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- ===== SECCIÓN: PAGOS ===== --}}
            <div id="sec-pagos" style="display:none;">
                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                    <div style="padding:14px 18px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                        <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Estado de mensualidades 2026</p>
                        @php
                            $pagados = $mensualidades->where('estado','pagado')->count();
                            $totalMeses = $mensualidades->count();
                        @endphp
                        @if($totalMeses > 0)
                        <span style="font-size:12px; color:#64748b;">{{ $pagados }}/{{ $totalMeses }} pagados</span>
                        @endif
                    </div>

                    @if($mensualidades->count() > 0)
                    <div>
                        @foreach($mensualidades as $m)
                        <div style="display:flex; align-items:center; padding:13px 18px; border-top:1px solid #0f172a;"
                             onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div style="width:34px; height:34px; border-radius:8px; background:{{ $m->estado === 'pagado' ? 'rgba(16,185,129,.15)' : 'rgba(239,68,68,.15)' }}; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-right:14px;">
                                @if($m->estado === 'pagado')
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="#34d399" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="#f87171" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                @endif
                            </div>
                            <div style="flex:1;">
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">{{ $m->mes }} {{ $m->anio }}</p>
                                @if($m->fecha_pago)
                                <p style="font-size:11px; color:#475569; margin:2px 0 0;">Pagado el {{ \Carbon\Carbon::parse($m->fecha_pago)->isoFormat('D MMM YYYY') }}</p>
                                @endif
                            </div>
                            @if($m->monto > 0)
                            <p style="font-size:13px; color:#94a3b8; margin:0 16px;">${{ number_format($m->monto, 2) }}</p>
                            @endif
                            <span style="font-size:11px; font-weight:600; padding:4px 12px; border-radius:20px;
                                background:{{ $m->estado === 'pagado' ? 'rgba(16,185,129,.15)' : 'rgba(239,68,68,.15)' }};
                                color:{{ $m->estado === 'pagado' ? '#34d399' : '#f87171' }};">
                                {{ $m->estado === 'pagado' ? 'Pagado' : 'Pendiente' }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div style="padding:40px; text-align:center;">
                        <p style="color:#475569; font-size:13px;">No hay registros de mensualidades aún.</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script>
const sections = ['inicio','inscripcion','notas','pagos'];
const activeStyle  = { background:'rgba(245,158,11,.18)', color:'#fbbf24', fontWeight:'600' };
const inactiveStyle = { background:'transparent', color:'#64748b', fontWeight:'400' };

function showSection(name) {
    sections.forEach(s => {
        const sec = document.getElementById('sec-'+s);
        const nav = document.getElementById('nav-'+s);
        if (sec) sec.style.display = s === name ? 'block' : 'none';
        if (nav) {
            nav.style.background   = s === name ? activeStyle.background  : inactiveStyle.background;
            nav.style.color        = s === name ? activeStyle.color        : inactiveStyle.color;
            nav.style.fontWeight   = s === name ? activeStyle.fontWeight   : inactiveStyle.fontWeight;
        }
    });
    return false;
}

function hoverOn(el)  { if (el.style.fontWeight !== '600') { el.style.background='#334155'; el.style.color='#e2e8f0'; } }
function hoverOff(el) { if (el.style.fontWeight !== '600') { el.style.background='transparent'; el.style.color='#64748b'; } }

// Selección visual de sección en inscripción
document.querySelectorAll('.curso-radio').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.curso-card').forEach(c => {
            c.style.borderColor = '#334155';
            c.style.background  = '#0f172a';
        });
        const card = radio.nextElementSibling;
        card.style.borderColor = '#f59e0b';
        card.style.background  = 'rgba(245,158,11,.08)';
    });
});
</script>
</x-app-layout>
