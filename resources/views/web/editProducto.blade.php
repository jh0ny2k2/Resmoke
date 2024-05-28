<x-navbarvproducto></x-navbarvproducto>

<div class="container mx-auto px-4 py-8">

  <!-- BOTON VOLVER ATRAS -->
  <x-boton-atras></x-boton-atras>


  <div class="container mx-auto px-6 pt-5 pb-5">
    <!-- Título de la sección -->
    <form action="/web/editarProducto/{{ $producto->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      <h1 class="text-3xl font-semibold text-center mb-10">Edita tu producto</h1>


      <!-- Categorías del producto -->
      <div class="w-full md:w-1/2 mx-auto">

        <!-- Información básica del producto -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Información básica</legend>
          <div class="flex flex-wrap -mx-2">
            <!-- Nombre del Producto -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="nombreProducto" class="block mb-2 text-sm font-medium text-gray-700">Nombre del Producto</label>
              <input type="text" id="nombreProducto" name="nombreProducto" value="{{ $producto->nombre }}" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>

            <!-- Precio -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="precioProducto" class="block mb-2 text-sm font-medium text-gray-700">Precio</label>
              <input type="number" id="precioProducto" name="precioProducto" value="{{ $producto->precio }}" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>
          </div>

          <!-- Descripción -->
          <div class="px-2 mb-4">
            <label for="descripcionProducto" class="block mb-2 text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcionProducto" name="descripcionProducto" rows="4" class="px-4 py-2 block w-full text-sm border-2  rounded-lg" required>{{ $producto->descripcion }}</textarea>
          </div>

          <!-- Localizacion -->
          <div class="flex flex-wrap -mx-2">
            <!-- Localización -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label  or="localizacion" class="block mb-2 text-sm font-medium text-gray-700">Tu producto se verá en:</label>
              <input type="text" id="localizacion" name="localizacion" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" value="{{ $producto->localizacion }}" required>
            </div>

            <!-- Categoría -->
            <div class="w-full md:w-1/2 px-2 mb-4">
                <label for="categoria" class="block mb-2 text-sm font-medium text-gray-700">Categoría</label>
                <select id="categoria" name="categoria" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
                    <option value="1" {{ $producto->categoriaId == '1' ? 'selected' : '' }}>Cachimbas</option>
                    <option value="2" {{ $producto->categoriaId == '2' ? 'selected' : '' }}>Cazoletas</option>
                    <option value="3" {{ $producto->categoriaId == '3' ? 'selected' : '' }}>Mangueras</option>
                    <option value="4" {{ $producto->categoriaId == '4' ? 'selected' : '' }}>Bases</option>
                    <option value="5" {{ $producto->categoriaId == '5' ? 'selected' : '' }}>Accesorios</option>
                    <option value="6" {{ $producto->categoriaId == '6' ? 'selected' : '' }}>Vapers</option>
                </select>
            </div>
          </div>
        </fieldset>

        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Fotografías</legend>
          <div class="grid grid-cols-5 gap-4">
            <label class="border-2 border-dashed border-green-500 rounded-md p-4 min-h-32 flex flex-col items-center justify-center cursor-pointer hover:border-green-700 relative" style="background-image: url('{{ asset('storage/producto_' . $producto->id . '.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoPrincipal" class="sr-only" onchange="updateBackground(this)" />
            </label>

            @for ($i = 1; $i <= 4; $i++) 
              @if (Storage::exists('public/producto_' . $producto->id . 'Extra'. $i .'.jpg'))
                <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/producto_' . $producto->id . 'Extra'. $i .'.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                  <input type="file" name="fotoExtra{{ $i }}" class="sr-only" onchange="updateBackground(this)" />
                </label>
              @else 
                <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                  <input type="file" name="fotoExtra{{ $i }}" class="sr-only" onchange="updateBackground(this)" />
                </label>
              @endif
            @endfor
          </div>
        </fieldset>


        <!-- Botón de envío -->
        <div class="flex ">
          <button type="submit" class="bg-black text-white px-10 py-2 rounded-full hover:bg-gray-800">Subir Producto</button>
        </div>
    </form>
  </div>
</div>

<script>
  function updateBackground(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var label = input.closest('label');
        label.style.backgroundImage = 'url(' + e.target.result + ')';
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<x-footer></x-footer>