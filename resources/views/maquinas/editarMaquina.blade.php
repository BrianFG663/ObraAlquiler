<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('maquinas') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 block relative top-12">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <form action="{{route('editar.maquina',$maquina->id)}}" method="POST" id="formulario-maquina" class="relative top-8 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6">
        @csrf
        @method('patch')
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">EDITAR MAQUINA</h2>

        <div class="space-y-4">
            <label for="serial" class="block text-gray-700 font-medium">NUMERO DE SERIE:</label>
            <input value="{{ old('serial', $maquina->serial_number) }}" type="text" name="serial" id="serial" placeholder="SN-XXXX" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">

            <label for="model" class="block text-gray-700 font-medium">MODELO:</label>
            <input value="{{ old('model', $maquina->model) }}" type="text" name="model" id="model" placeholder="Modelo" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">

            <label for="maintenance_km" class="block text-gray-700 font-medium">KM NECESARIO PARA MANTENIMIENTO:</label>
            <input value="{{ old('maintenance_km', $maquina->maintenance_km) }}" type="number" id="maintenance_km" name="maintenance_km" placeholder="KM de mantenimiento" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">

            <div>
                <label for="tipo" class="block text-gray-700 font-medium mb-1">TIPO DE MAQUINARIA</label>
                <select name="tipo" id="tipo" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800">
                    <option value="default" selected disabled hidden>Seleccione tipo de maquinaria</option>
                    @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="button" onclick="editarMaquina()" value="EDITAR" class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>


    @vite('resources/js/editarMaquinas.js')
</x-app-layout>
