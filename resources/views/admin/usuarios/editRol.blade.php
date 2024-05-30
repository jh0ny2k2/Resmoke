<!-- BARRA DE NAVEGACION -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-10 ml-64">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form class="space-y-4" method="POST" action="/admin/editRol/{{ $usuario->id }}">
            @csrf

            <!-- TITULO -->
            <h2 class="text-2xl font-bold text-gray-800">Editar Usuario</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>

                    <!-- ROL -->
                    <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                    <select id="rol" name="rol" required class="mt-1 borde block w-full border-dark rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        @if ($usuario->rol === 'administrador')
                            <option selected value="administrador">Administrador</option>
                            <option value="usuario">Usuario</option>
                        @else
                            <option value="administrador">Administrador</option>
                            <option selected value="usuario">Usuario</option>
                        @endif
                    </select>
                </div>
            </div>

            <!-- BOTON -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Editar Usuario
            </button>
        </form>
    </div>
</div>