<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('asignaciones') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 block relative top-4">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <form action="{{ route('controlador.editar.asignacion', $asignacion->id) }}" method="POST" id="formulario-asignacion"
        class="relative top-0 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6">
        @csrf
        @method('patch')
                        <h2 class="text-3xl font-extrabold text-yellow-500 mb-4 text-center">
            <span class="text-black">EDITAR</span> ASIGNACION
        </h2>

        <div class="space-y-4">
            @if ($asignacion->start_date != null)
                <label for="start_date" class="block text-gray-700 font-medium">FECHA DE INICIO:</label>
                <input value="{{ old('start_date', $asignacion->start_date) }}" type="date" name="start_date"
                    id="start_date" placeholder="Fecha de inicio"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            @else
                <label for="start_date" class="block text-gray-700 font-medium">FECHA DE INICIO:</label>
                <input type="date" name="start_date" id="start_date" placeholder="Fecha de inicio"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            @endif


            @if ($asignacion->end_date != null)
                <label for="maintenance_km" class="block text-gray-700 font-medium">FECHA DE FINALIZACION:</label>
                <input value="{{ old('end_date', $asignacion->end_date) }}" type="date" id="end_date"
                    name="end_date" placeholder="Fecha de finalizacion"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            @else
                <label for="maintenance_km" class="block text-gray-700 font-medium">FECHA DE FINALIZACION:</label>
                <input type="date" id="end_date" name="end_date" placeholder="Fecha de finalizacion"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            @endif

            <div>
                <label for="project_id" class="block text-gray-700 font-medium mb-1">OBRAS:</label>
                <select name="project_id" id="project_id"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">
                    <option value="default" selected disabled hidden>Seleccione obra</option>
                    @foreach ($obras as $obra)
                        <option value="{{ $obra->id }}">{{ $obra->name }}</option>
                    @endforeach
                </select>
            </div>

                        <div>
                <label for="machine_id" class="block text-gray-700 font-medium mb-1">MAQUINAS:</label>
                <select name="machine_id" id="machine_id"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">
                    <option value="default" selected disabled hidden>Seleccione maquina</option>
                    @foreach ($maquinas as $maquina)
                        <option value="{{ $maquina->id }}">{{ $maquina->model}} | {{ $maquina->serial_number}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="button" onclick="editarAsignacion()" value="EDITAR"
            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>

    @vite('resources/js/asignaciones/editarAsignacion.js')
</x-app-layout>
