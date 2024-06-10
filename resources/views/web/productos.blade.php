<!-- BARRA DE NAVEGACION -->
<x-navbarproductos></x-navbarproductos>
    
<!-- PRODUCTOS -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto">
        <div class="flex flex-wrap -m-4">

            @foreach ($productos as $producto)
            <a href="/web/verProducto/{{ $producto->id }}" class="lg:w-1/3 md:w-1/2 p-4 w-full">
                <div class="block relative h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->id .'.jpg') }}">
                    
                    <div class="p-4 mt-4">

                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $producto->categorias->nombre }}</h3>
                        <p class="mt-1 text-lg font-bold">{{ $producto->precio }} €</p>
                        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $producto->nombre }}</h2>
                        <p class="mt-1 text-gray-600 text-sm text-ellipsis">{{ $producto->descripcion }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER -->
<x-footer></x-footer>