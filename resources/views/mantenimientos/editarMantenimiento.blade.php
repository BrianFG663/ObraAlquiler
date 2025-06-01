<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('mantenimientos') }}"
        class="text-gray-700 hover:text-black transition duration-200 ml-6 mt-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <form action="{{ route('controlador.editar.mantenimiento', $mantenimiento->id) }}" method="POST" id="formulario-asignacion"
        class="relative top-0 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6">
        @csrf
        @method('patch')
        <h2 class="text-3xl font-extrabold text-yellow-500 mb-4 text-center">
            <span class="text-black">EDITAR</span> MANTENIMIENTO
        </h2>


        <div>
            <label for="project_id" class="block text-gray-700 font-medium mb-1">CAMBIAR MAQUINA:</label>
            <select name="maquina" id="maquina"
                class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">
                <option value="{{ $mantenimiento->machine->id }}" selected>
                        {{ $mantenimiento->machine->serial_number }}
                </option>
                @foreach ($maquinas as $maquina)
                    <option value="{{ $maquina->id }}">{{$maquina->serial_number}}</option>
                @endforeach
            </select>
        </div>

        <div class="space-y-4">
            <div>
                <label for="start_date" class="block text-gray-700 font-medium">FECHA DE MANTENIMIENTO:</label>
                <input value="{{ old('maintenance_date', $mantenimiento->maintenance_date) }}" type="date" name="date" id="date" placeholder="Fecha de mantenimiento" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            </div>
            

            <div>
                <label for="motivo" class="block text-gray-700 mb-1 text-left">Descripcion del mantenimiento</label>
                <input value="{{ old('description', $mantenimiento->description) }}" type="text" id="descripcion" name="descripcion" class="h-44 w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            </div>
        </div>      

        <input type="button" onclick="editarMantenimiento()" value="EDITAR"
            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>

    @vite('resources/js/mantenimientos/editarMantenimientos.js')
</x-app-layout>
