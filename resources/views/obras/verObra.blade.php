<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <a href="{{ route('obras') }}" class="text-gray-700 hover:text-black transition duration-200 ml-6 relative top-4 block">
        <i class="fa-solid fa-chevron-left text-3xl"></i>
    </a>

    <div class="relative top-20 max-w-5xl mx-auto my-10 p-8 bg-white shadow-2xl rounded-2xl border border-gray-200">
        <h2 class="text-3xl font-bold text-black mb-6 relative left-20 pb-4 text-center">Detalle de la obra</h2>

        <div class="flex flex-col md:flex-row items-start gap-8">

            <div class="w-full md:w-1/3 flex-shrink-0">
                <img src="{{ asset('images/layouts/obra.jpg') }}" alt="Imagen de la obra" class="w-full h-auto object-cover rounded-lg">
            </div>


            <div class="w-full md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6 text-lg">
                <div>
                    <p class="text-gray-500">Nombre de la obra:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $obra->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Fecha de inicio:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $obra->start_date }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Fecha de finalizacion:</p>
                    @if ($obra->end_date == null)
                        <p class="font-semibold text-red-600 text-xl">Sin fecha</p>
                    @else
                        <p class="font-semibold text-gray-800 text-xl">{{ $obra->end_date }}</p>
                    @endif
                </div>

                <div>
                    <p class="text-gray-500">Provincia:</p>
                    <p class="font-semibold text-gray-800 text-xl">{{ $obra->province->name }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="text-gray-500">Estado de asignaciones:</p>

                    @if($obra->assignmets->isNotEmpty())
                        @if ($obra->assignmets->last()->end_date == null)
                            <span class="inline-block w-5 h-5 rounded-full bg-green-500"></span>
                            <span class="text-green-700 font-semibold text-xl">Asignacion activa</span>
                        @else
                            <span class="inline-block w-5 h-5 rounded-full bg-red-500"></span>
                            <span class="text-red-700 font-semibold text-xl">Sin asignaciones</span>
                        @endif
                    @else
                        <span class="inline-block w-5 h-5 rounded-full bg-red-500"></span>
                        <span class="text-red-700 font-semibold text-xl">Sin asignaciones</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
