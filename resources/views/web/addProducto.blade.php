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

  <div class="container mx-auto px-6 pt-5 pb-5">
    <!-- Título de la sección -->
    <form action=" {{ route('storeProducto') }}" method="POST" enctype="multipart/form-data">
      <h1 class="text-3xl font-semibold text-center mb-10">Sube tu producto</h1>


      <!-- Categorías del producto -->
      <div class="w-full md:w-1/2 mx-auto">
        
        <!-- Categorías del producto con imágenes -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Selecciona la categoría de tu producto:</legend>
          <div class="flex justify-center gap-4 my-5">
            @foreach ($categorias as $categoria)
            <label class="flex flex-col items-center cursor-pointer group">
              <input type="radio" name="categoria" id="categoria" value=" {{ $categoria->nombre }}" class="sr-only peer" />
              <div class="p-2 rounded-full group-hover:bg-gray-100 peer-checked:bg-gray-200">
                <img src="{{ asset('storage/' . $categoria->nombre . '.png') }}" alt="{{ $categoria->nombre}}" class="h-20 w-22">
              </div>
              <span class="mt-2 text-sm text-gray-600 group-hover:text-black peer-checked:text-dark">{{ $categoria->nombre }}</span>
            </label>
            @endforeach
          </div>
        </fieldset>

        <!-- Información básica del producto -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Información básica</legend>
          <div class="flex flex-wrap -mx-2">
            <!-- Nombre del Producto -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="nombreProducto" class="block mb-2 text-sm font-medium text-gray-700">Nombre del Producto</label>
              <input type="text" id="nombreProducto" name="nombreProducto" placeholder="Cachimba Aladin" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>

            <!-- Precio -->
            <div class="w-full md:w-1/2 px-2 mb-4">
              <label for="precioProducto" class="block mb-2 text-sm font-medium text-gray-700">Precio</label>
              <input type="number" id="precioProducto" name="precioProducto" placeholder="10€" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" required>
            </div>
          </div>

          <!-- Descripción -->
          <div class="px-2 mb-4">
            <label for="descripcionProducto" class="block mb-2 text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcionProducto" name="descripcionProducto" placeholder="Descripcion del producto" rows="4" class="px-4 py-2 block w-full text-sm border-2  rounded-lg" required></textarea>
          </div>

          <!-- Localizacion -->
          <div class="w-full  px-2 mb-4">
            <label for="localizacion" class="block mb-2 text-sm font-medium text-gray-700">Tu producto se verá en:</label>
            <input type="text" id="localizacion" name="localizacion" class="block w-full px-4 py-2 text-sm border-2 rounded-lg" placeholder="Lugar de venta" required>
          </div>
        </fieldset>

        <!-- Subida de fotos del producto -->
        <fieldset class="mb-6">
          <legend class="text-xl mb-4">Fotografías</legend>

          <div class="grid grid-cols-5 gap-4">
            <!-- Foto principal -->
            <label class="border-2 border-dashed border-green-500 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-green-700" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoPrincipal" accept="image/*" class="sr-only" onchange="updateBackground(this)" />
            </label>

            <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoExtra1" accept="image/*" class="sr-only" onchange="updateBackground(this)" />
            </label>

            <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoExtra2" accept="image/*" class="sr-only" onchange="updateBackground(this)" />
            </label>
            
            <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-700" style="background-image: url('{{ asset('storage/nouvelle-icone-grise.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
              <input type="file" name="fotoExtra3" accept="image/*" class="sr-only" onchange="updateBackground(this)" />
            </label>

            <label class="border-2 border-dashed border-gray-300 rounded-md p-4 flex flex-col items-center justify-center cursor-pointer hover:border-gray-500">
              <input type="file" name="fotosAdicional1" accept="image/*" class="sr-only" onchange="updateImagePreview(this)" />
              <img src="{{ asset('storage/nouvelle-icone-grise.png') }}" alt="Icono de cámara" />
            </label>

          
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