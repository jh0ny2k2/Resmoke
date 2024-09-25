<x-navbarcontacto></x-navbarcontacto>

<!-- FAQ Section -->
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <h2 class="text-3xl font-bold mb-6">¿Como te podemos ayudar?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Comprar y Vender</h3>
                <ul>
                    <li class="mt-2"><a href="{{ route('misProductos') }}" class="text-gray-600 hover:text-gray-800 text">Mis Productos</a></li>
                    <li class="mt-2"><a href="{{ route('comprarResmoke') }}" class="text-gray-600 hover:text-gray-800 text-bold">Como Comprar en Resmoke</a></li>
                    <li class="mt-2"><a href="{{ route('venderResmoke') }}" class="text-gray-600 hover:text-gray-800 text-bold">Como Vender en Resmoke</a></li>
                    <li class="mt-2"><a href="{{ route('destacadoContacto') }}" class="text-gray-600 hover:text-gray-800 text-bold">Destacados</a></li>
                </ul>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Cuenta</h3>
                <ul>
                    <li class="mt-2"><a href="{{ route('perfilContacto') }}" class="text-gray-600 hover:text-gray-800 text-bold">Perfil</a></li>
                    <li class="mt-2"><a href="{{ route('chatsContacto') }}" class="text-gray-600 hover:text-gray-800 text-bold">Chats</a></li>

                </ul>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-4">Centro de Seguridad</h3>
                <ul>
                    <li class="mt-2"><a href="{{ route('consejosSeguridad') }}" class="text-gray-600">Consejos de Seguridad</a></li>
                    <li class="mt-2"><a href="{{ route('normasResmoke') }}" class="text-gray-600 hover:text-gray-800 text-bold">Normas de Resmoke</a></li>
                    <li class="mt-2"><a href="{{ route('leyServiciosDigitales') }}" class="text-gray-600 hover:text-gray-800 text-bold">Ley de Servicios Digitales</a></li>
                    <li class="mt-2"><a href="{{ route('usoProteccionDatos') }}" class="text-gray-600 hover:text-gray-800 text-bold">Uso y Protección de Datos</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-6 flex justify-center items-center space-x-4">
            <p class="text-base">¿No encuentras lo que necesitas? Envíanos un mensaje</p>
            <a href="{{ route('formularioContacto') }}" class="inline-block px-6 py-2 border border-black rounded-lg">Enviar Mensaje</a>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white">
            <div class="bg-gray-100 text-dark p-6 rounded-lg shadow-xl">
                <h3 class="text-xl font-semibold mb-4">Dirección</h3>
                <p>La Mojonera, Almería</p>
                <p>04745</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-xl">
                <h3 class="text-xl font-semibold mb-4">Contacto</h3>
                <p>Hable con nosotros y vea cómo podemos trabajar.</p>
                <p>+34 640 25 18 86
                </p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-xl">
                <h3 class="text-xl font-semibold mb-4">Email</h3>
                <p>Generalmente respondemos dentro de las 24 horas.</p>
                <p>info.resmoke@gmail.com</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-xl">
                <h3 class="text-xl font-semibold mb-4">Horario de Trabajo</h3>
                <p>Lunes a Viernes - 10 am a 5 pm</p>
                <p>Sabado - 11am a 5 pm</p>
            </div>
        </div>
    </div>