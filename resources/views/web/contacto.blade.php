<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - Contacto</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo resmoke.png' )}}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
</head>
<body>
    <section class="bg-gray-50 dark:bg-slate-800" id="contact">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="mb-4">
                <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                    <p class="text-base font-semibold uppercase tracking-wide text-blue-600 dark:text-blue-200">
                        Contacto
                    </p>
                    <h2
                        class="font-heading mb-4 font-bold tracking-tight text-gray-900 dark:text-white text-3xl sm:text-5xl">
                        Ponerse en contacto
                    </h2>
                    <p class="mx-auto mt-4 max-w-3xl text-xl text-gray-600 dark:text-slate-400">Cuentanos que te pasa</p>
                </div>
            </div>
            <div class="flex items-stretch justify-center">
                <div class="grid md:grid-cols-2">
                    <div class="h-full pr-6">
                        <p class="mt-3 mb-12 text-lg text-gray-600 dark:text-slate-400">
                            Estamos aquí para ayudarte. Si tienes alguna pregunta, comentario o necesitas asistencia, por favor no dudes en ponerte en contacto con nosotros. Nuestro equipo está disponible para responder todas tus consultas y asegurarnos de que recibas la mejor atención posible.
                        </p>
                        <ul class="mb-6 md:mb-0">
                            <li class="flex">
                                <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                        </path>
                                        <path d="M15 7a2 2 0 0 1 2 2"></path>
                                        <path d="M15 3a6 6 0 0 1 6 6"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white">Contacto
                                    </h3>
                                    <p class="text-gray-600 dark:text-slate-400">Número Movil: +34 640 25 18 86</p>
                                    <p class="text-gray-600 dark:text-slate-400">Email: info@resmoke.com</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white">Horas de Trabajo</h3>
                                    <p class="text-gray-600 dark:text-slate-400">Lunes - Viernes: 09:00 - 17:00</p>
                                    <p class="text-gray-600 dark:text-slate-400">Sabado: 09:00 - 12:00</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card h-fit max-w-6xl p-5 md:p-12" id="form">
                        <h2 class="mb-4 text-2xl font-bold dark:text-white">¿Listo para empezar?</h2>
                        <form action="{{ route('guardarContacto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="nombre" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <input type="text" id="nombre" required placeholder="Nombre" class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0" name="nombre">
                                    </div>
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="email" class="pb-1 text-xs uppercase tracking-wider"></label>
                                        <input type="email" id="email" placeholder="Email" class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0" name="email">
                                    </div>
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="comentario" class="pb-1 text-xs uppercase tracking-wider"></label>
                                    <textarea id="comentario" name="comentario" cols="30" rows="5" placeholder="Escribe tu mensaje..." class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="w-full bg-blue-800 text-white px-6 py-3 font-xl rounded-md sm:mb-0">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>