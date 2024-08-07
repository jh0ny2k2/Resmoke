<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <h2 class="text-3xl font-bold mb-6">Chats</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-14">
            <div>
                <a href="{{ route('comoFunciona') }}"><h3 class="text-lg mb-4 text-gray-600 hover:text-gray-800 hover:font-bold">¿Cómo funciona el chat?</h3></a>
            </div>
            <div>
                <a href="{{ route('chatsBorrados') }}"><h3 class="text-lg text-gray-600 hover:text-gray-800 hover:font-bold mb-4">Chats Borrados</h3></a>
            </div>
        </div>
    </div>