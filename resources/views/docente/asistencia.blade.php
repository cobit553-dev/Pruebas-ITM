<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    <x-docente-sidebar :maestro="$maestro" active="asistencia" />

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#ffffff;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:#3b82f6; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg>
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#1f2937;">Control de Asistencia</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $maestro->nombre_completo }}</p>
                </div>
            </div>
            <span style="font-size:12px; color:#6b7280;">{{ now()->isoFormat('MMMM YYYY') }}</span>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px; display:flex; align-items:center; justify-content:center;">
            <div style="text-align:center; color:#9ca3af;">
                <div style="width:54px; height:54px; background:#f3f4f6; border-radius:14px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" stroke="#3b82f6" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg>
                </div>
                <p style="font-size:15px; font-weight:600; color:#1f2937; margin:0 0 6px;">Módulo de Asistencia</p>
                <p style="font-size:13px; color:#6b7280; margin:0;">Próximamente disponible.</p>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
