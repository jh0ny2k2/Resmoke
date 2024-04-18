<x-navbarvproducto></x-navbarvproducto>

<div class="container mx-auto px-4 py-8">

  <!-- BOTON VOLVER ATRAS -->
  <div class="container mx-auto px-6 py-4">
    <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
      </svg>
    </a>
  </div>

  <!-- GALERIA DE IMAGENES-->
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-center items-center">

      <div class="flex flex-wrap justify-center items-center max-w-3x min-h-48 mx-auto">
        <div class="flex justify-center items-center w-full lg:w-1/2 p-2"> 
            <img src="{{ asset('storage/images.jpeg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" /> 
        </div>

        <div class="w-full lg:w-1/2 1">
          <div class="flex flex-wrap justify-center items-center h-full">
            <div class="p-2 w-1/2">  
              <img src="{{ asset('storage/images.jpeg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
            </div>
            <div class="p-2 w-1/2">
     
              <img src="{{ asset('storage/images.jpeg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
  
            </div>
            <div class="p-2 w-1/2">     
              <img src="{{ asset('storage/images.jpeg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
            </div>
            <div class="p-2 w-1/2">  
              <img src="{{ asset('storage/images.jpeg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" /> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DETALLES DEL PRODUCTO -->
  <div class="container mx-auto px-4 py-8 mb-8">
    <div class="flex items-center justify-between">

      <div class="flex flex-col">
        <h1 class="text-2xl font-bold inline uppercase">{{ $producto->nombre }}</h1>
        <span class="text-xl text-gray-600">{{ $producto->precio }} €</span>
      </div>

      <a href="/addFavorito/{{ $producto->id }}">
        <button class="p-2 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-red-500 focus:bg-red-500 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <!-- Este es un ícono de corazón, puedes reemplazarlo con el que prefieras -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 15.804a6.414 6.414 0 001.883 2.8c1.658 1.547 3.874 2.396 6.496 2.396s4.838-.85 6.496-2.396a6.414 6.414 0 001.883-2.8C23.25 12.55 20.5 9 16.5 9c-1.74 0-3.41.78-4.5 2.09C10.91 9.78 9.24 9 7.5 9 3.5 9 .75 12.55 5.121 15.804z" />
          </svg>
        </button> 
      </a>
    </div>
    <p class="mt-4 text-gray-600">{{ $producto->descripcion }}</p>
  </div>

  <!-- LOCALIZACION DEL PRODUCTO -->
  <div class=" container mx-auto px-4 py-8 mb-8">
    <h2 class="text-lg font-semibold mb-4 uppercase">Localización del producto</h2>
    <p class="text-gray-600">{{ $producto->localizacion }}</p>
    <div class="h-64 mt-2 rounded bg-gray-200">
      <img src="{{ asset('storage/mapa.png') }}" alt="Mapa" class="w-full rounded h-full object-cover" />
    </div>

    <div class="flex justify-center mt-5 space-x-4">
      <!-- Botón para ir al chat online -->
      <button class="border-2 w-1/2 border-black text-black bg-white hover:bg-gray-100 py-2 px-6 focus:outline-none rounded">
        Ir al Chat Online
      </button>

      <!-- Botón para ver datos del vendedor -->
      <button class="border-2 w-1/2 border-black text-black bg-white hover:bg-gray-100 py-2 px-6 focus:outline-none rounded">
        Ver datos vendedor
      </button>
    </div>
  </div>

  <x-footer></x-footer>