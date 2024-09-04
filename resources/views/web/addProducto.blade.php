<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- PRODUCTO -->
<div class="container mx-auto px-4 py-8">

  <!-- BOTON VOLVER ATRAS -->
  <x-boton-atras></x-boton-atras>

  <div class="container mx-auto px-6 pt-5 pb-5">
    <form action="{{ route('storeProducto') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <h1 class="text-3xl font-semibold text-center mb-10">Sube tu producto</h1>

      <!-- CATEGORIAS -->
      <div class="w-full lg:w-1/2 mx-auto">
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Selecciona la categoría de tu producto:</legend>
          <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 my-5">
            @foreach ($categorias as $categoria)
            <label class="flex flex-col items-center cursor-pointer group">
              <input type="radio" name="categoria" id="categoria" value="{{ $categoria->id }}" class="sr-only peer" />
              <div class="p-2 rounded-full group-hover:bg-gray-100 peer-checked:bg-gray-200">
                <img src="{{ asset('storage/' . $categoria->nombre . '.png') }}" alt="{{ $categoria->nombre}}" class="h-20 w-22">
              </div>
              <span class="mt-2 text-sm text-gray-600 group-hover:text-black peer-checked:text-dark">{{ $categoria->nombre }}</span>
            </label>
            @endforeach
          </div>
        </fieldset>

        <!-- INFORMACION BASICA -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Información básica</legend>
          <div class="flex flex-wrap -mx-2">
            <!-- NOMBRE -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="nombreProducto" class="block mb-2 text-sm font-medium text-gray-700">Nombre del Producto</label>
              <input type="text" id="nombreProducto" name="nombreProducto" placeholder="Cachimba Aladin" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>

            <!-- PRECIO -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="precioProducto" class="block mb-2 text-sm font-medium text-gray-700">Precio</label>
              <input type="number" id="precioProducto" name="precioProducto" placeholder="10€" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>
          </div>

          <!-- DESCRIPCION -->
          <div class="px-2 mb-4">
            <label for="descripcionProducto" class="block mb-2 text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcionProducto" name="descripcionProducto" placeholder="Descripcion del producto" rows="4" class="px-4 py-2 block w-full text-sm border-2 rounded-lg" required></textarea>
          </div>

          <!-- LOCALIZACION -->
          <div class="w-full px-2 mb-4">
            <label for="localizacion" class="block mb-2 text-sm font-medium text-gray-700">Tu producto se verá en:</label>
            <input type="text" id="localizacion" name="localizacion" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" placeholder="Lugar de venta" required>
          </div>
        </fieldset>

        <!-- FOTOGRAFIAS -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Fotografías</legend>
          <div class="grid grid-cols-2 grid-rows-3 sm:grid-cols-6 gap-4">
            
            <!-- FOTO PRINCIPAL (colocada en la parte superior central, ocupando ambas columnas) -->
            <label class="border-2 border-dashed border-green-500 rounded-md  pt-24 flex items-center justify-center cursor-pointer hover:border-green-700 relative col-span-2" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoPrincipal" required class="sr-only" onchange="updateBackground(this)" />
            </label>

            <!-- FOTOS EXTRA (ubicadas en las siguientes filas de la grid) -->
            @for ($i = 1; $i <= 4; $i++) 
              <label class="border-2 border-dashed border-gray-300  rounded-md pt-28 flex items-center justify-center cursor-pointer hover:border-gray-700 relative" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <input type="file" name="fotoExtra{{ $i }}" class="sr-only" onchange="updateBackground(this)" />
              </label>
            @endfor
          </div>
        </fieldset>


        <!-- BOTON DE ENVIO -->
        <div class="flex">
          <button type="submit" class="bg-black text-white px-10 py-2 rounded-full hover:bg-gray-800">Subir Producto</button>
        </div>
    </form>
  </div>
</div>

</div>

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

<x-footer></x-footer>