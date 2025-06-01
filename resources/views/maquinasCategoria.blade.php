<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('maquinas') }}" class="text-blue-400 hover:text-blue-600 transition duration-200 ml-6 mt-4 block">
    <i class="fa-solid fa-chevron-left text-3xl"></i>
</a>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Modelo</th>
                        <th class="px-4 py-2 text-left">Numero de serie</th>
                        <th class="px-4 py-2 text-left">Tipo de maquina</th>
                        <th class="px-4 py-2 text-center w-32">Ver maquina</th>
                        <th class="px-4 py-2 text-center w-40">Editar maquina</th>
                        <th class="px-4 py-2 text-center w-40">Borrar maquina</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200">
                    @foreach ($maquinas as $maquina)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $maquina->model }}</td>
                            <td class="px-4 py-2">{{ $maquina->serial_number }}</td>
                            <td class="px-4 py-2">{{ $maquina->machineType->name }}</td>
                            <td class="px-4 py-2 text-center w-32"><button onclick="verMaquinas({{$maquina->id}})"><i class="fas fa-eye text-blue-600 hover:text-blue-800"></i></button></td>
                            <td class="px-4 py-2 text-center w-32"><button id="{{$maquina->id}}"><i class="fas fa-pen text-yellow-400 hover:text-yellow-400"></i></button></td>
                            <td class="px-4 py-2 text-center w-32"><button onclick="eliminarMaquinas({{$maquina->id}})"><i class="fas fa-trash text-red-600 hover:text-red-800"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="mt-4 px-4 py-2 bg-white">
                {{ $maquinas->links() }}
            </div>
        </div>
    </div>

        @vite('resources/js/accionesMaquinas.js')
</x-app-layout>
