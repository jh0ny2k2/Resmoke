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
          <img src="{{ asset('storage/producto_'. $producto->id .'.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
        </div>

        <div class="w-full lg:w-1/2 1">
          <div class="flex flex-wrap justify-center items-center h-full">
            <div class="p-2 w-1/2">
              <img src="{{ asset('storage/producto_'. $producto->id .'Extra1.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
            </div>
            <div class="p-2 w-1/2">

              <img src="{{ asset('storage/producto_'. $producto->id .'Extra2.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />

            </div>
            <div class="p-2 w-1/2">
              <img src="{{ asset('storage/producto_'. $producto->id .'Extra3.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
            </div>
            <div class="p-2 w-1/2">
              <img src="{{ asset('storage/producto_'. $producto->id .'Extra4.jpg') }}" alt="Imagen principal del producto" class="w-full border-2 h-auto object-cover rounded-lg" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @auth
  @if ($productoo->usuarioId === Auth::user()->id)
  @if ($producto->estado === 'activo')
  <div class="px-8 pb-8 grid grid-cols-2 gap-4 text-center">
    <a href="/web/reservado/{{ $producto->id }}" class="bg-white hover:bg-gray-200 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
      Reservar
    </a>
    <a href="/web/vendido/{{ $producto->id }}" class="bg-white hover:bg-gray-200 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
      Vendido
    </a>
  </div>
  @elseif ($producto->estado === 'vendido')
  <div class="px-8 pb-8 grid grid-cols-2 gap-4 text-center">
    <a href="/web/quitarVendido/{{ $producto->id }}" class="bg-white hover:bg-gray-200 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
      Quitar Vendido
    </a>
  </div>
  @elseif ($producto->estado === 'reservado')
  <div class="px-8 pb-8 grid grid-cols-2 gap-4 text-center">
    <a href="/web/quitarReservado/{{ $producto->id }}" class="bg-white hover:bg-gray-200 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
      Quitar Reservar
    </a>
    <a href="/web/vendido/{{ $producto->id }}" class="bg-white hover:bg-gray-200 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
      Vendido
    </a>
  </div>
  @endif
  @endif
  @endauth

  <!-- DETALLES DEL PRODUCTO -->
  <div class="container mx-auto px-4 py-8 mb-8">
    <div class="flex items-center justify-between">

      <div class="flex flex-col">
        <h1 class="text-2xl font-bold inline uppercase">{{ $producto->nombre }}</h1>
        <span class="text-xl text-gray-600">{{ $producto->precio }} €</span>
      </div>
      
      @auth
        @if ($favorito)
        <a href="/web/deleteFavorito/{{ $producto->id }}">
          <button class="p-2 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-300">
            <i class="zmdi zmdi-favorite text-red-500"></i>
          </button>
        </a>
        @else
        <a href="/web/addFavorito/{{ $producto->id }}">
          <button class="p-2 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-300">
            <i class="zmdi zmdi-favorite"></i>
          </button>
        </a>
        @endif
      @endauth
    </div>
    <p class="mt-4 text-gray-600">{{ $producto->descripcion }}</p>
  </div>

  <!-- LOCALIZACION DEL PRODUCTO -->
  <div class=" container mx-auto px-4 py-8 mb-8">
    <h2 class="text-lg font-semibold mb-4 uppercase">Localización del producto</h2>
    <p class="text-gray-600">{{ $producto->localizacion }}</p>
    <div class="h-64 mt-2 rounded-lg bg-gray-200" id="mapContainer"></div>

    <div class="flex justify-center mt-5 space-x-4">
      <!-- Botón para ir al chat online -->
      <a class="border-2 text-center w-1/2 border-black text-black bg-white hover:bg-gray-100 py-2 px-6 focus:outline-none rounded" href="/chatify/{{ $productoo->usuarios->id }}">
          Ir al Chat Online
      </a>

      <!-- Botón para ver datos del vendedor -->
      <button onclick="openModal()" class="border-2 w-1/2 border-black text-black bg-white hover:bg-gray-100 py-2 px-6 focus:outline-none rounded">
        Ver datos vendedor
      </button>
    </div>
  </div>



  <x-footer></x-footer>


  <div id="myModal" class="modal">
    <!-- Contenido del modal -->
    <div class="bg-white rounded-lg shadow-lg p-5 m-10">
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Datos del vendedor</h2>
        <button onclick="closeModal()" class="text-xl font-bold">&times;</button>
      </div>
      <div class="p-8">
        <div class="p-8">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <img src="{{ asset('storage/fotoPerfil'. $productoo->usuarios->id .'.png') }}" alt="Perfil" class="h-40 ml-5 w-40 rounded-full object-cover mr-6">
            </div>
            <div class="mt-5">
              <p class="mb-5"><strong>Nombre:</strong> {{$productoo->usuarios->name}} </p>
              <p class="mb-5"><strong>Correo electrónico:</strong> {{$productoo->usuarios->email}} </p>
              <p><strong>Teléfono:</strong> {{$productoo->usuarios->telefono}} </p>
            </div>
            @auth
              <div>
                <a class="border-2 border-gray-900 p-2 rounded-lg hover:bg-gray-400" href="/web/verPerfilVendedor/{{ $productoo->usuarios->id }}">Ver Perfil de {{$productoo->usuarios->name}}</a>
              </div>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    // Función para abrir el modal
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    // Función para cerrar el modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
  </script>

  <script>
    // Inicializar la plataforma con tus credenciales
    let platform = new H.service.Platform({
      apikey: 'JmgrSX_OfaLN4VNyLi7_DJNM-Ct_lXpxeCnaj8vUKX0'
    });

    // Obtener el servicio de mapa predeterminado
    let defaultLayers = platform.createDefaultLayers();

    // Inicializar el mapa
    let map = new H.Map(
      document.getElementById('mapContainer'),
      defaultLayers.vector.normal.map, {
        zoom: 10,
        center: {
          lat: 23.5,
          lng: 45.4
        }
      }
    );

    // Añadir interacción con el mapa; zoom, moverse, etc.
    let behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

    // Crear la interfaz de usuario predeterminada y añadirla al mapa
    let ui = H.ui.UI.createDefault(map, defaultLayers);
  </script>