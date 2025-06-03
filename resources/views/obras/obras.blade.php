<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="relative top-6 h-32">
        <button id="agregarObra"
            class="absolute top-14 right-8 bg-gray-800 text-white px-4 py-2 rounded-sm shadow hover:bg-black cursor-pointer transition duration-200">
            AGREGAR OBRA
        </button>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center relative top-10">
            <span class="text-amber-600 drop-shadow-lg">HISTORIAL</span> DE OBRAS
        </h2>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-x-auto  border border-black relative top -8 ml-8 mr-8">
        <table class="min-w-full table-auto">
            <thead class="bg-black text-yellow-400">
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Fecha de inicio</th>
                    <th class="px-4 py-2 text-left">Fecha de finalizacion</th>
                    <th class="px-4 py-2 text-left">Provincia</th>
                    <th class="px-4 py-2 text-center w-32">Ver obra</th>
                    <th class="px-4 py-2 text-center w-40">Editar obra</th>
                    <th class="px-4 py-2 text-center w-40">Borrar obra</th>
                </tr>
            </thead>
            <tbody id="tbody" class="divide-y divide-gray-200">
                @foreach ($obras as $obra)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $obra->name }}</td>
                        <td class="px-4 py-2">{{ $obra->start_date }}</td>
                        @if ($obra->end_date == null)
                            <td class="px-4 py-2 text-red-400">Sin fecha de finalizacion.</td>
                        @else
                            <td class="px-4 py-2">{{ $obra->end_date }}</td>
                        @endif
                        <td class="px-4 py-2">{{ $obra->province->name }}</td>
                        <td class="px-4 py-2 text-center w-32">
                            <button onclick="verObra({{ $obra->id }})">
                                <i class="fas fa-eye text-orange-400 hover:text-orange-600"></i>
                            </button>
                        </td>
                        <td class="px-4 py-2 text-center w-32">
                            <a href="{{ route('editar.obra', $obra->id) }}">
                                <i class="fas fa-pen text-yellow-400 hover:text-yellow-600"></i>
                            </a>
                        </td>
                        <td class="px-4 py-2 text-center w-32">
                            <button onclick="eliminarObra({{ $obra->id }})">
                                <i class="fas fa-trash text-red-500 hover:text-red-700"></i>
                            </button>
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
                {{ $obras->links() }}
            </div>
        </div>

    </div>
    </div>

    @vite('resources/js/obras/accionesObras.js')
</x-app-layout>
