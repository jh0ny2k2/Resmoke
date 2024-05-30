<!-- BARRA DE NAVEGACIÓN -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-10 ml-64">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form class="space-y-4"  method="POST" action="/admin/addUser">
            @csrf

            <!-- TÍTULO -->
            <h2 class="text-2xl font-bold text-gray-800">Añadir Usuario</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- NOMBRE -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label> 
                    <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="Juan Pérez">
                </div>
                <!-- CONTRASEÑA -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="text" id="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" >
                </div>

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="ejemplo@correo.com">
                </div>
                <!-- GENERO -->
                <div>
                    <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
                    <select id="genero" name="genero" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="">Seleccione una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <!-- FECHA DE NACIMIENTO -->
                <div>
                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <!-- TELEFONO -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type of="text" id="telefono" name="telefono" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="123-456-7890">
                </div>
                <!-- DNI -->
                <div>
                    <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                    <input type="text" id="dni" name="dni" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="12345678A">
                </div>
                <!-- ROL -->
                <div>
                    <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                    <select id="rol" name="rol" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="">Seleccione un rol</option>
                        <option value="administrador">Administrador</option>
                        <option value="usuario">Usuario</option>
                    </select>
                </div>
            </div>

            <!-- BOTÓN -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Añadir Usuario
            </button>
        </form>
    </div>
</div>