<x-navbaradmin></x-navbaradmin>




<div class="flex-1 p-10 ml-64">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form class="space-y-4" method="POST" action="/admin/addProducto" enctype="multipart/form-data">
            @csrf

            <h2 class="text-2xl font-bold text-gray-800">Añadir Producto</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <!-- Email -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select for="categoria" name="categoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="text" id="precio" name="precio" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <!-- Fecha de Nacimiento -->
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <!-- Teléfono -->
                <div>
                    <label for="localizacion" class="block text-sm font-medium text-gray-700">Localización</label>
                    <input type of="text" id="localizacion" name="localizacion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <select for="usuario" name="usuario" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Fotos del Producto</label>
                    <div class="grid grid-cols-2 justify-start items-center space-x-2">
                        <!-- Repetir este bloque para cada campo de entrada de foto -->
                        <div class="flex items-center">
                            <label class="block">
                                <span class="sr-only">Cargar foto 1</span>
                                <input type="file" name="fotoPrincipal" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </label>
                        </div>
                        <div class="flex items-center">
                            <label class="block">
                                <span class="sr-only">Cargar foto 2</span>
                                <input type="file" name="fotoExtra1" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </label>
                        </div>
                        <div class="flex items-center">
                            <label class="block">
                                <span class="sr-only">Cargar foto 3</span>
                                <input type="file" name="fotoExtra2" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <label class="block">
                                <span class="sr-only">Cargar foto 4</span>
                                <input type="file" name="fotoExtra3" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </label>
                        </div>
                        <div class="flex items-center">
                            <label class="block">
                                <span class="sr-only">Cargar foto 5</span>
                                <input type="file" name="fotoExtra4" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Añadir Producto
            </button>
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