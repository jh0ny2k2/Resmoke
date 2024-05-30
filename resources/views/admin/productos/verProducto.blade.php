<!-- BARRA DE NAVEGACION -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-10 ml-60">

    <!-- TITULO -->
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Visualizar Producto {{ $producto->nombre }} </h1>

    <!-- BOTON VOLVER ATRAS -->
    <a href="{{ route('verConfirmar') }}" class="inline-block">
        <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
            Volver Atrás
        </button>
    </a>

    <!-- CONTENIDO -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="grid grid-cols-2 px-4 py-5 sm:px-6 border-b border-gray-200">
            <div class="grid grid-rows-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Información del Producto</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Detalles y descripción.</p>
            </div>

            <!-- BOTONES DE ACCION -->
            <div class="flex justify-end space-x-2">

                <!-- BOTON EDITAR -->
                <a href="/admin/confirmar/{{ $producto->id }}" class="inline-block">
                    <button class="p-2 text-green-500 hover:text-green-700">
                        <span class="material-icons text-4xl">check</span>
                    </button>
                </a>

                <!-- BOTON ELIMINAR -->
                <a href="/admin/denegar/{{ $producto->id }}" class="inline-block">
                    <button class="p-2 text-red-500 hover:text-red-700">
                        <span class="material-icons text-4xl">close</span>
                    </button>
                </a>
            </div>
        </div>

        <!-- CONTENIDO -->
        <div class="px-4 py-5 sm:p-6 grid grid-cols-2 gap-4">

            <!-- NOMBRE -->
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Nombre:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->nombre }}</dd>
            </div>

            <!-- CATEGORIA -->
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Categoría:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->categorias->nombre }}</dd>
            </div>

            <!-- PRECIO -->
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Precio:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->precio }} €</dd>
            </div>

            <!-- ESTADO -->
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Descripción:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->descripcion }}</dd>
            </div>

            <!-- LOCALIZACION -->
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Localización:</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->localizacion }}</dd>
            </div>
            <br>
            <!-- FOTOS -->
            <div class="bg-gray-50 px-4 py-5">
                <dt class="text-sm font-medium text-gray-500">Fotos:</dt>
                <br>
                    <div>
                        <div class="flex justify-center items-center">
                            <div class="flex flex-wrap justify-center items-center max-w-3x min-h-60 mx-auto">
                                <!-- FOTO PRINCIPAL -->
                                <div class="flex justify-center items-center w-full lg:w-1/2 p-2">
                                    <img src="{{ asset('storage/producto_'. $producto->id .'.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
                                </div>

                                <!-- FOTOS EXTRA -->
                                <div class="w-full lg:w-1/2 1">
                                    <div class="flex flex-wrap justify-center items-center h-full">
                                        <div class="p-2 w-1/2">
                                            @if (Storage::exists('public/producto_' . $producto->id . 'Extra1.jpg'))
                                                <img src="{{ asset('storage/producto_'. $producto->id .'Extra1.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @else
                                                <img src="{{ asset('storage/noFoto.png') }}" alt="Imagen predeterminada" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @endif
                                        </div>
                                        <div class="p-2 w-1/2">
                                            @if (Storage::exists('public/producto_' . $producto->id . 'Extra2.jpg'))
                                                <img src="{{ asset('storage/producto_'. $producto->id .'Extra2.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @else
                                                <img src="{{ asset('storage/noFoto.png') }}" alt="Imagen predeterminada" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @endif
                                        </div>
                                        <div class="p-2 w-1/2">
                                            @if (Storage::exists('public/producto_' . $producto->id . 'Extra3.jpg'))
                                                <img src="{{ asset('storage/producto_'. $producto->id .'Extra3.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @else
                                                <img src="{{ asset('storage/noFoto.png') }}" alt="Imagen predeterminada" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @endif
                                        </div>
                                        <div class="p-2 w-1/2">
                                            @if (Storage::exists('public/producto_' . $producto->id . 'Extra4.jpg'))
                                                <img src="{{ asset('storage/producto_'. $producto->id .'Extra4.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
                                            @else
                                                <img src="{{ asset('storage/noFoto.png') }}" alt="Imagen predeterminada" class="w-full border-2 h-auto object-cover rounded-lg" />
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>