<x-app-layout>
    <form action="{{ route('agregar.obras') }}" method="POST" id="formulario-maquina"
        class="relative top-14 max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg space-y-6">
        @csrf
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">REGISTRAR OBRA</h2>

        <div class="space-y-4">
            <div>
                <label for="name" class="block text-gray-700 mb-1">Nombre de la obra</label>
                <input type="text" name="name" id="name" placeholder="Ingrese nombre"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="start_date" class="block text-gray-700 mb-1">Fecha de inicio</label>
                <input type="date" name="start_date" id="start_date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            <div>
                <label for="end_date" class="block text-gray-700 mb-1">Fecha de finalizacion</label>
                <input type="date" id="end_date" name="end_date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            <div>
                <label for="provincia" class="block text-gray-700 mb-1">Provincia:</label>
                <select name="provincia" id="provincia"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="default" selected disabled hidden>Seleccione provincias</option>
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <input type="button" onclick="agregarObra()" value="REGISTRAR"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
    </form>

    @vite('resources/js/obras/agregarObras.js')
</x-app-layout>
