<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Who we are at PentadCrown || About PentadCrown</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
      <div class="relative" id="wrapper">
         <div class="fixed z-30" v-if="navigation">
             <x-navigation></x-navigation>
        </div>
        <div class="sticky top-0 z-20">
           <x-header></x-header>
        </div>



              <div class=" bg-purple-800 w-full relative text-white py-12 px-2 h-72 z-10 mb-12 md:h-96 md:grid md:items-center" style="clip-path: ellipse(120% 100% at 50% 0%);">

               <div class="">
                  <h1 class="font-extrabold py-3 text-4xl md:text-center">Frequently asked questions</h1>
                  <h3 class="py-2 leading-9 text-lg md:text-center">Below is a curation of a few questions people ask of us</h3>
               </div>

              </div>


           <section class="bg-white mt-4 mx-0 relative my-6 w-full md:w-6/12 md:mx-auto md:-mt-24 md:z-20 md:bg-transparent">
             <div class="border-2 border-slate-400 w-5/6 mx-auto md:border-0">
                <h2 class="text-center text-xl leading-8 tracking-wider font-black my-3 text-black md:hidden">FAQ</h2>
                  <ul class="">
                     <li v-for="faq in faqs" :key="faq.id" class="bg-slate-100 pb-3 md:my-12 shadow-md">
                        <div class="flex justify-start items-center" @click="showItem(faq)">
                           <p v-text="faq.question" class="py-4 font-bold tracking-wide px-3 text-left "></p>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-grey-800" viewBox="0 0 20 20" >
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                           </svg>
                        </div>
                        <p v-text="faq.answer" class="px-3 py-2 text-md leading-8 " v-if="faq.state"></p>
                     </li>
                  </ul>
             </div>

           </section>

           <x-footer></x-footer>
      </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js" ></script>
    <script>
    // let data = {navigation: false}
      let demo = new Vue({
          el: "#wrapper",
          data: {
             navigation: false,
             navigationAnimationClass: "animate__slideOutRight",
             faqs: [
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 0},
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 1},
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 2},
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 3}
             ]
          },
          methods: {
             showNavigation()
             {
                // alert("show navigation")
                this.navigation = !this.navigation
                this.navigationAnimationClass = "animate__slideInRight"
             },
             closeNavigation()
             {
                // alert("Close Navigation")
                this.navigation = !this.navigation
                this.navigationAnimationClass = "animate__slideOutRight"
             },
             showItem(faq)
             {
                faq.state = !faq.state
             }
          }
       })
    </script>
</html>
