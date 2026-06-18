<div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; padding:24px;">
    <div style="display:flex; align-items:center; gap:8px; margin-bottom:18px;">
        <div style="width:4px; height:16px; background:#f59e0b; border-radius:2px;"></div>
        <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Solicitud de Inscripción</h3>
    </div>

    {{-- Pasos --}}
    <div style="display:flex; gap:0; margin-bottom:28px;">
        <div style="flex:1; text-align:center;">
            <div style="width:32px; height:32px; border-radius:50%; background:#111827; color:#fff; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; margin:0 auto 6px;">1</div>
            <p style="font-size:11px; color:#374151; font-weight:600; margin:0;">Descarga el formulario</p>
            <p style="font-size:10px; color:#9ca3af; margin:0;">PDF con tus datos</p>
        </div>
        <div style="flex:0; display:flex; align-items:center; padding-bottom:20px;">
            <div style="width:40px; height:1px; background:#e5e7eb;"></div>
        </div>
        <div style="flex:1; text-align:center;">
            <div style="width:32px; height:32px; border-radius:50%; background:#d1d5db; color:#fff; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; margin:0 auto 6px;">2</div>
            <p style="font-size:11px; color:#374151; font-weight:600; margin:0;">Fírmalo</p>
            <p style="font-size:10px; color:#9ca3af; margin:0;">Encargado y alumno</p>
        </div>
        <div style="flex:0; display:flex; align-items:center; padding-bottom:20px;">
            <div style="width:40px; height:1px; background:#e5e7eb;"></div>
        </div>
        <div style="flex:1; text-align:center;">
            <div style="width:32px; height:32px; border-radius:50%; background:#d1d5db; color:#fff; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; margin:0 auto 6px;">3</div>
            <p style="font-size:11px; color:#374151; font-weight:600; margin:0;">Súbelo firmado</p>
            <p style="font-size:10px; color:#9ca3af; margin:0;">Solo PDF</p>
        </div>
        <div style="flex:0; display:flex; align-items:center; padding-bottom:20px;">
            <div style="width:40px; height:1px; background:#e5e7eb;"></div>
        </div>
        <div style="flex:1; text-align:center;">
            <div style="width:32px; height:32px; border-radius:50%; background:#d1d5db; color:#fff; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; margin:0 auto 6px;">4</div>
            <p style="font-size:11px; color:#374151; font-weight:600; margin:0;">Espera aprobación</p>
            <p style="font-size:10px; color:#9ca3af; margin:0;">El admin revisa</p>
        </div>
    </div>

    {{-- Paso 1: Descargar PDF --}}
    <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:12px; padding:18px; margin-bottom:16px;">
        <p style="font-size:13px; font-weight:600; color:#111827; margin:0 0 8px;">Paso 1 — Descarga tu formulario</p>
        <p style="font-size:12px; color:#6b7280; margin:0 0 14px;">El PDF se generará con tus datos personales. Imprímelo, fírmalo junto con tu encargado y luego súbelo en el Paso 2.</p>
        <a href="{{ route('alumno.inscripcion.pdf') }}"
           style="display:inline-flex; align-items:center; gap:8px; padding:10px 20px; background:#111827; color:#fff; border-radius:10px; font-size:13px; font-weight:600; text-decoration:none;"
           onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Descargar formulario PDF
        </a>
    </div>

    {{-- Paso 2: Subir documento firmado --}}
    <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:12px; padding:18px;">
        <p style="font-size:13px; font-weight:600; color:#111827; margin:0 0 8px;">Paso 2 — Sube el formulario firmado</p>
        <p style="font-size:12px; color:#6b7280; margin:0 0 14px;">Selecciona el curso al que deseas inscribirte y adjunta el PDF firmado por tu encargado.</p>

        <form method="POST" action="{{ route('alumno.inscripcion.subir') }}" enctype="multipart/form-data"
            style="display:flex; flex-direction:column; gap:14px;">
            @csrf

            {{-- Selección de curso --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:8px;">Sección a la que deseas inscribirte</label>
                <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(140px,1fr)); gap:10px;">
                    @foreach($cursosDisponibles as $curso)
                    <label style="cursor:pointer;">
                        <input type="radio" name="curso_id" value="{{ $curso->id }}" style="display:none;" class="curso-radio" required>
                        <div class="curso-card" style="background:#ffffff; border:2px solid #e5e7eb; border-radius:10px; padding:14px; text-align:center; transition:all .15s;">
                            <p style="font-size:18px; font-weight:700; color:#111827; margin:0 0 2px;">{{ $curso->seccion }}</p>
                            <p style="font-size:11px; color:#6b7280; margin:0;">{{ $curso->nivel }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Subir PDF --}}
            <div>
                <label style="display:block; font-size:12px; font-weight:600; color:#374151; margin-bottom:6px;">
                    Formulario firmado (PDF)
                    <span style="color:#dc2626;">*</span>
                </label>
                <input type="file" name="documento" accept=".pdf" required
                    style="width:100%; padding:10px 14px; font-size:13px; border:1px solid #e5e7eb; border-radius:10px; background:#ffffff; color:#111827; outline:none; box-sizing:border-box; cursor:pointer;">
                <p style="font-size:11px; color:#9ca3af; margin:4px 0 0;">Solo archivos PDF. Tamaño máximo 5MB.</p>
            </div>

            <div>
                <button type="submit"
                    style="padding:11px 24px; background:#f59e0b; border:none; border-radius:10px; color:#fff; font-size:14px; font-weight:700; cursor:pointer;"
                    onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e0b'">
                    Enviar solicitud
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.querySelectorAll('.curso-radio').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.curso-card').forEach(c => {
            c.style.borderColor = '#e5e7eb';
            c.style.background  = '#ffffff';
        });
        radio.nextElementSibling.style.borderColor = '#f59e0b';
        radio.nextElementSibling.style.background  = '#fefce8';
    });
});
</script>
