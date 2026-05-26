<x-app-layout>
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}
{{-- VISTA: ADMINISTRADOR - DASHBOARD (TEMA OSCURO) --}}
{{-- ═══════════════════════════════════════════════════════════════════════════════════════════════ --}}

<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'dashboard'])

    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    {{-- ADMIN: CONTENIDO PRINCIPAL --}}
    {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#0f172a;">

        <header style="background:#1e293b; border-bottom:1px solid #334155; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#10b981; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#e2e8f0;">Panel del Director</h2>
                    <p style="font-size:12px; color:#64748b; margin:0;">Ciclo escolar 2026 · ITM Aguilares</p>
                </div>
            </div>
            <span style="font-size:12px; color:#475569;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: BANNER DE BIENVENIDA --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="background:#1a5f4a; border:1px solid #10b981; border-radius:14px; padding:20px 24px; display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                <div>
                    <h3 style="font-size:16px; font-weight:700; color:#10b981; margin:0 0 4px;">Bienvenido, Administrador ITM</h3>
                    <p style="font-size:13px; color:#86efac; margin:0;">Resumen del ciclo escolar 2026</p>
                </div>
                <div style="display:flex; gap:12px;">
                    <div style="background:rgba(16,185,129,.2); border:1px solid rgba(16,185,129,.3); border-radius:10px; padding:12px 18px; text-align:center;">
                        <p style="font-size:22px; font-weight:700; color:#10b981; margin:0;">87%</p>
                        <p style="font-size:11px; color:#86efac; margin:0;">Pagos al día</p>
                    </div>
                    <div style="background:rgba(16,185,129,.2); border:1px solid rgba(16,185,129,.3); border-radius:10px; padding:12px 18px; text-align:center;">
                        <p style="font-size:22px; font-weight:700; color:#10b981; margin:0;">8.4</p>
                        <p style="font-size:11px; color:#86efac; margin:0;">Promedio general</p>
                    </div>
                </div>
            </div>

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: ESTADÍSTICAS --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:20px;">

                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                        <a href="{{ route('admin.alumnos') }}" style="color:#60a5fa; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0;">142</p>
                    <p style="font-size:12px; color:#64748b; margin:4px 0 0;">Alumnos inscritos</p>
                </div>

                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        <a href="{{ route('admin.maestros') }}" style="color:#fbbf24; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0;">9</p>
                    <p style="font-size:12px; color:#64748b; margin:4px 0 0;">Maestros activos</p>
                </div>

                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6.5"/></svg>
                        <a href="{{ route('admin.materias') }}" style="color:#10b981; text-decoration:none; font-size:12px; font-weight:600;">Ver</a>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0;">13</p>
                    <p style="font-size:12px; color:#64748b; margin:4px 0 0;">Materias activas</p>
                </div>

                <div style="background:#1e293b; border:1px solid #334155; border-radius:12px; padding:18px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#f87171" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span style="color:#f87171; font-size:12px; font-weight:600;">—</span>
                    </div>
                    <p style="font-size:24px; font-weight:700; color:#f1f5f9; margin:0;">18</p>
                    <p style="font-size:12px; color:#64748b; margin:4px 0 0;">Pagos pendientes</p>
                </div>

            </div>

            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            {{-- ADMIN: TABLAS DE INFORMACIÓN --}}
            {{-- ───────────────────────────────────────────────────────────────────────────────────────── --}}
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">

                {{-- Maestros activos --}}
                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                    <div style="padding:14px 18px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                        <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Maestros activos</p>
                        <a href="{{ route('admin.maestros') }}" style="font-size:12px; color:#10b981; text-decoration:none;">Gestionar</a>
                    </div>
                    <div>
                        <div style="display:flex; align-items:center; padding:12px 18px; border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div style="width:32px; height:32px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0; margin-right:12px;">CM</div>
                            <div style="flex:1;">
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">Carlos Mendoza</p>
                                <p style="font-size:11px; color:#475569; margin:2px 0 0;">Windows, Word, Excel</p>
                            </div>
                            <span style="font-size:11px; color:#10b981; font-weight:600;">Activo</span>
                        </div>
                        <div style="display:flex; align-items:center; padding:12px 18px; border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div style="width:32px; height:32px; border-radius:50%; background:#8b5cf6; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; flex-shrink:0; margin-right:12px;">AL</div>
                            <div style="flex:1;">
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">Ana López</p>
                                <p style="font-size:11px; color:#475569; margin:2px 0 0;">CorelDRAW, Photoshop, HTML</p>
                            </div>
                            <span style="font-size:11px; color:#10b981; font-weight:600;">Activo</span>
                        </div>
                    </div>
                </div>

                {{-- Estado de mensualidades --}}
                <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; overflow:hidden;">
                    <div style="padding:14px 18px; border-bottom:1px solid #334155; display:flex; align-items:center; justify-content:space-between;">
                        <p style="font-size:14px; font-weight:600; color:#e2e8f0; margin:0;">Estado de mensualidades</p>
                        <span style="font-size:12px; color:#64748b;">123/142 pagadas</span>
                    </div>
                    <div>
                        <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 18px; border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div>
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">Enero 2026</p>
                            </div>
                            <span style="font-size:11px; font-weight:600; padding:4px 12px; border-radius:20px; background:rgba(16,185,129,.15); color:#10b981;">Pagado</span>
                        </div>
                        <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 18px; border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div>
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">Febrero 2026</p>
                            </div>
                            <span style="font-size:11px; font-weight:600; padding:4px 12px; border-radius:20px; background:rgba(16,185,129,.15); color:#10b981;">Pagado</span>
                        </div>
                        <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 18px; border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div>
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">Marzo 2026</p>
                            </div>
                            <span style="font-size:11px; font-weight:600; padding:4px 12px; border-radius:20px; background:rgba(16,185,129,.15); color:#10b981;">Pagado</span>
                        </div>
                        <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 18px; border-top:1px solid #0f172a;" onmouseover="this.style.background='#162032'" onmouseout="this.style.background='transparent'">
                            <div>
                                <p style="font-size:13px; font-weight:500; color:#e2e8f0; margin:0;">Abril 2026</p>
                            </div>
                            <span style="font-size:11px; font-weight:600; padding:4px 12px; border-radius:20px; background:rgba(248,113,113,.15); color:#f87171;">Pendiente</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</x-app-layout>
