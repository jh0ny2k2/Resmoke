<x-navbarvproducto></x-navbarvproducto>

<div class="container mx-auto px-6 py-4">
  <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
    </svg>
  </a>
</div>

<div class="flex justify-center min-h-52">
  <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl">
    <form action="/web/addOpinion/{{ $usuario->UsuarioId }}" method="POST" enctype="multipart/form-data" class="w-full">
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
