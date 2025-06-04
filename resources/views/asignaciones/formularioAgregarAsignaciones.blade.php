<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('asignaciones') }}"
        class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-8 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <h2 class="text-4xl font-extrabold text-white mb-4 text-center relative top-20">
        <span class="text-black">AGREGAR</span> ASIGNACION
    </h2>
    <form action="{{ route('agregar.asignacion') }}" method="POST" id="formulario-maquina"
        class="relative top-28 max-w-xl mx-auto p-6 bg-white shadow-lg rounded-lg space-y-6 border border-yellow-500">
        @csrf

        <div class="space-y-4">
            <div>
                <label for="date" class="block text-gray-700 mb-1">Fecha de inicio</label>
                <input type="date" id="date" name="date" placeholder="KM de mantenimiento"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            </div>


            <div>
                <label for="maquina" class="block text-gray-700 mb-1">Tipo de maquinaria</label>
                <select name="maquina" id="maquina"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800 ">
                    <option value="default" selected disabled hidden>Seleccione tipo de maquinaria</option>
                    @foreach ($maquinas as $maquina)
                        <option value="{{ $maquina->id }}">{{ $maquina->serial_number }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="obra" class="block text-gray-700 mb-1">Tipo de maquinaria</label>
                <select name="obra" id="obra"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800 ">
                    <option value="default" selected disabled hidden>Seleccione obra</option>
                    @foreach ($obras as $obra)
                        <option value="{{ $obra->id }}">{{ $obra->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="button" onclick="agregarAsignacion()" value="REGISTRAR"
            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>

    @vite('resources/js/asignaciones/agregarAsignacion.js')


</x-app-layout>
