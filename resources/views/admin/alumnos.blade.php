<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ADMINISTRADOR - ALUMNOS (TEMA OSCURO) --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'alumnos'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ADMIN: CONTENIDO PRINCIPAL - ALUMNOS --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#0f172a;">

        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#60a5fa; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#e2e8f0;">Gestión de Alumnos</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">142 alumnos inscritos</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: TABLA DE ALUMNOS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                <div style="padding:18px 24px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                    <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Listado de Alumnos</p>
                    <button style="background:#10b981; border:none; padding:8px 16px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;">
                        + Nuevo Alumno
                    </button>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="border-bottom:1px solid #334155; background:#162032;">
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Matrícula</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Nombre</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Email</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Sección</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Estado</th>
                            <th style="padding:12px 24px; text-align:center; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">A-001</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Juan Carlos Pérez</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">juan.perez@itm.edu.sv</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato A</td>
                            <td style="padding:14px 24px;"><span style="background:rgba(16,185,129,.15); color:#10b981; padding:4px 12px; border-radius:6px; font-size:12px; font-weight:600;">Activo</span></td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">A-002</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">María Elena López</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">maria.lopez@itm.edu.sv</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato B</td>
                            <td style="padding:14px 24px;"><span style="background:rgba(16,185,129,.15); color:#10b981; padding:4px 12px; border-radius:6px; font-size:12px; font-weight:600;">Activo</span></td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">A-003</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Roberto Flores</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">roberto.flores@itm.edu.sv</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato A</td>
                            <td style="padding:14px 24px;"><span style="background:rgba(16,185,129,.15); color:#10b981; padding:4px 12px; border-radius:6px; font-size:12px; font-weight:600;">Activo</span></td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">A-004</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Alejandra Martínez</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">alejandra.martinez@itm.edu.sv</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato C</td>
                            <td style="padding:14px 24px;"><span style="background:rgba(248,113,113,.15); color:#f87171; padding:4px 12px; border-radius:6px; font-size:12px; font-weight:600;">Inactivo</span></td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
