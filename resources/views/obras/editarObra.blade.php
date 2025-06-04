<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('obras') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
    <h2 class="text-3xl font-extraboldtext-black mb-4 text-center">
            <span class="text-black">EDITAR</span> MAQUINA
        </h2>
     <form action="{{route('controlador.editar.obra',$obra->id)}}" method="POST" id="formulario-maquina" class="relative top-8 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-4">
            <label for="name" class="block text-gray-700 font-medium">NOMBRE:</label>
            <input value="{{ old('name', $obra->name) }}" type="text" name="name" id="name" placeholder="Ingrese nombre" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">

            <label for="start_date" class="block text-gray-700 font-medium">FECHA DE INICIO:</label>
            <input value="{{ old('start_date', $obra->start_date) }}" type="date" name="start_date" id="start_date" placeholder="Fecha de inicio" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">

            @if($obra->end_date != null)
            <label for="maintenance_km" class="block text-gray-700 font-medium">FECHA DE FINALIZACION:</label>
            <input value="{{ old('end_date', $obra->end_date) }}" type="date" id="end_date" name="end_date" placeholder="Fecha de finalizacion" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
            @endif

            <div>
                <label for="provincia" class="block text-gray-700 font-medium mb-1">PROVINCIA:</label>
                <select name="provincia" id="provincia" class="w-full px-4 py-2 border border-yellow-400 rounded-md focus:ring-2 focus:outline-none focus:ring-yellow-500">
                    <option value="default" selected disabled hidden>Seleccione provincia</option>
                    @foreach($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="button" onclick="agregarObra()"  value="EDITAR" class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-black transition duration-200">
    </form>

    @vite('resources/js/obras/agregarObras.js')
</x-app-layout>