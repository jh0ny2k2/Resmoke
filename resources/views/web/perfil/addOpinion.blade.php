<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>

<div class="flex justify-center min-h-52">
  <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl">
    <form action="/web/addOpinion/{{ $usuario->id }}" method="POST" enctype="multipart/form-data" class="w-full">
      @csrf
      <div class="flex justify-between items-center p-8">
        <label for="opinion" class="w-full">
          <strong>Opinion:</strong> <br>
          <textarea class="border border-gray-900 rounded-lg mt-5 w-full" id="opinion" name="opinion" rows="4" cols="50"></textarea>
        </label>
      </div>
      <div class="flex ml-8 mb-8">
          <button type="submit" class="bg-white border border-gray-900 text-dark px-10 py-2 rounded-lg hover:bg-gray-200">Añadir Opinión</button>
        </div>
      
    </form>
  </div>
</div>
