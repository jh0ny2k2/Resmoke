<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>


  
<!-- BANNER -->
<div class="container rounded-lg relative mx-auto mb-10 mt-10" style="height: 200px;"> 

    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 z-10 text-center">
        <div class="relative inline-block w-32 h-32 md:w-48 md:h-48 bg-gray-300 rounded-full border-4 border-white overflow-hidden">
            <!-- IMAGEN DE PERFIL -->
            <img src="{{ asset('storage/fotoPerfil'. Auth::user()->id .'.png') }}" alt="Perfil" class="object-cover w-full h-full shadow-lg">
            <!-- BOTON DE EDICION -->
            <a href="" class="absolute -bottom-4 -right-4 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-3 inline-flex items-center justify-center z-20">
                <i class="fas fa-edit"></i> 
            </a>
        </div>
        <!-- NOMBRE USUARIO -->
        <h1 class="text-2xl font-semibold mt-4">{{$usuario->name}}</h1>
    </div>
</div>

<!-- PRODUCTOS -->
<section class="text-gray-600 body-font px-5 py-24 mx-auto  flex flex-col h-screen container">

    <div class="flex flex-wrap w-full mb-12 flex-col mt-10 ml-5">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Productos</h1>
    </div>


    <div class="container px-5 py-8 mx-auto">
        <div class="flex flex-wrap -m-4">

            @foreach ($productos as $producto)

            @if ( $producto->productos->estado == 'activo')
            <a href="/web/verProducto/{{ $producto->productoId }}">
            <div class="lg:w-1/3 md:w-1/2 p-4 w-full">
            <div class="block relative h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="relative">
                <!-- Imagen principal -->
                <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->productoId .'.jpg') }}">

            </div>
                
                <div class="p-4 mt-4">
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $producto->productos->nombre }}</h2>
                    <hr class="mt-2 mb-4">
                    <p class="mt-2 text-gray-600 text-sm">Visto: {{ $producto->productos->numeroVisto }}</p>
                    <p class="mt-1 text-gray-600 text-sm">Favorito: {{ $producto->productos->numeroFavorito }}</p>
                </div>
                <div class="flex justify-center pt-2 pl-4 pb-4 pr-4">
                    <a href="/web/promocionarProducto/{{ $producto->productoId }}" class="inline-block w-full">
                        <button class="w-full border border-gray-900 text-gray-900 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                            Promocionar Producto
                        </button>
                    </a>
                </div>
            </div>
            </a>
        </div>
            @endif
            @endforeach


            @foreach ($productos as $producto)

            @if ( $producto->productos->estado == 'reservado')
            <a href="/web/verProducto/{{ $producto->productoId }}">
            <div class="lg:w-1/3 md:w-1/2 p-4 w-full">
            <div class="block relative h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="relative">
                <!-- Imagen principal -->
                <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->productoId .'.jpg') }}">

                <img alt="overlay" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/reservado.png') }}">
            </div>
                
                <div class="p-4 mt-4">
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $producto->productos->nombre }}</h2>
                    <hr class="mt-2 mb-4">
                    <p class="mt-2 text-gray-600 text-sm">Visto: {{ $producto->productos->numeroVisto }}</p>
                    <p class="mt-1 text-gray-600 text-sm">Favorito: {{ $producto->productos->numeroFavorito }}</p>
                </div>
            </div>
            </a>
        </div>
            
            @endif
            @endforeach

            @foreach ($productos as $producto)

            @if ( $producto->productos->estado == 'vendido')
            <a href="/web/verProducto/{{ $producto->productoId }}">
            <div class="lg:w-1/3 md:w-1/2 p-4 w-full">
            <div class="block relative h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="relative">
                <!-- Imagen principal -->
                <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->productoId .'.jpg') }}">

                <img alt="overlay" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/vendido.png') }}">
            </div>
                
                <div class="p-4 mt-4">
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $producto->productos->nombre }}</h2>
                    <hr class="mt-2 mb-4">
                    <p class="mt-2 text-gray-600 text-sm">Visto: {{ $producto->productos->numeroVisto }}</p>
                    <p class="mt-1 text-gray-600 text-sm">Favorito: {{ $producto->productos->numeroFavorito }}</p>
                </div>
            </div>
            </a>
        </div>
            
            @endif
            @endforeach

        </div>
    </div>
</section>