{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- MODAL: EDITAR MATERIA --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<div id="modalEditar" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:200; align-items:center; justify-content:center;">
    <div style="background:#ffffff; border-radius:16px; padding:28px; width:100%; max-width:440px; box-shadow:0 8px 32px rgba(0,0,0,0.12); margin:20px;">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
            <div style="display:flex; align-items:center; gap:8px;">
                <div style="width:4px; height:16px; background:#111827; border-radius:2px;"></div>
                <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">Editar Materia</p>
            </div>
            <button onclick="cerrarModal()"
                style="background:#f3f4f6; border:none; width:30px; height:30px; border-radius:8px; cursor:pointer; font-size:14px; color:#6b7280; display:flex; align-items:center; justify-content:center;"
                onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">✕</button>
        </div>
        <div style="display:flex; flex-direction:column; gap:16px;">
            <input type="hidden" id="modalId">
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Código</label>
                <input type="text" id="modalCodigo" readonly
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f3f4f6; color:#9ca3af; outline:none; cursor:not-allowed; box-sizing:border-box;">
                <p style="font-size:11px; color:#9ca3af; margin:4px 0 0;">El código no se puede modificar.</p>
            </div>
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Nombre de la materia</label>
                <input type="text" id="modalNombre"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
            </div>
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">Estado</label>
                <select id="modalEstado"
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#f9fafb; color:#111827; outline:none; cursor:pointer; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='#e5e7eb'">
                    <option value="1">Activa</option>
                    <option value="0">Inactiva</option>
                </select>
            </div>
        </div>
        <div style="display:flex; gap:10px; margin-top:24px;">
            <button onclick="cerrarModal()"
                style="flex:1; padding:10px; background:#f3f4f6; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#374151; cursor:pointer;"
                onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                Cancelar
            </button>
            <button onclick="guardarMateria()"
                style="flex:1; padding:10px; background:#111827; border:none; border-radius:10px; font-size:13px; font-weight:600; color:#ffffff; cursor:pointer;"
                onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                Guardar cambios
            </button>
        </div>
    </div>
</div>
