<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <h2 class="text-3xl font-bold mb-6">Perfil</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-14">
            <div >
                <a href="{{ route('comoCrearPerfil') }}"><h3 class="text-lg mb-4 text-gray-600 hover:text-gray-800 hover:font-bold">¿Cómo creo una cuenta en Resmoke?</h3></a>
            </div>
            <div >
                <a href="{{ route('editarPerfil') }}"><h3 class="text-lg text-gray-600 hover:text-gray-800 hover:font-bold mb-4">¿Cómo edito mi perfil?</h3></a>
            </div>
            <div >
                <a href="{{ route('valoraciones') }}"><h3 class="text-lg text-gray-600 hover:text-gray-800 hover:font-bold mb-4">Valoraciones</h3></a>
            </div>
            <div >
                <a href="{{ route('olvidadoContraseña') }}"><h3 class="text-lg text-gray-600 hover:text-gray-800 hover:font-bold mb-4">He olvidado la contraseña</h3></a>
            </div>
            <div >
                <a href="{{ route('problemasPerfil') }}"><h3 class="text-lg text-gray-600 hover:text-gray-800 hover:font-bold mb-4">Problemas de Acceso a la cuenta</h3></a>
            </div>
            <div >
                <a href="{{ route('eliminarCuenta') }}"><h3 class="text-lg text-gray-600 hover:text-gray-800 hover:font-bold mb-4">Eliminar cuenta</h3></a>
            </div>
        </div>
    </div>