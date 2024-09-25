<!-- <footer class="text-gray-600 body-font bg-gray-100 min-w-full">
    <div class="px-5 py-8 mx-auto flex justify-center items-center flex-col">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4">
            <img src="{{ asset('storage/logo resmoke.png') }}" alt="Logo" class="h-10 w-10">
            <span class="ml-3 text-xl">Resmoke</span>
        </a>
        <a href="/web/contacto" class="text-sm text-gray-900 m-5">Contacto</a>
        <a href="{{ route('contacto') }}" class="text-sm text-gray-900 m-5">Contacto</a>
        <p class="text-sm text-gray-500">© 2024 Todos los derechos reservados - Resmoke</p>
    </div>
</footer> -->

<footer class="bg-gray-100 py-8 mt-12">
        <div class="container mx-auto px-6 md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="#" class="text-2xl font-bold text-gray-800"><img class="w-36 " src="{{ asset('storage/logo resmoke.png') }}" alt=""></a>
                <p class="text-sm text-gray-600 mt-2">© 2024 Resmoke. Todos los derechos reservados.</p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 md:gap-20">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Resmoke</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-600 hover:underline">Quiénes somos</a></li>
                        <!-- <li><a href="#" class="text-gray-600 hover:underline">Cómo funciona</a></li> -->
                        <li><a href="#" class="text-gray-600 hover:underline">Sostenibilidad</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Soporte</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="{{ route('contacto') }}" class="text-gray-600 hover:underline">Centro de ayuda</a></li>
                        <li><a href="{{ route('normasResmoke') }}" class="text-gray-600 hover:underline">Normas de la comunidad</a></li> 
                        <li><a href="{{ route('consejosSeguridad') }}" class="text-gray-600 hover:underline">Consejos de seguridad</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Legal</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="" class="text-gray-600 hover:underline">Aviso legal</a></li>
                        <li><a href="#" class="text-gray-600 hover:underline">Condiciones de uso</a></li>
                        <li><a href="#" class="text-gray-600 hover:underline">Política de privacidad</a></li>
                        <li><a href="#" class="text-gray-600 hover:underline">Política de Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Categorias</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="/web/verCategoria/1" class="text-gray-600 hover:underline">Cachimbas</a></li>
                        <li><a href="/web/verCategoria/2" class="text-gray-600 hover:underline">Cazoletas</a></li>
                        <li><a href="/web/verCategoria/3" class="text-gray-600 hover:underline">Mangueras</a></li>
                        <li><a href="/web/verCategoria/4" class="text-gray-600 hover:underline">Bases</a></li>
                        <li><a href="/web/verCategoria/5" class="text-gray-600 hover:underline">Accesorios</a></li>
                        <li><a href="/web/verCategoria/6" class="text-gray-600 hover:underline">Vapers</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>