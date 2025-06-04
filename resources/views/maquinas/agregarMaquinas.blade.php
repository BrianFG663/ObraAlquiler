<x-app-layout>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('maquinas') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-8 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <h2 class="text-4xl font-extrabold text-white mb-4 text-center relative top-20">
        <span class="text-black">AGREGAR</span> MAQUINA
    </h2>
    <form action="{{ route('agregar.maquinas') }}" method="POST" id="formulario-maquina"
        class="relative top-20 max-w-xl mx-auto p-6 bg-white shadow-lg rounded-lg space-y-6 border border-yellow-500">
        @csrf

        <div class="space-y-4">

            <input type="number" name="serial" id="serial" placeholder="SN-XXXX"
                class="w-full px-4 py-2  border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">

            <input type="text" name="model" id="model" placeholder="Modelo"
                class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">

            <input type="number" id="maintenance_km" name="maintenance_km" placeholder="KM de mantenimiento"
                class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">

            <div>
                <label for="tipo" class="block text-gray-700 mb-1">Tipo de maquinaria</label>
                <select name="tipo" id="tipo"
                    class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500 bg-white text-gray-800 ">
                    <option value="default" selected disabled hidden>Seleccione tipo de maquinaria</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="estado" id="estado"
                    class="h-5 w-5 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500"
                    onclick="maquinaUsada()">
                <label for="estado" class="text-gray-700">¿Es una máquina usada?</label>
            </div>

        </div>

        <div id="mantenimiento" class="space-y-4 hidden">
            <input type="number" id="life_time_km" name="life_time_km" placeholder="Kilometraje actual"
                class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
        </div>

        <input type="button" value="REGISTRAR" onclick="agregarMaquina()"
            class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>

    @vite('resources/js/maquinas/agregarMaquina.js')


</x-app-layout>
