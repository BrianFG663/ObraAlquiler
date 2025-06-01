<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('mantenimientos') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 mt-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>

   <div class="relative top-20 w-2/4 h-[55vh] mx-auto my-10 p-8 bg-white shadow-2xl rounded-2xl border border-gray-200">
    <h2 class="text-3xl font-extrabold text-yellow-500 mb-8 text-center">
        <span class="text-gray-800 drop-shadow-lg">DETALLES DEL</span> MANTENIMIENTO
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-lg">
    <div>
        <p class="text-gray-500">Nombre de la máquina:</p>
        <p class="font-semibold text-gray-800 text-xl">{{ $mantenimiento->machine->serial_number }}</p>
    </div>

    <div class="text-right"> <!-- Alinea todo el contenido a la derecha -->
        <p class="text-gray-500 text-center relative right-4">Tipo:</p>
        <p class="font-semibold text-gray-800 text-xl text-center relative left-10">{{ $mantenimiento->machine->machineType->name }}</p>
    </div>

    <div>
        <p class="text-gray-500">Kilómetros a la hora del mantenimiento:</p>
        <p class="font-semibold text-gray-800 text-xl">{{ $mantenimiento->kilometers_maintenances }}</p>
    </div>

    <div class="text-right"> <!-- Alinea todo el contenido a la derecha -->
        <p class="text-gray-500">Fecha del mantenimiento:</p>
        <p class="font-semibold text-gray-800 text-xl text-center relative left-2">{{ $mantenimiento->maintenance_date }}</p>
    </div>
</div>

    <div class="mt-8 w-3/4 flex flex-col items-center mx-auto border border-yellow-400 h-2/5">
        <p class="text-gray-500 ">Descripción:</p>
        <p class="font-semibold text-gray-800 text-xl text-center h-4/5 w-full">{{ $mantenimiento->description }}</p>
    </div>

</div>


</x-app-layout>
