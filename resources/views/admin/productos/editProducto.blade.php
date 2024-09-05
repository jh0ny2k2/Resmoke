<!-- BARRA DE NAVEGACIÓN -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-2 md:ml-64">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form class="space-y-4" method="POST" action="/admin/editarProducto/{{ $producto->id }}">
            @csrf

            <!-- TITULO -->
            <h2 class="text-2xl font-bold text-gray-800">Editar Producto</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- NOMBRE -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ $producto->nombre }}">    
                </div>
                <!-- CATEGORIA -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select for="categoria" name="categoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                    </select>
                </div>

                <!-- PRECIO -->
                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="text" id="precio" name="precio" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ $producto->precio }}">
                </div>

                <!-- ESTADO -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select for="estado" name="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    @if ($producto->estado === 'observacion')
                            <option selected value="observacion">Observación</option>
                            <option value="activo">Activo</option>
                            <option value="vendido">Vendido</option>
                            <option value="reservado">Reservado</option>
                        @elseif ($producto->estado === 'activo')
                            <option value="observacion">Observación</option>
                            <option selected value="activo">Activo</option>
                            <option value="vendido">Vendido</option>
                            <option value="reservado">Reservado</option>
                        @elseif ($producto->estado === 'vendido')
                            <option value="observacion">Observación</option>
                            <option value="activo">Activo</option>
                            <option selected value="vendido">Vendido</option>
                            <option value="reservado">Reservado</option>
                        @else
                            <option value="observacion">Observación</option>
                            <option value="activo">Activo</option>
                            <option value="vendido">Vendido</option>
                            <option selected value="reservado">Reservado</option>
                        @endif
                    </select>
                        
                </div>

                <!-- FECHA DE NACIMIENTO -->
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>

                <!-- TELEFONO -->
                <div>
                    <label for="localizacion" class="block text-sm font-medium text-gray-700">Localización</label>
                    <input type of="text" id="localizacion" name="localizacion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ $producto->localizacion }}">
                </div>
            </div>

            <!-- BOTON -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Editar Producto
            </button>
        </form>
    </div>
</div>