<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'encargados'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#fafafa;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:40px; height:40px; border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div>
                    <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">Gestión de Encargados</h2>
                    <p style="font-size:12px; color:#6b7280; margin:0;">{{ $encargados->count() }} encargados registrados</p>
                </div>
            </div>
            <button style="background:#111827; border:none; padding:8px 18px; border-radius:8px; color:#fff; font-size:12px; font-weight:600; cursor:pointer;"
                onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                + Nuevo Encargado
            </button>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; margin-bottom:16px; font-size:13px; color:#16a34a;">
                ✓ {{ session('success') }}
            </div>
            @endif

            {{-- Grid de cards --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:16px;">

                @forelse($encargados as $encargado)
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:20px; box-shadow:0 1px 4px rgba(0,0,0,0.04); transition:all .15s;"
                    onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'; this.style.borderColor='#d1d5db'"
                    onmouseout="this.style.boxShadow='0 1px 4px rgba(0,0,0,0.04)'; this.style.borderColor='#e5e7eb'">

                    {{-- Header del card --}}
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:44px; height:44px; border-radius:50%; background:#111827; display:flex; align-items:center; justify-content:center; color:#fff; font-size:13px; font-weight:700; flex-shrink:0;">
                                {{ strtoupper(substr($encargado->nombre,0,1).substr($encargado->apellido,0,1)) }}
                            </div>
                            <div>
                                <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">{{ $encargado->nombre_completo }}</p>
                                <p style="font-size:11px; color:#9ca3af; margin:0;">Encargado</p>
                            </div>
                        </div>
                        @if($encargado->activo)
                            <span style="background:#f0fdf4; color:#16a34a; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">Activo</span>
                        @else
                            <span style="background:#fef2f2; color:#dc2626; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">Inactivo</span>
                        @endif
                    </div>

                    {{-- Datos --}}
                    <div style="display:flex; flex-direction:column; gap:8px; padding-bottom:14px; border-bottom:1px solid #f3f4f6; margin-bottom:14px;">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span style="font-size:12px; color:#6b7280;">{{ $encargado->telefono ?? '—' }}</span>
                        </div>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <span style="font-size:12px; color:#6b7280;">{{ $encargado->email ?? '—' }}</span>
                        </div>
                    </div>

                    {{-- Alumnos a cargo --}}
                    <div style="margin-bottom:14px;">
                        <p style="font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.05em; margin:0 0 8px;">Alumnos a cargo</p>
                        <div style="display:flex; flex-wrap:wrap; gap:6px;">
                            @forelse($encargado->alumnos as $alumno)
                                <span style="background:#f3f4f6; color:#374151; padding:4px 10px; border-radius:6px; font-size:11px; font-weight:500;">
                                    {{ $alumno->nombre }} {{ $alumno->apellido }}
                                    <span style="color:#9ca3af;">· {{ $alumno->pivot->parentesco }}</span>
                                </span>
                            @empty
                                <span style="font-size:12px; color:#9ca3af;">Sin alumnos asignados</span>
                            @endforelse
                        </div>
                    </div>

                    {{-- Acciones --}}
                    <div style="display:flex; gap:8px;">
                        <button style="flex:1; background:#f3f4f6; border:none; color:#374151; cursor:pointer; font-size:12px; font-weight:600; padding:8px; border-radius:8px;"
                            onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">Editar</button>
                        <button style="flex:1; background:#fef2f2; border:none; color:#dc2626; cursor:pointer; font-size:12px; font-weight:600; padding:8px; border-radius:8px;"
                            onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">Eliminar</button>
                    </div>
                </div>
                @empty
                <div style="grid-column:1/-1; text-align:center; padding:60px 0; color:#9ca3af; font-size:13px;">
                    No hay encargados registrados aún.
                </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
</x-app-layout>
