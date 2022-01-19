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


           <!-- <header> -->
              <div class=" bg-black w-full relative text-white py-12 px-2 h-72 z-10 mb-12">

                <h1 class="font-extrabold py-3 text-4xl">Frequently asked questions</h1>
                <h3 class="py-2 leading-9 text-lg">Below is a curation of a few questions people ask of us</h3>
                 <!--<button type="button" name="button" class="color-white bg-slate-300 rounded py-2 px-3 font-bold my-5 mx-auto">Get in touch</button> -->
                <div class="custom-shape-divider-bottom-1640223467 ">
                   <div class="custom-shape-divider-bottom-1640268057">
                      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                          <path fill="currentColor" d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                      </svg>
                  </div>
               </div>
               <!-- <div class="flex justify-center items-center relative mt-32 mb-12">
                 <img src="{{asset('image/call.jpg')}}" alt="" class="mx-auto my-0 w-72 h-48 absolute ">
               </div> -->
              </div>
           <!-- </header> -->

           <section class="bg-white mt-4 mx-0 relative my-6 w-full">
             <div class="border-2 border-slate-400 w-5/6 mx-auto">
                <h2 class="text-center text-xl leading-8 tracking-wider font-black my-3 text-black">FAQ</h2>
                  <ul>
                     <li v-for="faq in faqs" :key="faq.id" class="bg-slate-100 pb-3">
                        <div class="flex justify-start shadow-xl bg-slate-200 items-center" @click="showItem(faq)">
                           <p v-text="faq.question" class="py-4 font-bold tracking-wide px-3 text-left "></p>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-grey-800" viewBox="0 0 20 20" >
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                           </svg>
                        </div>
                        <p v-text="faq.answer" class="px-3 py-2 text-md leading-8 animate__slideInDown animate__animated" v-if="faq.state"></p>
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
