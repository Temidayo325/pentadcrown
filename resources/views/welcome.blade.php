<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to lalaland</title>

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
              <div class=" bg-black w-full relative text-white py-12 px-2 h-4/5 z-10">
                <img src="{{asset('image/woman.png')}}" alt="" class="mt-0 my-0">
                <h1 class="font-extrabold py-3 text-4xl">The HR of the Century</h1>
                <h3 class="py-2 leading-9 text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                <button type="button" name="button" class="color-white bg-slate-300 rounded py-2 px-3 font-bold my-5 mx-auto">Get in touch</button>
                <div class="custom-shape-divider-bottom-1640223467 ">
                   <div class="custom-shape-divider-bottom-1640268057">
                      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                          <path fill="currentColor" d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                      </svg>
                  </div>
               </div>
              </div>
           <!-- </header> -->
           <main class="relative mt-3">
             <div class="">
                <h2 class="font-extrabold tracking-wider py-3 px-2 text-xl leading-8 text-center">Ready to roll staff</h2>
                <div class="">
                   <img src="{{asset('image/team.jpg')}}" alt="" class="mt-0 mb-5">
                   <p class="text-left px-2 leading-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
                <div class="flex justify-center">
                   <button type="button" name="button" class="color-white bg-slate-300 rounded py-2 px-3 font-bold my-3">Help me set up</button>
                </div>
             </div>
           </main>
           <section class="bg-purple-50">
              <div class="">
                <h2 class="font-extrabold tracking-wider py-3 px-2 text-xl leading-8 text-center">Intricate Staffing structure</h2>
                <div class="">
                   <img src="{{asset('image/hire.jpg')}}" alt="" class="mt-0 mb-5">
                   <p class="text-left px-2 leading-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
                <div class="flex justify-center">
                   <button type="button" name="button" class="color-white bg-slate-300 rounded py-2 px-3 font-bold my-3 ">Help me set up</button>
                </div>
                <div class="custom-shape-divider-bottom-1640270602 text-slate-50" >
                   <svg data-name="Layer 1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                       <path d="M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z" class="shape-fill"></path>
                   </svg>
               </div>
             </div>
           </section>
           <!-- add testimonial here -->
           <section class="bg-slate-50 py-8">
              <div class="">
                <h2 class="font-extrabold tracking-wider py-3 px-2 text-xl leading-8 text-center">Tested and trusted staff</h2>
                <div class="">
                   <img src="{{asset('image/interview.jpg')}}" alt="" class="mt-0 mb-5">
                   <p class="text-left px-2 leading-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
                <div class="flex justify-center">
                   <button type="button" name="button" class="color-white bg-slate-300 rounded py-2 px-3 font-bold my-3 ">Get staff for me</button>
                </div>
                <div class="custom-shape-divider-bottom-1640270602 text-slate-50">
                   <svg data-name="Layer 1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                       <path d="M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z" class="shape-fill"></path>
                   </svg>
               </div>
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
