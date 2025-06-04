<x-app-layout>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('mantenimientos') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <form action="{{route('agregar.mantenimiento',$maquina->id)}}" method="POST" id="formulario-asignacion"
        class="relative top-0 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6 border border-yellow-500">
        @csrf
                <h2 class="text-2xl font-extrabold text-white mb-4 text-center">
            <span class="text-black">MANTENIMIENTO MAQUINA</span> {{$maquina->serial_number}}
        </h2>

        <div class="space-y-4">
            <div>
                <label for="motivo" class="block text-gray-700 mb-1 text-center">Descripcion del mantenimiento</label>
                <input type="text" id="descripcion" name="descripcion" class="h-44 w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            </div>
        </div>

        <input type="button" onclick="(agregarMantenimiento())" value="REALIZAR" class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>

    @vite('resources/js/mantenimientos/agregarMantenimiento.js')
</x-app-layout>
