<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('maquinas') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-8 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
<div class="relative top-0 h-32">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center relative top-10">
        <span class="text-amber-600 drop-shadow-lg">HISTORIAL DE</span> MAQUINAS {{strtoupper($tipo_nombre)}}S
    </h2>
</div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 relative bottom-20">
         <div class="flex justify-between">
            <form action="{{ route('maquinas.categoria') }}" method="POST">
                @csrf
                <select name="tipo" id="tipo"
                    class="relative -top-2 g-yellow-50 rounded-sm border border-gray-300 shadow-sm focus:outline-none text-center">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="BUSCAR"
                    class="relative -top-2 bg-gray-800 text-white px-4 py-2 rounded-sm shadow hover:bg-black cursor-pointer transition duration-200">
            </form>
            <button id="agregarMaquina"
                class="relative -top-2 bg-gray-800 text-white px-4 py-2 rounded-sm shadow hover:bg-black cursor-pointer transition duration-200">
                AGREGAR MAQUINA
            </button>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-black">
            <table class="min-w-full table-auto">
                <thead class="bg-black text-yellow-400">
                    <tr>
                        <th class="px-4 py-2 text-left">Modelo</th>
                        <th class="px-4 py-2 text-left">Numero de serie</th>
                        <th class="px-4 py-2 text-left">Tipo de maquina</th>
                        <th class="px-4 py-2 text-center w-32">Ver maquina</th>
                        <th class="px-4 py-2 text-center w-40">Editar maquina</th>
                        <th class="px-4 py-2 text-center w-40">Borrar maquina</th>
                        <th class="py-2 text-center w-44">Generar informe PDF</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200">
                    @foreach ($maquinas as $maquina)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $maquina->model }}</td>
                            <td class="px-4 py-2">{{ $maquina->serial_number }}</td>
                            <td class="px-4 py-2">{{ $maquina->machineType->name }}</td>
                            <td class="px-4 py-2 text-center w-32">
                                <a href="{{ route('ver.maquinas', $maquina->id) }}">
                                    <i class="fas fa-eye text-orange-500 hover:text-orange-600"></i>
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <a href="{{ route('formulario.editar', $maquina->id) }}">
                                    <i class="fas fa-pen text-yellow-400 hover:text-yellow-400"></i>
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="eliminarMaquinas({{ $maquina->id }})">
                                    <i class="fas fa-trash text-red-500 hover:text-red-700"></i>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <a href="{{ route('maquina.pdf', $maquina->id) }}" target="_blank">
                                    <i class="fa-solid fa-file text-black hover:text-orange-400 transition-colors"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-4 bg-black w-full text-yellow-400 h-11">
                <style>
                    .pagination * {
                        background-color: black !important;
                        color: #FABF09 !important;
                        text-decoration: none;
                    }
                </style>
                <div class="pagination relative top-1">
                    {{ $maquinas->links() }}
                </div>
            </div>

        </div>
    </div>

    @vite('resources/js/accionesMaquinas.js')
</x-app-layout>
