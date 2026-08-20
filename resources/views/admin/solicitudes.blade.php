<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'solicitudes'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">
        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Solicitudes de Inscripción</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $pendientes->count() }} pendientes de revisión</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px; display:flex; flex-direction:column; gap:20px;">
            {{-- ═══ PENDIENTES ═══ --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                    <div style="width:4px; height:16px; background:#f59e0b; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Pendientes de revisión</p>
                    @if($pendientes->count() > 0)
                    <span style="background:#fef3c7; color:#d97706; padding:2px 8px; border-radius:10px; font-size:11px; font-weight:600;">{{ $pendientes->count() }}</span>
                    @endif
                </div>

                @forelse($pendientes as $ins)
                @php
                    $datosEnc = $ins->observacion ? json_decode($ins->observacion, true) : [];
                @endphp
                <div style="padding:20px 24px; border-bottom:1px solid #f3f4f6;">
                    <div style="display:flex; align-items:flex-start; justify-content:space-between; gap:16px;">

                        {{-- Info alumno + encargado --}}
                        <div style="flex:1;">

                            {{-- Alumno --}}
                            <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                                <div style="width:42px; height:42px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:13px; font-weight:700; flex-shrink:0;">
                                    {{ strtoupper(substr($ins->alumno->nombre,0,1).substr($ins->alumno->apellido,0,1)) }}
                                </div>
                                <div>
                                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">
                                        {{ $ins->alumno->nombre_completo }}
                                    </p>
                                    <p style="font-size:12px; color:#6b7280; margin:2px 0 0;">
                                        Código: <strong>{{ $ins->alumno->codigo }}</strong>
                                        · Sección solicitada: <strong>{{ $ins->curso->seccion }}</strong>
                                        ({{ $ins->curso->nivel }})
                                    </p>
                                    <p style="font-size:11px; color:#9ca3af; margin:2px 0 0;">
                                        Enviado: {{ \Carbon\Carbon::parse($ins->created_at)->isoFormat('D [de] MMMM YYYY [a las] HH:mm') }}
                                    </p>
                                </div>
                            </div>

                            {{-- Datos del encargado --}}
                            @if(!empty($datosEnc['encargado_nombre']))
                            <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:10px; padding:14px;">
                                <p style="font-size:11px; font-weight:700; color:#6b7280; text-transform:uppercase; letter-spacing:.05em; margin:0 0 10px;">
                                    Datos del Encargado
                                </p>
                                <div style="display:grid; grid-template-columns:repeat(2,1fr); gap:10px;">
                                    <div>
                                        <p style="font-size:10px; color:#9ca3af; margin:0 0 2px;">Nombre</p>
                                        <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $datosEnc['encargado_nombre'] ?? '—' }}</p>
                                    </div>
                                    <div>
                                        <p style="font-size:10px; color:#9ca3af; margin:0 0 2px;">Parentesco</p>
                                        <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $datosEnc['encargado_parentesco'] ?? '—' }}</p>
                                    </div>
                                    <div>
                                        <p style="font-size:10px; color:#9ca3af; margin:0 0 2px;">Teléfono</p>
                                        <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $datosEnc['encargado_telefono'] ?? '—' }}</p>
                                    </div>
                                    <div>
                                        <p style="font-size:10px; color:#9ca3af; margin:0 0 2px;">DUI</p>
                                        <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $datosEnc['encargado_dui'] ?? '—' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>

                        {{-- Acciones --}}
                        <div style="display:flex; flex-direction:column; gap:8px; flex-shrink:0; min-width:140px;">

                            {{-- Ver PDF --}}
                            @if($ins->documento_path)
                            <a href="{{ asset('storage/'.$ins->documento_path) }}" target="_blank"
                               style="display:inline-flex; align-items:center; justify-content:center; gap:6px; padding:8px 14px; background:#f3f4f6; border-radius:8px; font-size:12px; font-weight:600; color:#374151; text-decoration:none;"
                               onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Ver PDF
                            </a>
                            @endif

                            {{-- Aprobar --}}
                            <form method="POST" action="{{ route('admin.solicitudes.aprobar', $ins->id) }}"
                                  data-confirm="¿Aprobar la inscripción de {{ $ins->alumno->nombre_completo }}?"
                                  data-confirm-titulo="Aprobar inscripción"
                                  data-confirm-boton="Sí, aprobar"
                                  data-confirm-tipo="exito">
                                @csrf
                                <button type="submit"
                                    style="width:100%; padding:8px 14px; background:#f0fdf4; border:1px solid #86efac; border-radius:8px; font-size:12px; font-weight:600; color:#16a34a; cursor:pointer;"
                                    onmouseover="this.style.background='#dcfce7'" onmouseout="this.style.background='#f0fdf4'">
                                    ✓ Aprobar
                                </button>
                            </form>

                            {{-- Rechazar --}}
                            <button onclick="abrirRechazo({{ $ins->id }}, '{{ addslashes($ins->alumno->nombre) }} {{ addslashes($ins->alumno->apellido) }}')"
                                style="padding:8px 14px; background:#fef2f2; border:1px solid #fecaca; border-radius:8px; font-size:12px; font-weight:600; color:#dc2626; cursor:pointer; width:100%;"
                                onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">
                                ✕ Rechazar
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">
                    <div style="width:48px; height:48px; border-radius:14px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    No hay solicitudes pendientes.
                </div>
                @endforelse
            </div>

            {{-- ═══ PROCESADAS ═══ --}}
            @if($procesadas->count() > 0)
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                    <div style="width:4px; height:16px; background:#6b7280; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Procesadas recientemente</p>
                </div>
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Alumno</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Curso</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Encargado</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Estado</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($procesadas as $ins)
                        @php
                            $datosEnc = $ins->observacion ? json_decode($ins->observacion, true) : [];
                            $esJson   = isset($datosEnc['encargado_nombre']);
                        @endphp
                        <tr style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                            onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                            <td style="padding:12px 24px;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:30px; height:30px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:10px; font-weight:700; flex-shrink:0;">
                                        {{ strtoupper(substr($ins->alumno->nombre,0,1).substr($ins->alumno->apellido,0,1)) }}
                                    </div>
                                    <div>
                                        <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $ins->alumno->nombre_completo }}</p>
                                        <p style="font-size:11px; color:#9ca3af; margin:0;">{{ $ins->alumno->codigo }}</p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px 24px; font-size:13px; color:#6b7280;">
                                Sección {{ $ins->curso->seccion }} — {{ $ins->curso->nivel }}
                            </td>
                            <td style="padding:12px 24px; font-size:13px; color:#374151;">
                                @if($esJson && !empty($datosEnc['encargado_nombre']))
                                    <p style="margin:0; font-weight:500;">{{ $datosEnc['encargado_nombre'] }}</p>
                                    <p style="margin:0; font-size:11px; color:#9ca3af;">{{ $datosEnc['encargado_parentesco'] ?? '' }}</p>
                                @else
                                    <span style="color:#9ca3af;">—</span>
                                @endif
                            </td>
                            <td style="padding:12px 24px;">
                                @if($ins->estado === 'aprobada')
                                    <span style="background:#f0fdf4; color:#16a34a; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Aprobada</span>
                                @else
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Rechazada</span>
                                @endif
                            </td>
                            <td style="padding:12px 24px; font-size:12px; color:#6b7280;">
                                @if($esJson)
                                    —
                                @else
                                    {{ $ins->observacion ?? '—' }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

        </div>
    </div>
</div>

@include('admin.partials.modal-rechazo-solicitud')

@push('scripts')
@vite('resources/js/admin/solicitudes.js')
@endpush
<x-logout-modal />
</x-app-layout>
