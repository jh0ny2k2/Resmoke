<!-- BARRA DE NAVEGACION -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-2 md:ml-60">
    <h1 class="text-4xl font-bold mb-6">Opiniones por confirmar</h1>
    <h1 class=" mb-6">Hay un total de {{ $numero }} opiniones por confirmar</h1>

    <!-- BOTONES -->
    <a href="{{ route('adminOpiniones') }}">
        <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
            Volver Atrás
        </button>
    </a>

    <!-- TABLA DE OPINIONES -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre Comprador</th>
                    <th scope="col" class="px-6 py-3">Nombre Vendedor</th>
                    <th scope="col" class="px-6 py-3">Opinión</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opiniones as $opinion)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $opinion->usuarios->name }}</td>
                    <td class="px-6 py-4">{{ $opinion->vendedores->name}}</td>
                    <td class="px-6 py-4">{{ $opinion->opinion}}</td>
                    <td class="px-6 py-4">{{ $opinion->estado}}</td>
                    <td class="px-6 py-4">
                        <a href="/admin/confirmarOpinion/ {{ $opinion->id}}">
                            <button class="text-green-500 hover:text-green-700">
                                <span class="material-icons">check</span>
                            </button>
                        </a>
                        <a href="/admin/denegarOpinion/ {{ $opinion->id}}">
                            <button class="text-red-500 hover:text-red-700">
                                <span class="material-icons">close</span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>