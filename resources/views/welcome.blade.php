<!-- BARRA DE NAVEGACION -->
<x-nav-bar-inicio></x-nav-bar-inicio>

<!-- BANNER -->
<section class="text-gray-900 body-font">
    <div class="container mx-auto flex px-5 py-56 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-6xl text-5xl mb-4 font-medium">Encuentra lo que necesitas</h1>
            <p class="mb-8 font-mono leading-relaxed">Vende lo que no utilizas</p>
            <form method="post" action="{{ route('buscador') }}" class="flex w-full justify-center items-end">
            @csrf
                <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4 md:w-full text-left">
                    <input type="text" id="buscador" name="buscador" class="w-full bg-white rounded border-2 border-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="inline-flex text-white bg-black  py-2 px-6 focus:outline-none hover:bg-gray-800 rounded text-lg">Buscar</button>
            </form>
        </div>
    </div>
</section>

<!-- CATEGORIAS -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-12 flex-col">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Categorías</h1>
        </div>

        <div class="flex flex-wrap -m-4">
            @foreach ($categorias as $categoria)
            <div class="lg:w-1/6 md:w-1/2 p-4 w-full">
                <a href="/web/verCategoria/{{ $categoria->id}}" class="block relative h-40 w-40 overflow-hidden mx-auto">
                    <img alt="{{ $categoria->nombre }}" class="object-cover object-center w-full h-full block" src="{{ asset('storage/' . $categoria->nombre . '.png') }}">
                </a>
                <h2 class="text-gray-900 text-center title-font text-lg font-medium mt-4"> {{ $categoria->nombre }} </h2>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- PRODUCTOS -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-12 flex-col">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Algunos productos</h1>
        </div>
        <div class="flex flex-wrap -m-4">

            @foreach ($productos as $producto)
            <a href="/web/verProducto/{{ $producto->id }}" class="lg:w-1/3 md:w-1/2 p-4 w-full">
                <div class="block relative h-full max-h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    @if (Storage::exists('public/producto_' . $producto->id . '.jpg'))
                        <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/producto_'. $producto->id .'.jpg') }}">
                    @else 
                        <img alt="ecommerce" class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/noFoto.png') }}">
                    @endif
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

        <div class="flex justify-center mt-12">
            <a href="{{ route('verTodos') }}" class="inline-flex items-center border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none rounded">
                Ver más productos
            </a>
        </div>

    </div>
    
</section>


<!-- Contenedor de la notificación -->
<!-- <div id="notification" class="fixed bottom-4 left-4 bg-white border-l-4 border-gray-900 shadow-lg rounded-lg p-4 max-w-lg opacity-0 transform translate-y-4 transition-all duration-300">
        <div class="flex items-start">
            <div class="text-red-700"> -->
                <!-- Icono -->
                <!-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m2 4h.01m-6.938 4h13.856c1.054 0 1.88-.816 1.994-1.851l.007-.15V6c0-1.054-.816-1.88-1.851-1.994L19.938 4H6.062c-1.054 0-1.88.816-1.994 1.851L4.062 6v12c0 1.054.816 1.88 1.851 1.994l.15.006z"></path></svg> -->
            <!-- </div>
            <div class="ml-3"> -->
                <!-- Título de la notificación -->
                <!-- <p class="text-sm font-bold text-red-700">¡Notificación Importante!</p> -->
                <!-- Descripción de la notificación -->
                <!-- <p class="text-sm text-gray-500">Lamentamos informarles que nuestra base de datos ha sido eliminada debido a un problema inesperado. Estamos trabajando diligentemente para resolver la situación y para implementar medidas que prevengan futuros incidentes. <br><br> -->

                    <!-- Agradecemos su comprensión y paciencia mientras solucionamos este problema. Nos disculpamos sinceramente por cualquier inconveniente que esto pueda causar.</p> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- Botón de cerrar -->
        <!-- <button onclick="closeNotification()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600"> -->
            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> -->
        <!-- </button> -->
    <!-- </div> -->

    <script>
        // Mostrar la notificación al cargar la página
        window.onload = function() {
            const notification = document.getElementById('notification');
            notification.classList.remove('opacity-0', 'translate-y-4');
        }

        // Función para cerrar la notificación
        function closeNotification() {
            const notification = document.getElementById('notification');
            notification.classList.add('opacity-0', 'translate-y-4');
        }
    </script>
<!-- FOOTER -->
<x-footer></x-footer>