<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resmoke</title>
  <link rel="shortcut icon" href="{{ asset('storage/logo resmoke.png' )}}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
</head>
<body class="bg-white font-sans leading-normal tracking-normal">
  <div class="min-h-screen flex flex-wrap">

    <div class="w-full md:w-1/2 bg-gray-400 flex items-center justify-center"
    style="background-image: url('{{ asset('storage/LoginRegister.png') }}'); background-size: cover; background-position: center;">
      <img src="" alt="">
    </div>

    <div class="w-full md:w-1/2 flex items-center justify-center p-8">
      <div class="max-w-md w-full">
        {{ $slot }}
      </div>
    </div>
  </div>
</body>

</html>
