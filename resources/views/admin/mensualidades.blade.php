<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">
    @include('components.admin-sidebar', ['active' => 'mensualidades'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">
        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Mensualidades</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $mensualidades->count() }} mensualidades registradas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; font-size:13px; color:#16a34a; margin-bottom:20px;">
                ✓ {{ session('success') }}
            </div>
            @endif

            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                    <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Listado de Mensualidades</p>
                </div>
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f9fafb; border-bottom:1px solid #e5e7eb;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">#</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Alumno</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Mes</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Monto</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Estado</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Vencimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mensualidades as $mensualidad)
                        <tr style="border-top:1px solid #f1f5f9; background:{{ $loop->even ? '#f8fafc' : '#ffffff' }};"
                            onmouseover="this.style.background='#f0f9ff'" onmouseout="this.style.background='{{ $loop->even ? '#f8fafc' : '#ffffff' }}'">
                            <td style="padding:13px 24px; color:#6b7280; font-size:13px;">{{ $loop->iteration }}</td>
                            <td style="padding:13px 24px;">
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div style="width:32px; height:32px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0;">
                                        {{ strtoupper(substr($mensualidad->alumno->nombre ?? '',0,1).substr($mensualidad->alumno->apellido ?? '',0,1)) }}
                                    </div>
                                    <span style="font-size:13px; font-weight:500; color:#111827;">{{ $mensualidad->alumno->nombre ?? 'N/A' }} {{ $mensualidad->alumno->apellido ?? '' }}</span>
                                </div>
                            </td>
                            <td style="padding:13px 24px; font-size:13px; color:#111827; font-weight:500;">{{ $mensualidad->mes }}</td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280;">${{ number_format($mensualidad->monto, 2) }}</td>
                            <td style="padding:13px 24px;">
                                @if($mensualidad->estado === 'pagado')
                                    <span style="background:#f0fdf4; color:#16a34a; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">Pagado</span>
                                @elseif($mensualidad->estado === 'pendiente')
                                    <span style="background:#fef3c7; color:#d97706; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">Pendiente</span>
                                @else
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">Vencido</span>
                                @endif
                            </td>
                            <td style="padding:13px 24px; font-size:13px; color:#6b7280;">{{ \Carbon\Carbon::parse($mensualidad->fecha_vencimiento)->format('d/m/Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="padding:40px; text-align:center; color:#9ca3af; font-size:13px;">No hay mensualidades registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>