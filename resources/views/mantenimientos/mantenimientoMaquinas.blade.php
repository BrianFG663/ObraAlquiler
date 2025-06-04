<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <a href="{{ route('mantenimientos') }}"
        class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <div class="relative top-0 h-32">
        <h2 class="text-3xl font-extrabold text-white mb-4 text-center relative top-0">
            <span class="text-black drop-shadow-lg">MAQUINAS CON MANTENIMIENTO</span> PENDIENTE
        </h2>
    </div>

    <div
        class="relative bottom-12 scroll-container w-3/5 h-[68vh] bg-white shadow-md rounded-lg border border-black mx-auto overflow-y-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-black text-yellow-400 sticky top-0 h-12">
                <tr>
                    <th class="px-4 py-2 text-center w-32">Máquina</th>
                    <th class="px-4 py-2 text-center w-32">KM Total</th>
                    <th class="py-2 text-center w-36">KM Último Mantenimiento</th>
                    <th class="px-4 py-2 text-center w-32">KM sin Mantenimiento</th>
                    <th class="px-4 py-2 text-center w-36">Realizar mantenimiento</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($maquinas_sin_mantenimiento as $maquina)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 text-center">{{ $maquina->serial_number }}</td>
                        <td class="px-4 py-2 text-center">{{ $maquina->life_time_km }}</td>
                        <td class="px-4 py-2 text-center">{{ $maquina->ultimo_km_mantenimiento }}</td>
                        <td class="px-4 py-2 text-center text-red-500 font-semibold">
                            {{ $maquina->km_sin_mantenimiento }}</td>
                        <td class="px-4 py-2 text-center">
                            <button onclick="agregarMantenimiento({{ $maquina->id }})">
                                <i class="fas fa-cog text-orange-500 hover:text-orange-600"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <style>
        .scroll-container {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .scroll-container::-webkit-scrollbar {
            display: none;
        }
    </style>

    @vite('resources/js/mantenimientos/accionesMantenimientos.js')
</x-app-layout>
