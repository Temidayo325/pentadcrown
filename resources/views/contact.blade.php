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

                <h1 class="font-extrabold py-3 text-4xl">Contact us</h1>
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
                 <img src="{{asset('image/call.jpg')}}" alt="" class="mx-auto my-0 w-72 h-48 absolute ">
               </div>
              </div>
           <!-- </header> -->

           <main class="mt-48 bg-black px-4 py-14 relative mb-20 w-full">
                 <h2 class="text-center text-xl leading-8 tracking-wider font-black my-3 text-white">Contact address</h2>
                 <ul>
                    <div class="">
                       <!-- <p  class="text-white text-md leading-7 tracking-wider ">Reach out to us via</p> -->
                       <li>
                          <a href="mailto:pentadcrown@gmail.com" class=" flex justify-start items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-400" viewBox="0 0 20 20" >
                                <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                              </svg>
                              <span class="text-slate-200 text-lg px-4 leading-10 tracking-wider">pentadcrown@gmail.com</span>
                           </a>
                        </li>
                        <li>
                          <a href="mailto:pentadcrown@gmail.com" class=" flex justify-start items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-400" viewBox="0 0 20 20" >
                                <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                              </svg>
                              <span class="text-slate-200 text-lg px-4 leading-10 tracking-wider">pentadcrown@gmail.com</span>
                           </a>
                        </li>
                        <li>
                        <a href="tel:07060681466" class=" flex justify-start items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                   <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                              </svg>
                             <span class="text-slate-200 text-lg px-4 leading-10 tracking-wider">07060681466</span>
                          </a>
                       </li>
                       <li>
                          <a href="tel:07060681466" class=" flex justify-start items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                     <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                               <span class="text-slate-200 text-lg px-4 leading-10 tracking-wider">07060681466</span>
                           </a>
                      </li>
                      <li>
                        <p class=" flex justify-start items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 fill-slate-400" viewBox="0 0 20 20">
                                 <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                              </svg>
                              <span class="text-slate-200 text-lg px-4 leading-10 tracking-wider">No 10 Dr Gege's residence Danialu, Ilorin, Kwara state. Nigeria</span>
                          </p>
                    </li>
                       <!-- <li><a href="" class="text-slate-100 text-md leading-7 tracking-wider ">Contact us</a></li> -->
                    </div>
                 </ul>
           </main>
           <section class="bg-white mt-4 mx-0 relative my-6 w-full">
             <div class="border-2 border-slate-400 w-5/6 mx-auto px-2">
                <h2 class="text-center text-xl leading-8 tracking-wider font-black my-3 text-black">Get in Touch</h2>
                <form method="post">
                   <div class="">
                      <label for="names" class="block">Name</label>
                      <input type="text" name="names" value="" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 rounded">
                      <label for="email" class="block">Email</label>
                      <input type="email" name="email" value="" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 rounded">
                      <label for="title" class="block">Header of the message</label>
                      <input type="text" name="title" value="" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 rounded">
                      <label for="body" class="block">Body of the message</label>
                      <textarea name="body" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 h-48 rounded"></textarea>
                   </div>
                   <div class="flex justify-center">
                      <button type="submit" name="button" class="bg-black text-white text-center py-4 px-6 rounded-lg my-3 shadow-2xl">Send</button>
                   </div>
                </form>
             </div>

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
