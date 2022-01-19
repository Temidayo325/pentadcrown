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
              <div class=" bg-black w-full relative text-white py-12 px-2 h-72 z-10 mb-18">

                <h1 class="font-extrabold py-3 text-4xl">We love to help your company grow</h1>
                <!-- <h3 class="py-2 leading-9 text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                <button type="button" name="button" class="color-white bg-slate-300 rounded py-2 px-3 font-bold my-5 mx-auto">Get in touch</button> -->
                <!-- <div class="custom-shape-divider-bottom-1640223467 ">
                   <div class="custom-shape-divider-bottom-1640268057">
                      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                          <path fill="currentColor" d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                      </svg>
                  </div>
               </div> -->
               <div class="flex justify-center items-center relative mt-32 mb-12">
                 <img src="{{asset('image/about.jpg')}}" alt="" class="mx-auto my-0 w-72 h-48 absolute ">
               </div>
              </div>
           <!-- </header> -->

           <main class="mt-56 bg-white px-3 py-4 relative mb-20 w-full">
                 <h2 class="text-center text-3xl leading-8 tracking-wider text-bold my-3">Our story</h2>
                 <p class="text-justify leading-6 tracking-wide text-lg text-left py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                 <!-- <div class="custom-shape-divider-bottom-1640392321 ">
                      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-white">
                          <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
                      </svg>
                  </div> -->
           </main>
           <section class="bg-black mt-4 mx-0 relative my-6 w-full">
             <div class="custom-shape-divider-top-1640393135">
                 <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-white">
                     <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
                 </svg>
             </div>
             <h2 class="text-center text-3xl leading-8 tracking-wider text-bold my-3 text-white">Our Vision</h2>
             <p class="text-justify leading-7 tracking-wide text-lg text-left py-2 text-slate-100 py-5 px-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
             <div class="custom-shape-divider-bottom-1640393630 mt-3 bg-white">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="fill-black">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
           </section>
           <section class="bg-white my-0 h-screen w-full">
             <h2 class="text-center text-3xl leading-8 tracking-wider text-bold my-3 text-black">Our Mission</h2>
             <p class="text-justify leading-7 tracking-wide text-lg text-left py-2 text-slate-800 py-5 px-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
           </section>
           <x-footer></x-footer>
      </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script>
    // let data = {navigation: false}
      let demo = new Vue({
          el: "#wrapper",
          data: {
             navigation: false,
             navigationAnimationClass: "animate__slideOutRight"
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
             }
          }
       })
    </script>
</html>
