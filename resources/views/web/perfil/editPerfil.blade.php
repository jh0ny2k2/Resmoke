<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>


<!-- PERFIL -->
<div class="flex justify-center min-h-52">
  <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl border ">

    <form action="" method="POST" enctype="multipart/form-data" class="w-full">
      @csrf

      <h3 class="text-xl font-semibold text-gray-800 p-8 uppercase">Edición de Perfil</h3>

      <div class="flex justify-between items-center border-b pl-8 pb-8 pr-8">
        <div class="flex items-center">

          <!-- FOTO DE PERFIL -->
          <label class="h-28 w-28 rounded-full object-cover mr-6 cursor-pointer shadow-lg " style="background-image: url('{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <input type="file" name="fotoPerfil" class="sr-only" onchange="updateBackground(this)" />
          </label>

          <!-- NOMBRE -->
          <div>
            <label for="nombre" class="block">
              <strong>Nombre:</strong>
              <input type="text" id="nombre" name="nombre" value="{{$usuario->name}}" class="mt-1 block w-full p-1  rounded-md ">
            </label>

            <!-- ROL -->
            <p class="text-gray-600"> {{$usuario->rol}} </p>
          </div>
        </div>

        <!-- GUARDAR CAMBIOS -->
        <a href="">
          <button type="submit" class="text-dark font-semibold py-2 px-4  border-2 border-gray-400 rounded shadow-lg hover:bg-gray-300">Guardar Cambios</button>
        </a>
      </div>

      <!-- INFORMACION DE CONTACTO -->
      <div class="p-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
        <div class="grid grid-cols-2 gap-4">

          <!-- CORREO ELECTRONICO -->
          <label for="email" class="block">
            <strong>Correo electrónico:</strong>
            <input type="email" id="email" name="email" value="{{$usuario->email}}" class="mt-1 block w-full p-1  rounded-md shadow-lg l-2">
          </label>

          <!-- TELEFONO -->
          <label for="telefono" class="block">
            <strong>Teléfono:</strong>
            <input type="text" id="telefono" name="telefono" value="{{$usuario->telefono}}" class="mt-1 block w-full p-1  rounded-md shadow-lg">
          </label>

          <!-- FECHA DE NACIMIENTO -->
          <label for="fechaNacimiento" class="block">
            <strong>Fecha de nacimiento:</strong>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{$usuario->fechaNacimiento}}" class="mt-1 block w-full p-1 shadow-lg rounded-md">
          </label>

          <!-- GÉNERO -->
          <label for="genero" class="block">
            <strong>Género:</strong>
            <select id="genero" name="genero" class="shadow-lg mt-1 block w-full rounded-md p-1">
              <option value="femenino" {{$usuario->genero == 'femenino' ? 'selected' : ''}}>Femenino</option>
              <option value="masculino" {{$usuario->genero == 'masculino' ? 'selected' : ''}}>Masculino</option>
              <option value="otro" {{$usuario->genero == 'otro' ? 'selected' : ''}}>Otros</option>
            </select>
          </label>

          <!-- DNI -->
          <label for="dni" class="block">
            <strong>Dni:</strong>
            <input type="text" id="dni" name="dni" value="{{$usuario->dni}}" class="mt-1 block w-full rounded-md p-1 shadow-lg">
          </label>
        </div>
      </div>
    </form>
  </div>
</div>

<!--  SCRIPT PARA ACTUALIZAR LA VISTA PREVIA DE LA FOTO -->
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