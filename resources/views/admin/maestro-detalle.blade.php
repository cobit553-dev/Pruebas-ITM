<x-app-layout>
<div style="display:flex; height:100vh; overflow:hidden;">

    @include('components.admin-sidebar', ['active' => 'maestros'])

    <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; background:#f8fafc;">

        <header style="background:#ffffff; border-bottom:1px solid #e5e7eb; padding:14px 24px; display:flex; align-items:center; gap:12px; flex-shrink:0;">
            <a href="{{ route('admin.maestros') }}"
               style="width:32px; height:32px; border-radius:8px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; text-decoration:none; color:#6b7280; flex-shrink:0;"
               onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            </a>
            <div>
                <h2 style="font-size:16px; font-weight:700; margin:0; color:#111827;">{{ $maestro->nombre_completo }}</h2>
                <p style="font-size:12px; color:#6b7280; margin:0;">Código: {{ $maestro->codigo }} — Asignación de cursos y materias</p>
            </div>
        </header>

        <div style="flex:1; overflow-y:auto; padding:24px; display:flex; flex-direction:column; gap:20px;">

            @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #86efac; border-radius:10px; padding:12px 16px; font-size:13px; color:#16a34a;">
                ✓ {{ session('success') }}
            </div>
            @endif

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                {{-- Formulario asignar --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:24px;">
                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:18px;">
                        <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Asignar curso y materia</p>
                    </div>
                    <form method="POST" action="{{ route('admin.maestros.asignar', $maestro->id) }}" style="display:flex; flex-direction:column; gap:14px;">
                        @csrf
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Curso</label>
                            <select name="curso_id" required style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;">
                                <option value="">Seleccionar curso...</option>
                                @foreach($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nombre }} — {{ $curso->nivel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Materia</label>
                            <select name="materia_id" required style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none;">
                                <option value="">Seleccionar materia...</option>
                                @foreach($materias as $materia)
                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" style="padding:10px; background:#111827; color:#fff; border:none; border-radius:10px; font-size:13px; font-weight:600; cursor:pointer;"
                            onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                            + Asignar
                        </button>
                    </form>
                </div>

                {{-- Asignaciones actuales --}}
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                    <div style="padding:16px 20px; border-bottom:1px solid #e5e7eb; display:flex; align-items:center; gap:8px;">
                        <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                        <p style="font-size:14px; font-weight:600; color:#111827; margin:0;">Asignaciones actuales</p>
                        <span style="background:#f3f4f6; color:#6b7280; padding:2px 8px; border-radius:10px; font-size:11px; font-weight:600; margin-left:auto;">{{ $maestro->detalleCursos->count() }}</span>
                    </div>
                    <div style="max-height:400px; overflow-y:auto;">
                        @forelse($maestro->detalleCursos as $detalle)
                        <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 20px; border-bottom:1px solid #f3f4f6;">
                            <div>
                                <p style="font-size:13px; font-weight:500; color:#111827; margin:0;">{{ $detalle->materia->nombre ?? '—' }}</p>
                                <p style="font-size:11px; color:#9ca3af; margin:0;">{{ $detalle->curso->nombre ?? '—' }} · {{ $detalle->curso->nivel ?? '' }}</p>
                            </div>
                            <form method="POST" action="{{ route('admin.maestros.desasignar', [$maestro->id, $detalle->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:#fef2f2; border:none; color:#dc2626; font-size:11px; font-weight:600; padding:4px 10px; border-radius:6px; cursor:pointer;"
                                    onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'"
                                    onclick="return confirm('¿Eliminar esta asignación?')">
                                    Quitar
                                </button>
                            </form>
                        </div>
                        @empty
                        <div style="padding:30px; text-align:center; color:#9ca3af; font-size:13px;">
                            Sin asignaciones aún.
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
