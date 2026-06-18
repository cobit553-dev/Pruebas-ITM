<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'inscripciones'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">
        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Inscripciones</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $inscripciones->count() }} inscripciones registradas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px; display:flex; flex-direction:column; gap:20px;">

            {{-- Mensajes --}}
            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; font-size:13px; color:#16a34a; display:flex; align-items:center; gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:10px; padding:12px 16px; font-size:13px; color:#dc2626; display:flex; align-items:center; gap:8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                {{ session('error') }}
            </div>
            @endif

            {{-- Formulario nueva inscripción --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:24px;">
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:18px;">
                    <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Nueva Inscripción</p>
                </div>

                <form method="POST" action="{{ route('admin.inscripciones.store') }}" style="display:grid; grid-template-columns:1fr 1fr auto; gap:12px; align-items:end;">
                    @csrf
                    <div style="min-width:0;">
                        <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Alumno</label>
                        <select name="alumno_id" required
                            style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                            onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                            <option value="">Seleccionar alumno...</option>
                            @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}"
                                {{ in_array($alumno->id, $alumnosInscritos) ? 'disabled style=color:#9ca3af' : '' }}>
                                {{ $alumno->nombre }} {{ $alumno->apellido }} — {{ $alumno->codigo }}
                                {{ in_array($alumno->id, $alumnosInscritos) ? '(ya inscrito)' : '' }}
                            </option>
                            @endforeach
                        </select>
                        <p style="font-size:11px; color:#9ca3af; margin:4px 0 0;">Los alumnos marcados como "ya inscrito" tienen una inscripción activa.</p>
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Sección / Curso</label>
                        <select name="curso_id" required
                            style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;"
                            onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                            <option value="">Seleccionar curso...</option>
                            @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }} — {{ $curso->nivel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        style="padding:10px 20px; background:#111827; color:#fff; border:none; border-radius:10px; font-size:13px; font-weight:600; cursor:pointer; white-space:nowrap;"
                        onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                        + Inscribir
                    </button>
                </form>
            </div>

            {{-- Tabla de inscripciones --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; justify-content:space-between;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Listado de Inscripciones</p>
                    </div>
                    <div style="display:flex; gap:10px; align-items:center;">
                        <span style="font-size:12px; color:#6b7280;">
                            <span style="background:#f0fdf4; color:#16a34a; padding:3px 8px; border-radius:5px; font-size:11px; font-weight:600;">{{ $inscripciones->where('activa',1)->count() }} activas</span>
                            <span style="background:#fef2f2; color:#dc2626; padding:3px 8px; border-radius:5px; font-size:11px; font-weight:600; margin-left:4px;">{{ $inscripciones->where('activa',0)->count() }} inactivas</span>
                        </span>
                    </div>
                </div>
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">#</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Alumno</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Código</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Curso</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Turno</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Fecha</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Estado</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inscripciones as $ins)
                        <tr style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                            onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                            <td style="padding:13px 24px; color:#6b7280; font-size:13px;">{{ $loop->iteration }}</td>
                            <td style="padding:13px 24px;">
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div style="width:32px; height:32px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0;">
                                        {{ strtoupper(substr($ins->alumno->nombre,0,1).substr($ins->alumno->apellido,0,1)) }}
                                    </div>
                                    <span style="font-size:13px; font-weight:500; color:#111827;">{{ $ins->alumno->nombre }} {{ $ins->alumno->apellido }}</span>
                                </div>
                            </td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280; font-family:monospace;">{{ $ins->alumno->codigo }}</td>
                            <td style="padding:13px 24px; font-size:13px; color:#111827; font-weight:500;">{{ $ins->curso->nombre }}</td>
                            <td style="padding:13px 24px;">
                                <span style="background:#f3f4f6; color:#374151; padding:3px 10px; border-radius:5px; font-size:12px;">{{ $ins->curso->nivel }}</span>
                            </td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280;">{{ \Carbon\Carbon::parse($ins->fecha_inscripcion)->format('d/m/Y') }}</td>
                            <td style="padding:13px 24px;">
                                @if($ins->activa)
                                    <span style="background:#f0fdf4; color:#16a34a; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Activa</span>
                                @else
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Inactiva</span>
                                @endif
                            </td>
                            <td style="padding:13px 24px; text-align:center;">
                                @if($ins->activa)
                                <form method="POST" action="{{ route('admin.inscripciones.desactivar', $ins->id) }}"
                                    onsubmit="return confirm('¿Desactivar la inscripción de {{ $ins->alumno->nombre }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background:#fef2f2; border:none; color:#dc2626; cursor:pointer; font-size:12px; font-weight:600; padding:5px 14px; border-radius:6px;"
                                        onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">
                                        Desactivar
                                    </button>
                                </form>
                                @else
                                <span style="font-size:12px; color:#9ca3af;">—</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">No hay inscripciones registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
