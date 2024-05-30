<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- PRODUCTO -->
<div class="container mx-auto px-4 py-8">

  <!-- BOTON VOLVER ATRAS -->
  <div class="container mx-auto px-6 pl-6 pr-4 pt-4">
  <a href="/web/verProducto/{{ $producto->id }}" class="inline-flex items-center space-x-2 border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
    </svg>
  </a>
</div>

  <!-- INFORMACIÓN DEL PRODUCTO -->
  <div class="container mx-auto px-6 pt-5 pb-5">
    <form action="/web/editarProducto/{{ $producto->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      <h1 class="text-3xl font-semibold text-center mb-10">Edita tu producto</h1>

      <!-- INFORMACION BASICA -->
      <div class="w-full md:w-1/2 mx-auto">

        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Información básica</legend>
          <div class="flex flex-wrap -mx-2">
            <!-- NOMBRE -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="nombreProducto" class="block mb-2 text-sm font-medium text-gray-700">Nombre del Producto</label>
              <input type="text" id="nombreProducto" name="nombreProducto" value="{{ $producto->nombre }}" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>

            <!-- PRECIO -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="precioProducto" class="block mb-2 text-sm font-medium text-gray-700">Precio</label>
              <input type="number" id="precioProducto" name="precioProducto" value="{{ $producto->precio }}" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>
          </div>

          <!-- DESCRIPCION -->
          <div class="px-2 mb-4">
            <label for="descripcionProducto" class="block mb-2 text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcionProducto" name="descripcionProducto" rows="4" class="px-4 py-2 block w-full text-sm border-2  rounded-lg" required>{{ $producto->descripcion }}</textarea>
          </div>

          <!-- LOCALIZACION -->
          <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label or="localizacion" class="block mb-2 text-sm font-medium text-gray-700">Tu producto se verá en:</label>
              <input type="text" id="localizacion" name="localizacion" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" value="{{ $producto->localizacion }}" required>
            </div>

            <!-- CATEGORIA -->
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

        <!-- FOTOGRAFIAS -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Fotografías</legend>
          <div class="grid grid-cols-5 gap-4">
            <!-- FOTO PRINCIPAL -->
            <label class="border-2 border-dashed border-green-500 rounded-md p-4 min-h-32 flex flex-col items-center justify-center cursor-pointer hover:border-green-700 relative" style="background-image: url('{{ asset('storage/producto_' . $producto->id . '.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoPrincipal" class="sr-only" onchange="updateBackground(this)" />
            </label>

            <!-- FOTOS EXTRA -->
            @for ($i = 1; $i <= 4; $i++) 
              @if (Storage::exists('public/producto_' . $producto->id . 'Extra'. $i .'.jpg'))
                <label id="foto{{ $i }}" class="relative border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/producto_' . $producto->id . 'Extra'. $i .'.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                  <input type="file" name="fotoExtra{{ $i }}" class="sr-only" onchange="updateBackground(this)" />
                  <!-- Botón de eliminación -->
                  <a href="/web/eliminarProducto/{{$producto->id}}/{{$i}}" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 hover:bg-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 12.586L7.707 10.293a1 1 0 00-1.414 1.414L8.586 14 6.293 16.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L11.414 14l2.293-2.293a1 1 0 00-1.414-1.414L10 12.586z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </label>
                @else
                  <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <input type="file" name="fotoExtra{{ $i }}" class="sr-only" onchange="updateBackground(this)" />
                  </label>
                @endif
              @endfor
          </div>
        </fieldset>


        <!-- BOTON DE ENVIO -->
        <div class="flex ">
          <button type="submit" class="bg-black text-white px-10 py-2 rounded-full hover:bg-gray-800">Editar Producto</button>
        </div>
    </form>
  </div>
</div>

<!-- FOOTER -->
<x-footer></x-footer>

<!-- SCRIPT PARA ACTUALIZAR LA VISTA PREVIA DE LAS FOTOS -->
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