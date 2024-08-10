<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto px-5 py-10">
        <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Contáctanos</h1>
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <form action="{{ route('form') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-6">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo *</label>
                    <input type="text" id="nombre" name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6">
                    <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6">
                    <label for="motivo" class="block text-gray-700 text-sm font-bold mb-2">Motivo del Contacto *</label>
                    <select id="motivo" name="motivo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="consulta">Consulta General</option>
                        <option value="problema">Reportar un Problema</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="comentario" class="block text-gray-700 text-sm font-bold mb-2">Mensaje *</label>
                    <textarea id="comentario" name="comentario" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="comoConociste" class="block text-gray-700 text-sm font-bold mb-2">¿Cómo nos conociste?</label>
                    <select id="comoConociste" name="comoConociste" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option selected value="ninguno">Elige una opción</option>
                        <option value="internet">Internet</option>
                        <option value="amigo">Recomendación de un amigo</option>
                        <option value="redesSociales">Redes Sociales</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
