<x-navbarcontacto></x-navbarcontacto>

    <!-- FAQ Section -->
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <div class="lg:container lg:mx-auto lg:py-16 md:py-12 md:px-6 py-12 px-4">
          <h1 class="text-center dark:text-white lg:text-4xl text-3xl lg:leading-9 leading-7 text-gray-800 font-semibold">Guardar Favoritos</h1>
          <div class="lg:w-8/12 w-full mx-auto">
            <p class="text-base leading-6 text-gray-600 dark:text-gray-300 font-normal mt-6"><p class="text-base leading-6 text-gray-600 dark:text-gray-300 font-normal mt-6">Cuando hayas encontrado un anuncio que se corresponda con lo que buscas, puedes guardarlo como favorito para tenerlo localizado. <br><br>

            Para marcar un producto como favorito simplemente pulsa el icono del corazón que encontrarás justo debajo de las fotos. </p></p>
          </div>
      </div>

      
    </div>


    <script>
      let elements = document.querySelectorAll("[data-menu]");
      for (let i = 0; i < elements.length; i++) {
        let main = elements[i];
      
        main.addEventListener("click", function () {
            let element = main.parentElement.parentElement;
            let indicators = main.querySelectorAll("img");
            let child = element.querySelector("#menu");
            let h = element.querySelector("#mainHeading>div>p");
      
            h.classList.toggle("font-semibold");
            child.classList.toggle("hidden");
            // console.log(indicators[0]);
            indicators[0].classList.toggle("rotate-180");
        });
      }
                </script>