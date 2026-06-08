<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'secciones'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <a href="{{ route('admin.secciones') }}"
                   style="width:32px; height:32px; border-radius:8px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; text-decoration:none; color:#6b7280;"
                   onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                </a>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">{{ $curso->nombre }} — Detalle</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $curso->nivel }} · {{ $curso->anio_lectivo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px; display:flex; flex-direction:column; gap:20px;">

            {{-- Stats del curso --}}
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px;">
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px;">
                    <p style="font-size:11px; color:#6b7280; text-transform:uppercase; font-weight:600; margin:0 0 6px;">Alumnos inscritos</p>
                    <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">{{ $curso->inscripciones->count() }}</p>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px;">
                    <p style="font-size:11px; color:#6b7280; text-transform:uppercase; font-weight:600; margin:0 0 6px;">Materias</p>
                    <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">{{ $curso->detalleCursos->count() }}</p>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px;">
                    <p style="font-size:11px; color:#6b7280; text-transform:uppercase; font-weight:600; margin:0 0 6px;">Sección</p>
                    <p style="font-size:26px; font-weight:700; color:#111827; margin:0;">{{ $curso->seccion }}</p>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                {{-- Alumnos inscritos --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                    <div style="padding:16px 20px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                        <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Alumnos inscritos</p>
                    </div>
                    <div style="max-height:300px; overflow-y:auto;">
                        @forelse($curso->inscripciones as $inscripcion)
                        <div style="display:flex; align-items:center; gap:12px; padding:12px 20px; border-bottom:1px solid #f3f4f6;">
                            <div style="width:32px; height:32px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0;">
                                {{ strtoupper(substr($inscripcion->alumno->nombre,0,1).substr($inscripcion->alumno->apellido,0,1)) }}
                            </div>
                            <div>
                                <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $inscripcion->alumno->nombre }} {{ $inscripcion->alumno->apellido }}</p>
                                <p style="font-size:11px; color:#9ca3af; margin:0;">{{ $inscripcion->alumno->codigo }}</p>
                            </div>
                        </div>
                        @empty
                        <p style="padding:20px; text-align:center; color:#9ca3af; font-size:13px;">Sin alumnos inscritos</p>
                        @endforelse
                    </div>
                </div>

                {{-- Materias y maestros --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                    <div style="padding:16px 20px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                        <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Materias y Maestros</p>
                    </div>
                    <div style="max-height:300px; overflow-y:auto;">
                        @forelse($curso->detalleCursos as $detalle)
                        <div style="padding:12px 20px; border-bottom:1px solid #f3f4f6;">
                            <p style="font-size:13px; font-weight:600; color:#111827; margin:0 0 2px;">{{ $detalle->materia->nombre }}</p>
                            <p style="font-size:12px; color:#6b7280; margin:0;">
                                Prof. {{ $detalle->maestro->nombre ?? '' }} {{ $detalle->maestro->apellido ?? '' }}
                            </p>
                        </div>
                        @empty
                        <p style="padding:20px; text-align:center; color:#9ca3af; font-size:13px;">Sin materias asignadas</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
