<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4 text-center relative top-8">
            <span class="text-amber-600 drop-shadow-lg">ASIGNACIONES</span> FINALIZADAS
        </h2>



        <button id="agregarMaquina"
            class="relative top-8 left-[80%] bg-gray-800 text-white px-4 py-2 rounded-sm shadow hover:bg-black cursor-pointer transition duration-200 " onclick="agregarAsignacion()">
            AGREGAR ASIGNACION  <i class="fa-solid fa-chevron-right text-1xl"></i>
        </button>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto min-h-[200px] border border-black relative top-12">
            <table class="min-w-full table-auto">
                <thead class="bg-black text-yellow-400">
                    <tr>
                        <th class="px-4 py-2 text-left">Proyecto</th>
                        <th class="px-4 py-2 text-left">Maquina</th>
                        <th class="px-4 py-2 text-left">Provicia</th>
                        <th class="px-4 py-2 text-left">Encargado</th>
                        <th class="px-2 py-2 text-center w-32">Ver asignacion</th>
                        <th class="px-4 py-2 text-center w-40">Editar asignacion</th>
                        <th class="px-4 py-2 text-center w-40">Borrar asignacion</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200">
                    @foreach ($asignaciones_finalizadas as $asignaciones_finalizada)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $asignaciones_finalizada->project->name }}</td>
                            <td class="px-4 py-2">{{ $asignaciones_finalizada->machine->serial_number }}</td>
                            <td class="px-4 py-2">{{ $asignaciones_finalizada->project->province->name }}</td>
                            <td class="px-4 py-2">{{ $asignaciones_finalizada->user->name }}
                                {{ $asignaciones_finalizada->user->lastname }}</td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="verAsignacion({{ $asignaciones_finalizada->id }})">
                                    <i class="fas fa-eye text-orange-400 hover:text-orange-600"></i>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <a href="{{ route('editar.asignacion', $asignaciones_finalizada->id) }}">
                                    <i class="fas fa-pen text-yellow-400 hover:text-yellow-400"></i>
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="eliminarAsignacion({{ $asignaciones_finalizada->id }})">
                                    <i class="fas fa-trash text-red-500 hover:text-red-600"></i>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-4 bg-black w-full text-yellow-400 h-11">

                <div class="pagination relative top-1">
                    {{ $asignaciones_finalizadas->appends(['pendientes_page' => request('pendientes_page')])->links() }}
                </div>
            </div>
        </div>

        <h2 class="text-3xl font-extrabold text-gray-800 mt-12 mb-4 text-center relative top-12">
            <span class="text-amber-600 drop-shadow-lg">ASIGNACIONES</span> EN PROGRESO
        </h2>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-black relative right-[5%] top-12 w-[110%]">
            <table class="min-w-full table-auto ">
                <thead class="bg-black text-yellow-400">
                    <tr>
                        <th class="px-4 py-2 text-left">Proyecto</th>
                        <th class="px-4 py-2 text-left">Maquina</th>
                        <th class="px-4 py-2 text-left">Provincia</th>
                        <th class="px-4 py-2 text-left">Encargado</th>
                        <th class="px-2 py-2 text-center w-32">Ver asignacion</th>
                        <th class="px-4 py-2 text-center w-40">Editar asignacion</th>
                        <th class="px-4 py-2 text-center w-40">Borrar asignacion</th>
                        <th class="px-0 py-2 text-center w-40">Finalizar asignacion</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="divide-y divide-gray-200">
                    @foreach ($asignaciones_pendientes as $asignaciones_pendiente)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $asignaciones_pendiente->project->name }}</td>
                            <td class="px-4 py-2">{{ $asignaciones_pendiente->machine->serial_number }}</td>
                            <td class="px-4 py-2">{{ $asignaciones_pendiente->project->province->name }}</td>
                            <td class="px-4 py-2">{{ $asignaciones_pendiente->user->name }}
                                {{ $asignaciones_pendiente->user->lastname }}</td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="verAsignacion({{ $asignaciones_pendiente->id }})">
                                    <i class="fas fa-eye text-orange-400 hover:text-orange-600"></i>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <a href="{{ route('editar.asignacion', $asignaciones_finalizada->id) }}">
                                    <i class="fas fa-pen text-yellow-400 hover:text-yellow-400"></i>
                                </a>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <button onclick="eliminarAsignacion({{ $asignaciones_finalizada->id }})">
                                    <i class="fas fa-trash text-red-500 hover:text-red-600"></i>
                                </button>
                            </td>
                            <td class="px-4 py-2 text-center w-32">
                                <a
                                    href="{{ route('formulario.asignacion', [$asignaciones_pendiente->id, $asignaciones_pendiente->machine->id]) }}">
                                    <i class="fas fa-times-circle text-red-500 hover:text-red-600"></i>
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
                    {{ $asignaciones_pendientes->appends(['finalizadas_page' => request('finalizadas_page')])->links() }}
                </div>
            </div>

        </div>

    </div>

    @vite('resources/js/asignaciones/accionesAsignacion.js')
</x-app-layout>
