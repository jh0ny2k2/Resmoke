<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<div class="container mx-auto px-6 py-4">
    <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
      </svg>
    </a>
  </div>
  
<!-- Banner -->
<div class="container rounded-lg relative mx-auto mb-10 mt-10" style="height: 200px;"> <!-- Ajusta la altura según necesites -->

    <!-- Contenedor de la imagen de perfil y el nombre -->
    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 z-10 text-center">
        <!-- Imagen de perfil -->
        <div class="relative inline-block w-32 h-32 md:w-48 md:h-48 bg-gray-300 rounded-full border-4 border-white overflow-hidden">
            <img src="{{ asset('storage/fotoPerfil'. Auth::user()->id .'.png') }}" alt="Perfil" class="object-cover w-full h-full">
            <!-- Botón de edición -->
            <a href="" class="absolute -bottom-4 -right-4 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-3 inline-flex items-center justify-center z-20">
                <i class="fas fa-edit"></i> <!-- Asegúrate de tener un ícono de edición apropiado aquí -->
            </a>
        </div>
        <!-- Nombre de usuario -->
        <h1 class="text-2xl font-semibold mt-4">{{$usuario->name}}</h1>
    </div>
</div>

<section class="text-gray-600 body-font px-5 py-24 mx-auto  flex flex-col h-screen container">

    <div class="flex flex-wrap w-full mb-12 flex-col mt-10 ml-5">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Favoritos</h1>
    </div>

    <div class="container px-5 py-8 mx-auto">
        <div class="flex flex-wrap -m-4">

            @foreach ($productos as $producto)
            <a href="/web/verProducto/{{ $producto->id }}" class="lg:w-1/3 md:w-1/2 p-4 w-full">
                <div class="block relative h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->id .'.jpg') }}">
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
