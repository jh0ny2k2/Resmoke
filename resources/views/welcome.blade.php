<x-nav-bar-inicio>

</x-nav-bar-inicio>

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

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-12 flex-col">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Algunos productos</h1>
        </div>
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

        <div class="flex justify-center mt-12">
            <a href="{{ route('verTodos') }}" class="inline-flex items-center border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none rounded">
                Ver más productos
            </a>
        </div>

    </div>

</section>


<x-footer>

</x-footer>