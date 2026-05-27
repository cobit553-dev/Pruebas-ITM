<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
    <div style="background:#1e293b; border:1px solid #334155; border-radius:14px; padding:28px 32px; width:100%; max-width:380px; box-shadow:0 20px 60px rgba(0,0,0,0.5);">

        {{-- Ícono --}}
        <div style="width:48px; height:48px; background:rgba(239,68,68,0.15); border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#f87171" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
        </div>

        <h3 style="font-size:16px; font-weight:700; color:#e2e8f0; text-align:center; margin:0 0 8px;">¿Cerrar sesión?</h3>
        <p style="font-size:13px; color:#64748b; text-align:center; margin:0 0 24px;">¿Estás seguro que deseas salir del sistema?</p>

        <div style="display:flex; gap:10px;">
            <button id="logoutCancel" type="button"
                    style="flex:1; padding:10px; background:#0f172a; border:1px solid #334155; border-radius:8px; color:#94a3b8; font-size:13px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#1e293b'" onmouseout="this.style.background='#0f172a'">
                Cancelar
            </button>
            <button id="logoutConfirm" type="button"
                    style="flex:1; padding:10px; background:#dc2626; border:none; border-radius:8px; color:#fff; font-size:13px; font-weight:600; cursor:pointer;"
                    onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#dc2626'">
                Sí, cerrar sesión
            </button>
        </div>
    </div>
</div>

<script>
(function(){
    var modal = document.getElementById('logoutModal');
    var cancel = document.getElementById('logoutCancel');
    var confirmBtn = document.getElementById('logoutConfirm');
    var targetForm = null;

    window.openLogoutModal = function(formElement){
        targetForm = formElement;
        if (!targetForm) return false;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        return false;
    };

    function closeModal(){
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        targetForm = null;
    }

    cancel.addEventListener('click', closeModal);

    confirmBtn.addEventListener('click', function(){
        if (targetForm) targetForm.submit();
    });

    modal.addEventListener('click', function(e){
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape') closeModal();
    });
})();
</script>
