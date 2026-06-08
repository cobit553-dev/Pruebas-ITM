<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'alumnos'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Gestión de Alumnos</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">142 alumnos inscritos</p>
                </div>
            </div>
            <span style="font-size:12px; color:#9ca3af; background:#f3f4f6; padding:6px 12px; border-radius:8px;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- Tarjeta de estadística --}}
            <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:20px;">
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#eff6ff; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#3b82f6" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">142</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Total alumnos</p>
                    </div>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#f0fdf4; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#16a34a" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">138</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Activos</p>
                    </div>
                </div>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:14px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef2f2; display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#dc2626" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    </div>
                    <div>
                        <p style="font-size:22px; font-weight:700; color:#111827; margin:0;">4</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">Inactivos</p>
                    </div>
                </div>
            </div>

            {{-- Tabla --}}
            <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,0.04);">
                <div style="padding:16px 24px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; justify-content:space-between;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:4px; height:18px; background:#3b82f6; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Listado de Alumnos</p>
                    </div>
                    <button style="background:#3b82f6; border:none; padding:8px 16px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                        onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                        + Nuevo Alumno
                    </button>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f8fafc;">
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Matrícula</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Nombre</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Email</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Sección</th>
                            <th style="padding:11px 24px; text-align:left; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Estado</th>
                            <th style="padding:11px 24px; text-align:center; font-size:11px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.05em;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rows = [
                            ['A-001','Juan Carlos Pérez','juan.perez@itm.edu.sv','Bachillerato A',true],
                            ['A-002','María Elena López','maria.lopez@itm.edu.sv','Bachillerato B',true],
                            ['A-003','Roberto Flores','roberto.flores@itm.edu.sv','Bachillerato A',true],
                            ['A-004','Alejandra Martínez','alejandra.martinez@itm.edu.sv','Bachillerato C',false],
                        ]; @endphp
                        @foreach($rows as $i => $row)
                        <tr style="border-top:1px solid #f1f5f9; background:{{ $i % 2 === 0 ? '#ffffff' : '#f8fafc' }};"
                            onmouseover="this.style.background='#eff6ff'" onmouseout="this.style.background='{{ $i % 2 === 0 ? '#ffffff' : '#f8fafc' }}'">
                            <td style="padding:13px 24px; color:#6b7280; font-size:13px; font-family:monospace; font-weight:600;">{{ $row[0] }}</td>
                            <td style="padding:13px 24px; color:#111827; font-size:13px; font-weight:500;">{{ $row[1] }}</td>
                            <td style="padding:13px 24px; color:#6b7280; font-size:13px;">{{ $row[2] }}</td>
                            <td style="padding:13px 24px;">
                                <span style="background:#eff6ff; color:#3b82f6; padding:3px 10px; border-radius:5px; font-size:12px; font-weight:500;">{{ $row[3] }}</span>
                            </td>
                            <td style="padding:13px 24px;">
                                @if($row[4])
                                    <span style="background:#f0fdf4; color:#16a34a; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Activo</span>
                                @else
                                    <span style="background:#fef2f2; color:#dc2626; padding:4px 10px; border-radius:6px; font-size:12px; font-weight:600;">● Inactivo</span>
                                @endif
                            </td>
                            <td style="padding:13px 24px; text-align:center;">
                                <button style="background:#eff6ff; border:none; color:#3b82f6; cursor:pointer; font-size:12px; font-weight:600; padding:5px 14px; border-radius:6px;"
                                    onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">Editar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
