<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <a href="{{ route('maquinas') }}"
        class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>

    <div class="relative top-20 max-w-5xl mx-auto my-10 p-8 bg-white shadow-2xl rounded-2xl border border-gray-200">
        <h2 class="text-3xl font-extrabold text-black mb-4 text-left">
            <span class="text-black drop-shadow-lg">DETALLES DE LA</span> MAQUINA
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-lg">

            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-500">Nombre de la máquina:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $maquina->model }}</p>
                </div>

                <div class="relative left-8">
                    <p class="text-gray-500">Tipo:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $maquina->machineType->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Número de serie:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $maquina->serial_number }}</p>
                </div>

                <div class="relative left-8">
                    <p class="text-gray-500">Kilómetros de vida:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $maquina->life_time_km }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-gray-500">Estado de mantenimiento:</p>
                    @if ($maquina->maintenances->isNotEmpty())
                        @php
                            $km_mantenimiento = $maquina->life_time_km - $maquina->maintenances->last()->kilometers_maintenances;
                        @endphp

                        @if ($km_mantenimiento >= $maquina->maintenance_km)
                            <p class="font-semibold text-red-800 text-xl">Mantenimiento pendiente</p>
                        @else
                            <p class="font-semibold text-green-600 text-xl">Mantenimiento al día</p>
                        @endif
                    @else
                        <p class="font-semibold text-red-600 text-xl">Esta máquina no tiene mantenimientos.</p>
                    @endif
                </div>

                <div class="flex items-center space-x-2 mt-10 md:col-span-2">
                    @if ($maquina->assignments->isNotEmpty())
                        <span class="inline-block w-5 h-5 rounded-full bg-green-500"></span>
                        <span class="text-green-700 font-semibold text-xl">Asignado a la obra:
                            {{ $maquina->assignments->last()->project->name }}</span>
                    @else
                        <span class="inline-block w-5 h-5 rounded-full bg-red-500"></span>
                        <span class="text-red-700 font-semibold text-xl">Sin asignar</span>
                    @endif
                </div>

                @if ($maquina->assignments->isNotEmpty())
                    <div class="md:col-span-2 flex items-center space-x-2 relative left-8">
                        <p class="text-gray-500">PROVINCIA:</p>
                        <p class="font-semibold text-gray-800 text-xl">
                            {{ $maquina->assignments->last()->project->province->name }}
                        </p>
                    </div>
                @endif
            </div>


            <div class="flex justify-center items-center w-96 relative right-20">
                <img src="{{ asset('images/layouts/captura.png') }}" alt="Imagen de máquina" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</x-app-layout>
