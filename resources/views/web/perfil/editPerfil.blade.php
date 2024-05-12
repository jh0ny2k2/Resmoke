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
    <form action="" method="POST" enctype="multipart/form-data" class="w-full">
      @csrf
      <div class="flex justify-between items-center border-b p-8">
        <div class="flex items-center">
          <label for="fotoPerfil" class="cursor-pointer">
            <input type="file" id="fotoPerfil" name="fotoPerfil" class="hidden">
            <img id="preview_fotoPerfil" src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-28 w-28 rounded-full object-cover mr-6 cursor-pointer">
          </label>
          <div>
          <label for="nombre" class="block">
            <strong>Nombre:</strong>
            <input type="text" id="nombre" name="nombre" value="{{$usuario->name}}" class="mt-1 block w-full border-gray-300 rounded-md">
          </label>
            <p class="text-gray-600"> {{$usuario->rol}} </p>
          </div>
        </div>
        <a href="">
            <button type="submit" class="text-dark font-semibold py-2 px-4 border border-dark rounded">Guardar Cambios</button>
        </a>
      </div>
      <div class="p-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
        <div class="grid grid-cols-2 gap-4">
          <label for="email" class="block">
            <strong>Correo electrónico:</strong>
            <input type="email" id="email" name="email" value="{{$usuario->email}}" class="mt-1 block w-full border-gray-300 rounded-md">
          </label>
          <label for="telefono" class="block">
            <strong>Teléfono:</strong>
            <input type="text" id="telefono" name="telefono" value="{{$usuario->telefono}}" class="mt-1 block w-full border-gray-300 rounded-md">
          </label>
          <label for="fechaNacimiento" class="block">
            <strong>Fecha de nacimiento:</strong>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{$usuario->fechaNacimiento}}" class="mt-1 block w-full border-gray-300 rounded-md">
          </label>
          <label for="genero" class="block">
            <strong>Género:</strong>
            <input type="text" id="genero" name="genero" value="{{$usuario->genero}}" class="mt-1 block w-full border-gray-300 rounded-md">
          </label>
          <label for="dni" class="block">
            <strong>Dni:</strong>
            <input type="text" id="dni" name="dni" value="{{$usuario->dni}}" class="mt-1 block w-full border-gray-300 rounded-md">
          </label>
        </div>
      </div>
    </form>
  </div>
</div>

