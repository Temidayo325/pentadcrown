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
      <script src="{{ mix('js/app.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js" ></script>
    </head>
    <body class="font-sans antialiased">
      <div class="relative" id="wrapper">
         <div class="fixed z-30 md:hidden" v-if="navigation">
             <x-navigation></x-navigation>
        </div>
        <div class="sticky top-0 z-20 md:hidden">
           <x-header></x-header>
        </div>


           <!-- <header> -->
           <div class="md:block md:bg-slate-200 md:mb-8 pb-12" style="clip-path: ellipse(117% 100% at 52.01% 0%);">
                <div class=" bg-slate-200 w-full relative text-white py-12 px-2 h-96 z-10 mb-12 md:bg-transparent md:h-24" style="clip-path: ellipse(117% 100% at 52.01% 0%);">

                  <h1 class="font-extrabold py-3 text-3xl text-center md:text-3xl text-purple-800">Contact us</h1>
                  <h3 class="py-3 text-xl text-center md:text-xl  text-purple-800">Any questions or complaints, Don't hesitate to ask</h3>
                </div>
                <div class="flex justify-center items-center relative -mt-20 z-20 mb-12 md:hidden">
                   <img src="{{asset('image/call.jpg')}}" alt="" class="mx-auto my-0 w-11/12 h-58 absolute ">
                </div>
                <div class="md:w-10/12 md:flex md:justify-center md:items-center md:mx-auto">
                   <main class="mt-48 bg-purple-800 px-4 py-14 relative mb-20 w-full md:w-3/12 md:mt-20 md:py-13">
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

                  <section class="bg-white mt-4 mx-0 relative my-6 md:my-0 w-full md:w-8/12">
                    <div class="border-2 border-slate-400 w-5/6 mx-auto px-2 md:border-0">
                       <h2 class="text-center text-xl leading-8 tracking-wider font-black my-3 text-purple-800 md:hidden">Get in Touch</h2>
                       <form method="post" @submit.prevent='sendMail' class="md:my-7">
                          <div class="md:inline-grid md:grid-cols-2 md:gap-10">
                             <div class="md:border-b-2 md:border-black">
                                <label for="names" class="block ">Name</label>
                                <p class="text-red-600 text-sm tracking-wide text-left my-1 animate__animated animate__slideInUp" v-text="error.name"></p>
                                <input type="text" name="names" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 rounded md:w-64 md:mb-1 md:bg-transparent md:text-extrabold md:pl-0 md:border-2 md:border-b-2" required v-model="form.name" >
                             </div>

                             <div class="md:border-b-2 md:border-black">
                                <label for="email" class="block">Email</label>
                                <p class="text-red-600 text-sm tracking-wide text-left my-1" v-text="error.email"></p>
                                <input type="text" name="names" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 rounded md:w-64 md:mb-1 md:bg-transparent md:text-extrabold md:pl-0 md:focus:border-0 md:focus:outline-none" required v-model="form.email" >
                             </div>

                             <div class="md:border-b-2 md:border-black">
                                <label for="title" class="block">Header of the message</label>
                                <p class="text-red-600 text-sm tracking-wide text-left my-1" v-text="error.header"></p>
                                <input type="text" name="names" class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 rounded md:w-64 md:mb-1 md:bg-transparent md:text-extrabold md:pl-0 md:focus:border-0 md:focus:outline-none" required v-model="form.header" >
                             </div>

                             <div class="md:border-b-2 md:border-black">
                                <label for="body" required class="block">Body of the message</label>
                                <p class="text-red-600 text-sm tracking-wide text-left my-1" v-text="error.body"></p>
                                <textarea name="body" v-model="form.body" required class="py-2 px-2 text-black bg-slate-100 border-none mb-4 w-11/12 h-48 rounded md:mb-1 md:bg-transparent"></textarea>
                             </div>

                          </div>
                          <div class="flex justify-center">
                             <button type="submit" name="button" class="bg-purple-800 text-white text-center py-4 px-6 rounded-lg my-3 shadow-2xl md:my-4">Send</button>
                          </div>
                       </form>
                    </div>

                  </section>
                </div>

           </div>

           <x-footer></x-footer>
      </div>
    </body>
    <script defer>
    import Toastify from 'toastify-js'
    import "toastify-js/src/toastify.css"

      let demo = new Vue({
          el: "#wrapper",
          data: {
             navigation: false,
             navigationAnimationClass: "animate__slideOutRight",
             form: {
                name: '',
                email: '',
                header: '',
                body: ''
             },
             error: {
                name: '',
                email: '',
                header: '',
                body: ''
             },
             errorExists: false
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
             // resetError()
             // {
             //
             // },
             validateForm()
             {
                  // let form = new FormData();
                  // console.log(typeof this.test)
                  for (const [key, value]  of Object.entries(this.form)) {
                     // console.log(value)
                     if (value !== undefined && value.length > 4 && value !== null) {
                        // Object.defineProperty(form, key, {
                        //   value: value,
                        //   writable: false
                        // });
                        this.error[key] = ''
                        this.errorExists = true
                     }else{
                        // alert(key + " is not properly formatted");
                        this.error[key] = key + " is not properly formatted"
                        this.errorExists = false
                     }
                  }
               },
             sendMail()
             {
                let checked = this.validateForm()
                if ( this.errorExists ) {
                   axios.post('/contact', this.form)
                   .then(
                      (response) => {
                        Toastify({
                          text: response.data.message,
                          duration: 5000,
                          newWindow: true,
                          close: true,
                          gravity: "top", // `top` or `bottom`
                          position: "right", // `left`, `center` or `right`
                          stopOnFocus: true, // Prevents dismissing of toast on hover
                          style: {
                            background: "purple",
                         },
                          onClick: function(){} // Callback after click
                        }).showToast();
                     }
                  ).catch(error)
                  {
                     console.log(error)
                  }
                }else{
                   console.log("error")
                }
             }
          }
       })
    </script>
</html>
