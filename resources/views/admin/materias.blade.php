<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ADMINISTRADOR - MATERIAS (TEMA OSCURO) --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'materias'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ADMIN: CONTENIDO PRINCIPAL - MATERIAS --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#0f172a;">

        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#10b981; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#e2e8f0;">Gestión de Materias</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">13 materias activas</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: TABLA DE MATERIAS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                <div style="padding:18px 24px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                    <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Listado de Materias</p>
                    <button style="background:#10b981; border:none; padding:8px 16px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;">
                        + Nueva Materia
                    </button>
                </div>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="border-bottom:1px solid #334155; background:#162032;">
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Código</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Nombre</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Maestro</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Sección</th>
                            <th style="padding:12px 24px; text-align:left; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Estudiantes</th>
                            <th style="padding:12px 24px; text-align:center; font-size:12px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">MAT-001</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Windows</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Carlos Mendoza</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato A</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">35</td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">MAT-002</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Word</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Carlos Mendoza</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato A</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">35</td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">MAT-003</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Excel</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Carlos Mendoza</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato A</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">35</td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">MAT-004</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">CorelDRAW</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Ana López</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato B</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">32</td>
                            <td style="padding:14px 24px; text-align:center;">
                                <button style="background:none; border:none; color:#60a5fa; cursor:pointer; font-size:12px; font-weight:600;">Editar</button>
                            </td>
                        </tr>
                        <tr style="border-bottom:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">MAT-005</td>
                            <td style="padding:14px 24px; color:#e2e8f0; font-size:13px;">Photoshop</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Ana López</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">Bachillerato B</td>
                            <td style="padding:14px 24px; color:#64748b; font-size:13px;">32</td>
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
