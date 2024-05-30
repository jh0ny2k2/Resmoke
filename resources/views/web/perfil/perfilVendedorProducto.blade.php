<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>

<!-- PERFIL -->
<div class="flex justify-center min-h-52 ">
    <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl border">
        <div class="flex justify-between items-center border-b p-8">
            <div class="flex items-center">

                <!-- FOTO DE PERFIL -->
                <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-28 shadow-lg w-28 rounded-full object-cover mr-6">
                <div>

                    <!-- NOMBRE -->
                    <h2 class="text-2xl font-semibold uppercase"> {{$usuario->name}} </h2>
                </div>
            </div>
        </div>

        <!-- INFORMACION DE CONTACTO -->
        <div class="p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
            <div class="grid grid-cols-2">

                <!-- CORREO ELECTRONICO -->
                <p><strong>Correo electrónico:</strong> {{$usuario->email}} </p>

                <!-- TELEFONO -->
                <p><strong>Teléfono:</strong> {{$usuario->telefono}} </p>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCTOS -->
<div class="flex justify-center min-h-52">
    <div class="max-w-4xl w-full my-5 bg-white rounded-lg border shadow-xl">
        <div class="p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Productos</h3>
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                        @foreach ($productos as $producto)
                        <a href="/web/verProducto/{{ $producto->productoId }}" class="p-4">
                            <div class="h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->productos->id .'.jpg') }}">
                                <div class="p-4 mt-4">
                                    <p class="mt-1 text-lg font-bold">{{ $producto->productos->precio }} €</p>
                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $producto->productos->nombre }}</h2>
                                    <p class="mt-1 text-gray-600 text-sm text-ellipsis">{{ $producto->productos->descripcion }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>