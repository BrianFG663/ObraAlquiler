<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <a href="{{ route('asignaciones') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>

    <div class="relative top-10 max-w-5xl w-4/5 mx-auto my-10 p-8 bg-white shadow-2xl rounded-2xl border border-orange-200">
        <h2 class="text-4xl relative bottom-4 left-24 font-extrabold text-orange-500  text-center">
            <span class="text-black drop-shadow-lg">DETALLES DE LA</span> ASIGNACION
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-lg items-start">
 
            <div class="flex justify-center items-start relative  top-4">
                <img src="{{ asset('images/layouts/asignacion.png') }}" alt="Imagen" class="max-w-full h-auto md:w-64">
            </div>


            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-500">Proyecto:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $asignacion->project->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Provincia:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $asignacion->project->province->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Maquina:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $asignacion->machine->serial_number }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Encargado de la asignacion:</p>
                    <p class="font-semibold text-gray-800 text-xl">
                        {{ $asignacion->user->name }} {{ $asignacion->user->lastname }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Fecha de inicio:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $asignacion->start_date }}</p>
                </div>

                @if ($asignacion->end_date !== null)
                    <div>
                        <p class="text-gray-500">Fecha de finalizacion:</p>
                        <p class="font-semibold text-gray-800 text-xl">{{ $asignacion->end_date }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Motivo de finalizacion:</p>
                        <p class="font-semibold text-gray-800 text-xl">{{ $asignacion->end_reason }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Kilometraje recorridos:</p>
                        <p class="font-semibold text-black text-xl">{{ $asignacion->kilometers }} KM</p>
                    </div>
                @else
                    <div>
                        <p class="text-gray-500">Fecha de finalizacion:</p>
                        <p class="font-semibold text-red-600 text-xl">Sin fecha de fin</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Estado de la asignacion:</p>
                        <span class="inline-block w-5 h-5 rounded-full bg-green-500 relative top-1"></span>
                        <span class="text-green-700 font-semibold text-xl">Asignacion activa</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
