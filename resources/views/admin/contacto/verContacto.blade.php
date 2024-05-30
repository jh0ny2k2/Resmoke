<x-navbaradmin></x-navbaradmin>

<div class="flex-1 p-10 ml-60">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Contacto {{ $contacto->id }}</h1>
    <a href="{{ url()->previous() }}" class="inline-block">
        <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
            Volver Atrás
        </button>
    </a>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg justify-center">
        <div class="px-4 py-5 sm:p-6 grid grid-cols-2 gap-4">
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded">
                <dt class="text-sm font-medium text-gray-500">Nombre:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $contacto->nombre }}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded">
                <dt class="text-sm font-medium text-gray-500">Email:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $contacto->email }}</dd>
            </div>
            
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded gap-4 ml-5 mr-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500">Comentario:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $contacto->comentario }}</dd>
            </div>
        <div class="flex justify-center space-x-2">
                <a href="/admin/aceptarContacto/{{ $contacto->id }}" class="inline-block">
                    <button class="p-2 text-green-500 hover:text-green-700">
                        <span class="material-icons text-4xl">check</span>
                    </button>
                </a>
            </div>
    </div>
</div>