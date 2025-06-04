<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('mantenimientos') }}"
        class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>

    <div class="relative top-20 max-w-5xl mx-auto my-10 p-8 bg-white shadow-2xl rounded-2xl border border-gray-200">
        <h2 class="text-3xl font-extrabold text-black mb-8 relative left-24 text-center pb-4">
            <span class="text-black drop-shadow-lg">DETALLES DEL</span> MANTENIMIENTO
        </h2>

        <div class="flex flex-col md:flex-row items-start gap-8">

            <div class="flex-shrink-0 md:w-1/3 flex justify-center relative bottom-12">
                <img src="{{ asset('images/layouts/mantenimiento.jpeg') }}" alt="Imagen" class="w-64 h-auto">
            </div>

            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6 text-lg">
                <div>
                    <p class="text-gray-500">Nombre de la máquina:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $mantenimiento->machine->serial_number }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Tipo:</p>
                    <p class="font-semibold text-gray-800 text-xl">
                        {{ $mantenimiento->machine->machineType->name }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Kilómetros a la hora del mantenimiento:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $mantenimiento->kilometers_maintenances }} KM</p>
                </div>

                <div>
                    <p class="text-gray-500">Fecha del mantenimiento:</p>
                    <p class="font-semibold text-gray-800 text-xl">
                        {{ $mantenimiento->maintenance_date }}
                    </p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-gray-500 mb-1">Descripción:</p>
                    <div class="border border-yellow-400 p-4 rounded-lg bg-yellow-50 text-gray-800 text-xl">
                        {{ $mantenimiento->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
