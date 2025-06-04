<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('mantenimientos') }}"
        class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>
<div class="relative top-0 h-32">
    <h2 class="text-3xl font-extrabold text-white mb-4 text-center relative top-10">
        <span class="text-black drop-shadow-lg">HISTORIAL DE MANTENIMIENTOS</span> {{$maquina->serial_number}}
    </h2>
</div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 relative bottom-16">
        <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-black">
            <table class="min-w-full table-auto">
                <thead class="bg-black text-yellow-400">
                    <tr>
                        <th class="px-4 py-2 text-center w-32">Maquina</th>
                        <th class="px-4 py-2 text-left w-32">Modelo</th>
                        <th class="px-4 py-2 text-left w-1/5">Fecha de mantenimiento</th>
                        <th class="px-4 py-2 text-center w-32">Kilometraje</th>
                        <th class="px-2 py-2 text-center w-32">Ver mantenimiento</th>
                        <th class="px-4 py-2 text-center w-40">Editar mantenimiento</th>
                        <th class="px-4 py-2 text-center w-40">Borrar mantenimiento</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200">
                    @foreach ($maquina->maintenances as $mantenimiento)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 text-center">{{ $maquina->serial_number }}</td>
                            <td class="px-4 py-2 relative">{{ $maquina->model }}</td>
                            <td class="px-4 py-2 relative left-12">{{ $mantenimiento->maintenance_date }}</td>
                            <td class="px-4 py-2 relative text-center">{{ $mantenimiento->kilometers_maintenances }}</td>
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
        </div>

        
    </div>
    @vite('resources/js/mantenimientos/accionesMantenimientos.js')
</x-app-layout>
