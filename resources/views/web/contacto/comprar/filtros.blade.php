<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <div class="lg:container lg:mx-auto lg:py-16 md:py-12 md:px-6 py-12 px-4">
          <h1 class="text-center dark:text-white lg:text-4xl text-3xl lg:leading-9 leading-7 text-gray-800 font-semibold">Usar Filtros de Búsqueda</h1>
          <div class="lg:w-8/12 w-full mx-auto">
            <p class="text-base leading-6 text-gray-600 dark:text-gray-300 font-normal mt-6">Si lo que buscas es muy concreto, puedes utilizar los filtros de búsqueda para encontrarlo. <br><br>

                Una vez has realizado tu búsqueda, puedes seleccionar la opción Filtros en la parte superior de la pantalla y verás los filtros que puedes aplicar: <br><br>
                
                &emsp;&emsp; <span class="font-bold ">Categoría:</span> Selecciona la categoría del producto.</p>
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