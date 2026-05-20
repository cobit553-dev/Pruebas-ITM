<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel Principal — I.T.M.
        </h2>
    </x-slot>

    <div class="flex gap-5 p-5 min-h-screen bg-gray-100">

        {{-- ===================== SIDEBAR ===================== --}}
        <aside class="w-56 flex-shrink-0 rounded-2xl flex flex-col py-5 px-4 gap-1" style="background:#0d2e4d;">

            {{-- Brand con logo --}}
            <div class="flex items-center gap-3 mb-5 pb-4" style="border-bottom: 0.5px solid rgba(255,255,255,0.08);">
                <img src="{{ asset('images/logo_itm.jpg') }}" alt="Logo ITM"
                     class="w-10 h-10 rounded-xl object-cover flex-shrink-0">
                <div>
                    <p class="font-semibold text-white text-sm leading-tight">I.T.M.</p>
                    <p class="text-xs" style="color:#6b9cc2;">Inst. Comp. Aguilares</p>
                </div>
            </div>

            {{-- Principal --}}
            <p class="text-xs px-2 pt-2 pb-1 uppercase tracking-widest font-medium" style="color:#2d5a7e; font-size:9px;">Principal</p>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-medium" style="background:rgba(245,158,11,0.18); color:#fbbf24;">
                Panel principal
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Alumnos
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Encargados
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Maestros
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Directores
            </a>

            {{-- Académico --}}
            <p class="text-xs px-2 pt-3 pb-1 uppercase tracking-widest font-medium" style="color:#2d5a7e; font-size:9px;">Académico</p>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Materias
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Cursos
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Inscripciones
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Notas
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Boletas
            </a>

            {{-- Finanzas --}}
            <p class="text-xs px-2 pt-3 pb-1 uppercase tracking-widest font-medium" style="color:#2d5a7e; font-size:9px;">Finanzas</p>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Mensualidades
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs hover:bg-white/5 transition" style="color:#7aaecf;">
                Pagos
            </a>

            {{-- Usuario --}}
            <div class="mt-auto pt-4 flex items-center gap-2 px-1" style="border-top: 0.5px solid rgba(95, 21, 21, 0.08);">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-medium flex-shrink-0" style="background:#f59e0b;">
                    DA
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-medium truncate" style="color:#d0e8f5;">Dir. Alvarado</p>
                    <p style="font-size:10px; color:#2d5a7e;">Administrador</p>
                </div>
            </div>

        </aside>

        {{-- ===================== CONTENIDO ===================== --}}
        <div class="flex-1 flex flex-col gap-4">

            {{-- Topbar --}}
            <div class="bg-white rounded-2xl px-5 py-3 flex items-center gap-3 border border-gray-200">
                <img src="{{ asset('images/logo_itm.jpg') }}" alt="ITM" class="w-7 h-7 rounded-lg object-cover flex-shrink-0">
                <span class="text-sm font-medium text-gray-700 flex-1">Panel principal</span>
                <div class="flex items-center gap-2 bg-gray-100 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-400 w-44">
                    🔍 Buscar...
                </div>
                <span class="text-xs text-gray-400">Mayo 2026</span>
                <span class="text-gray-400 cursor-pointer text-lg"></span>
            </div>

            {{-- Banner bienvenida --}}
            <div class="rounded-2xl px-6 py-5 flex items-center justify-between" style="background:#0d2e4d; border-left: 4px solid #f59e0b;">
                <div>
                    <h2 class="font-semibold text-white text-lg mb-1">Buenos días, Director Alvarado</h2>
                    <p class="text-sm" style="color:#6b9cc2;">Resumen del ciclo escolar 2026 — I.T.M. Aguilares</p>
                </div>
                <div class="flex gap-3">
                    <div class="rounded-xl px-4 py-3 text-center" style="background:rgba(245,158,11,0.15); border: 0.5px solid rgba(245,158,11,0.35);">
                        <p class="font-semibold text-2xl" style="color:#fbbf24;">87%</p>
                        <p class="text-xs mt-0.5" style="color:#f59e0b;">Pagos al día</p>
                    </div>
                    <div class="rounded-xl px-4 py-3 text-center" style="background:rgba(245,158,11,0.15); border: 0.5px solid rgba(245,158,11,0.35);">
                        <p class="font-semibold text-2xl" style="color:#fbbf24;">8.4</p>
                        <p class="text-xs mt-0.5" style="color:#f59e0b;">Promedio general</p>
                    </div>
                </div>
            </div>

            {{-- Métricas --}}
            <div class="grid grid-cols-5 gap-3">
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col gap-2">
                    <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center text-lg"></div>
                    <p class="text-2xl font-medium text-gray-800">142</p>
                    <p class="text-xs text-gray-400">Alumnos inscritos</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col gap-2">
                    <div class="w-9 h-9 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center text-lg"></div>
                    <p class="text-2xl font-medium text-gray-800">9</p>
                    <p class="text-xs text-gray-400">Maestros activos</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col gap-2">
                    <div class="w-9 h-9 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg"></div>
                    <p class="text-2xl font-medium text-gray-800">12</p>
                    <p class="text-xs text-gray-400">Materias activas</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col gap-2">
                    <div class="w-9 h-9 rounded-lg bg-orange-100 text-orange-700 flex items-center justify-center text-lg"></div>
                    <p class="text-2xl font-medium text-gray-800">18</p>
                    <p class="text-xs text-gray-400">Pagos pendientes</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col gap-2">
                    <div class="w-9 h-9 rounded-lg bg-red-100 text-red-700 flex items-center justify-center text-lg"></div>
                    <p class="text-2xl font-medium text-gray-800">6</p>
                    <p class="text-xs text-gray-400">Boletas emitidas</p>
                </div>
            </div>

            {{-- Tablas --}}
            <div class="grid grid-cols-2 gap-4">

                {{-- Maestros --}}
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-700">Maestros y cursos asignados</p>
                        <a href="#" class="text-xs font-medium" style="color:#f59e0b;">Gestionar</a>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <div class="w-8 h-8 rounded-full bg-violet-500 flex items-center justify-center text-white text-xs font-medium flex-shrink-0">MR</div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700">Marta Rivas</p>
                                <p class="text-xs text-gray-400">Matemáticas · Curso A</p>
                            </div>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Activo</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <div class="w-8 h-8 rounded-full bg-cyan-500 flex items-center justify-center text-white text-xs font-medium flex-shrink-0">JC</div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700">Jorge Cruz</p>
                                <p class="text-xs text-gray-400">Ciencias · Curso B</p>
                            </div>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Activo</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white text-xs font-medium flex-shrink-0">LP</div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700">Lucía Pérez</p>
                                <p class="text-xs text-gray-400">Lenguaje · Curso A y B</p>
                            </div>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Activo</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <div class="w-8 h-8 rounded-full bg-amber-400 flex items-center justify-center text-white text-xs font-medium flex-shrink-0">RA</div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700">Roberto Ayala</p>
                                <p class="text-xs text-gray-400">Historia · Curso C</p>
                            </div>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Activo</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white text-xs font-medium flex-shrink-0">VN</div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700">Valeria Núñez</p>
                                <p class="text-xs text-gray-400">Inglés · Sin asignar</p>
                            </div>
                            <span class="text-xs bg-orange-100 text-orange-700 px-2.5 py-1 rounded-full font-medium">Sin curso</span>
                        </li>
                    </ul>
                </div>

                {{-- Mensualidades --}}
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                    <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-700">Estado de mensualidades</p>
                        <a href="#" class="text-xs font-medium" style="color:#f59e0b;">Ver detalle</a>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <span class="text-gray-400">📅</span>
                            <p class="text-sm font-medium text-gray-700 flex-1">Enero 2026</p>
                            <p class="text-xs text-gray-400 mr-3">142 alumnos</p>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Pagado</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <span class="text-gray-400">📅</span>
                            <p class="text-sm font-medium text-gray-700 flex-1">Febrero 2026</p>
                            <p class="text-xs text-gray-400 mr-3">142 alumnos</p>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Pagado</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <span class="text-gray-400">📅</span>
                            <p class="text-sm font-medium text-gray-700 flex-1">Marzo 2026</p>
                            <p class="text-xs text-gray-400 mr-3">142 alumnos</p>
                            <span class="text-xs bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-medium">Pagado</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <span class="text-gray-400">📅</span>
                            <p class="text-sm font-medium text-gray-700 flex-1">Abril 2026</p>
                            <p class="text-xs text-gray-400 mr-3">124 alumnos</p>
                            <span class="text-xs bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full font-medium">Pendiente</span>
                        </li>
                        <li class="flex items-center gap-3 px-5 py-2.5">
                            <span class="text-gray-400">📅</span>
                            <p class="text-sm font-medium text-gray-700 flex-1">Mayo 2026</p>
                            <p class="text-xs text-gray-400 mr-3">— alumnos</p>
                            <span class="text-xs bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full font-medium">Pendiente</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
