<x-navbarvproducto></x-navbarvproducto>

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

<!-- Panel de 3 elementos -->
<div class="container px-5 py-24 mx-auto  flex flex-col h-screen">
    <ul class="flex rounded-lg w-full text-sm font-medium text-center text-gray-500 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 border-b border-gray-200  dark:border-gray-700" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
        <li class="flex-grow">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="w-full p-4 text-blue-600 hover:rounded-lg rounded-t-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-blue-500">Productos</button>
        </li>
        <li class="flex-grow">
            <button id="opiniones-tab" data-tabs-target="#opiniones" type="button" role="tab" aria-controls="opiniones" aria-selected="false" class="w-full p-4 hover:rounded-lg hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Opiniones</button>
        </li>
    </ul>
    <div id="defaultTabContent" class="flex-grow overflow-auto">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class=" container px-5 py-24 mx-auto flex flex-wrap -m-4">
                @foreach ($productos as $producto)
                <a href="verProducto.html" class="lg:w-1/3 md:w-1/2 p-4 w-full">
                    <div class="block relative h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/600x400">
                        <div class="mt-4">

                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Categoría</h3>
                            <p class="mt-1 text-lg font-bold">{{ $producto->productos->precio }}</p>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $producto->productos->nombre }}</h2>
                            <p class="mt-1 text-gray-600 text-sm">{{ $producto->productos->descripcion }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="opiniones" role="tabpanel" aria-labelledby="opiniones-tab">
            <div class=" container px-5 py-24 mx-auto flex flex-wrap -m-4">


            </div>
        </div>
    </div>
</div>