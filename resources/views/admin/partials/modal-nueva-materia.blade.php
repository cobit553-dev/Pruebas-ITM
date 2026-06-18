{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- MODAL: NUEVA MATERIA --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<div id="modalNuevaMateria" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:200; align-items:center; justify-content:center;">
    <div style="background:#ffffff; border-radius:16px; padding:28px; width:100%; max-width:460px; box-shadow:0 8px 32px rgba(0,0,0,0.12); margin:20px;">

        {{-- Header --}}
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
            <div style="display:flex; align-items:center; gap:8px;">
                <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Nueva Materia</p>
            </div>
            <button onclick="cerrarModalMateria()"
                style="background:#f3f4f6; border:none; width:30px; height:30px; border-radius:8px; cursor:pointer; font-size:14px; color:#6b7280; display:flex; align-items:center; justify-content:center;"
                onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.materias.store') }}" style="display:flex; flex-direction:column; gap:16px;">
            @csrf

            {{-- Código --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Código <span style="color:#dc2626;">*</span></label>
                <input type="text" name="codigo" required placeholder="Ej: WIN, WRD, EXC"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box; font-family:monospace; text-transform:uppercase;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'; this.value=this.value.toUpperCase()">
                <p style="font-size:11px; color:#9ca3af; margin:4px 0 0;">Máximo 5 caracteres, solo letras. Ej: WIN, WRD, CDR</p>
            </div>

            {{-- Nombre --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Nombre de la materia <span style="color:#dc2626;">*</span></label>
                <input type="text" name="nombre" required placeholder="Ej: Microsoft Windows"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>

            {{-- Descripción --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Descripción <span style="color:#9ca3af; font-weight:400;">(opcional)</span></label>
                <textarea name="descripcion" rows="3" placeholder="Descripción breve de la materia..."
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box; resize:none; font-family:inherit;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'"></textarea>
            </div>

            {{-- Estado --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Estado</label>
                <select name="activa"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box; cursor:pointer;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                    <option value="1">Activa</option>
                    <option value="0">Inactiva</option>
                </select>
            </div>

            {{-- Botones --}}
            <div style="display:flex; gap:10px; padding-top:4px;">
                <button type="button" onclick="cerrarModalMateria()"
                    style="flex:1; padding:10px; background:#f3f4f6; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#374151; cursor:pointer;"
                    onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                    Cancelar
                </button>
                <button type="submit"
                    style="flex:1; padding:10px; background:#111827; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#ffffff; cursor:pointer;"
                    onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                    Guardar materia
                </button>
            </div>
        </form>
    </div>
</div>
