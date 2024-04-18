<x-navbaradmin></x-navbaradmin>

         <div class="flex-1 p-10 grid grid-cols-3 gap-6 ml-60">
            <!-- Card for Users -->
            <a href="{{ route('adminUsuario') }}" class="shadow-lg rounded-lg flex flex-col items-center justify-center bg-white p-6 hover:bg-blue-100 transition-colors">
                <span class="material-icons text-blue-500 text-6xl">people</span>
                <p class="text-3xl font-semibold my-2">{{ $usuario }}</p>
                <p class="text-gray-800 text-xl">Usuarios</p>
            </a>
    
            <a href="{{ route('adminProducto') }}" class="shadow-lg rounded-lg flex flex-col items-center justify-center bg-white p-6 hover:bg-blue-100 transition-colors">
                <span class="material-icons text-green-500 text-6xl">inventory_2</span>
                <p class="text-3xl font-semibold my-2">{{ $productos }}</p>
                <p class="text-gray-800 text-xl">Productos</p>
            </a>
    
            <a href="{{ route('adminCategoria') }}" class="shadow-lg rounded-lg flex flex-col items-center justify-center bg-white p-6 hover:bg-blue-100 transition-colors">
                <span class="material-icons text-purple-500 text-6xl">category</span>
                <p class="text-3xl font-semibold my-2">{{ $categoria }}</p>
                <p class="text-gray-800 text-xl">Categorías</p>
            </a>
    
            <a href="{{ route('adminFavorito') }}" class="shadow-lg rounded-lg flex flex-col items-center justify-center bg-white p-6 hover:bg-blue-100 transition-colors">
                <span class="material-icons text-red-500 text-6xl">favorite_border</span>
                <p class="text-3xl font-semibold my-2">{{ $favorito }}</p>
                <p class="text-gray-800 text-xl">Favoritos</p>
            </a>
    
            <a href="{{ route('adminOpiniones') }}" class="shadow-lg rounded-lg flex flex-col items-center justify-center bg-white p-6 hover:bg-blue-100 transition-colors">
                <span class="material-icons text-orange-500 text-6xl">rate_review</span>
                <p class="text-3xl font-semibold my-2">{{ $opinion }}</p>
                <p class="text-gray-800 text-xl">Opiniones</p>
            </a>
        </div>
        </div>
</body>
</html>












