<x-app-layout>
    <form action="{{route('agregar.maquinas')}}" method="POST" id="formulario-maquina" class="relative top-14 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">REGISTRAR MAQUINA</h2>

        <div class="space-y-4">

            <input type="number" name="serial" id="serial" placeholder="SN-XXXX" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="text" name="model" id="model" placeholder="Modelo" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="number" id="maintenance_km" name="maintenance_km" placeholder="KM de mantenimiento" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <div>
                <label for="tipo" class="block text-gray-700 mb-1">Tipo de maquinaria</label>
                <select name="tipo" id="tipo" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="default" selected disabled hidden>Seleccione tipo de maquinaria</option>
                    @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="estado" id="estado" class="h-5 w-5 text-blue-600" onclick="maquinaUsada()">
                <label for="estado" class="text-gray-700">¿Es una máquina usada?</label>
            </div>

        </div>

        <div id="mantenimiento" class="space-y-4 hidden">
            <input type="number" id="life_time_km" name="life_time_km" placeholder="Kilometraje actual" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <input type="button" value="REGISTRAR" onclick="agregarMaquina()" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
    </form>

        @vite('resources/js/agregarMaquina.js')
</x-app-layout>
