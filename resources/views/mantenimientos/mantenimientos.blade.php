<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="relative top-0 h-32">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center relative top-10">
        <span class="text-white drop-shadow-lg">HISTORIAL DE</span> MANTENIMIENTOS
    </h2>
</div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 relative bottom-16">
        <div class="flex justify-between">
            <form action="" method="POST">
                @csrf
                <select name="tipo" id="tipo"
                    class="relative -top-2 g-yellow-50 rounded-sm border border-gray-300 shadow-sm focus:outline-none text-center">
                    @foreach ($mantenimientos as $mantenimiento)
                        <option value="{{ $mantenimiento->machine->id }}">{{ $mantenimiento->machine->serial_number }}</option>
                    @endforeach
                </select>
                <input type="submit" value="BUSCAR"
                    class="relative -top-2 bg-gray-800 text-white px-4 py-2 rounded-sm shadow hover:bg-black cursor-pointer transition duration-200">
            </form>
            <a href="{{route('maquinas.mantenimientos')}}"
                class="relative -top-2 bg-gray-800 text-white px-4 py-2 rounded-sm shadow hover:bg-black cursor-pointer transition duration-200">
                MAQUINARIA CON MANTENIMIENTO PENDIENTE <i class="fa-solid fa-chevron-right text-1xl"></i>
            </a>
        </div>


        <div class="bg-yellow-50 shadow-md rounded-lg overflow-x-auto border border-black">
            <table class="min-w-full table-auto">
                <thead class="bg-black text-yellow-400">
                    <tr>
                        <th class="px-4 py-2 text-left w-32">Maquina</th>
                        <th class="px-4 py-2 text-left w-1/5">Fecha de mantenimiento</th>
                        <th class="px-4 py-2 text-center w-32">Kilometraje</th>
                        <th class="px-2 py-2 text-center w-32">Ver mantenimiento</th>
                        <th class="px-4 py-2 text-center w-40">Editar mantenimiento</th>
                        <th class="px-4 py-2 text-center w-40">Borrar mantenimiento</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200">
                    @foreach ($mantenimientos as $mantenimiento)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $mantenimiento->machine->serial_number }}</td>
                            <td class="px-4 py-2 relative left-12">{{ $mantenimiento->maintenance_date }}</td>
                            <td class="px-4 py-2 relative text-center">{{ $mantenimiento->machine->life_time_km }}</td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="verMantenimiento({{$mantenimiento->id}})">
                                    <i class="fas fa-eye text-orange-500 hover:text-orange-600"></i>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <a href="{{route('editar.mantenimiento',$mantenimiento->id)}}">
                                    <i class="fas fa-pen text-yellow-400 hover:text-yellow-400"></i>
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="eliminarMantenimiento({{$mantenimiento->id}})">
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
                    {{ $mantenimientos->links() }}
                </div>
            </div>

        </div>

        
    </div>
    @vite('resources/js/mantenimientos/accionesMantenimientos.js')
</x-app-layout>
