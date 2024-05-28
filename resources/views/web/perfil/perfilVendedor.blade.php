<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>


<div class="flex justify-center min-h-52 ">
    <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl border">
        <div class="flex justify-between items-center border-b p-8">
            <div class="flex items-center">
                <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-28 w-28 rounded-full object-cover mr-6 shadow-lg">
                <div>
                    <h2 class="text-2xl font-semibold uppercase"> {{$usuario->name}} </h2>
                </div>
            </div>
        </div>
        <div class="p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
            <div class="grid grid-cols-2">
                <p><strong>Correo electrónico:</strong> {{$usuario->email}} </p>
                <p><strong>Teléfono:</strong> {{$usuario->telefono}} </p>
            </div>
        </div>
        <div class="px-8 pb-8 grid grid-cols-2 gap-4 text-center">
                <a href="/web/verProductosVendedor/{{ $usuario->id }}" class="bg-white hover:bg-gray-300 text-dark border border-dark font-bold  border-gray-400 shadow-lg py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Productos
                </a>
                <a href="/web/verOpinionesVendedor/{{ $usuario->id }}" class="bg-white border border-gray-400 rounded shadow-lg hover:bg-gray-300 text-dark border-dark font-bold py-2 px-4 transition duration-200 ease-in-out">
                    Ver Opiniones   
                </a>
            </div>
    </div>
</div>
