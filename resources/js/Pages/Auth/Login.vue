<template>
    <Head title="Log in" />

    <div :class="entry" class="md:hidden" v-if="navigation">
        <div class="h-full w-96 backdrop-blur-sm bg-slate/30 bg-slate-200 drop-shadow-xl">
          <div class="flex end py-4 px-3" v-on:click="closeNanigation()">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 drop-shadow-lg" viewBox="0 0 20 20" fill="currentColor">
               <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
             </svg>
          </div>
           <nav>
              <ul class="px-3 py-5">
                 <h2 class="flex justify-start items-center mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 drop-shadow-xl" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="text-md px-3 py-2">Home</span>
                 </h2>
                <div class="border-l-2 border-slate-400 pl-6 ml-4 mt-2">
                   <li>
                      <a href="/welcome" class="leading-8 text-black py-1 px-2 text-md">Home</a>
                   </li>
                   <li>
                      <a href="/contact" class="leading-8 text-black py-1 px-2 text-md">Reach out to us</a>
                   </li>
                   <li>
                      <a href="/about" class="leading-8 text-black py-1 px-2 text-md">Who we are</a>
                   </li>
                   <!-- <li>
                      <a href="" class="leading-8 text-black py-1 px-2 text-md">Frequently Asked Questions</a>
                   </li> -->
                </div>
                   <h2 class="flex justify-start items-center mt-5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                      </svg>
                      <span class="text-md px-3 py-2">Forms</span>
                   </h2>
                  <div class="border-l-2 border-slate-400 pl-6 ml-4 mt-2">
                     <li>
                        <a href="" class="leading-8 text-black py-1 px-2 text-md">Create account</a>
                     </li>
                     <li>
                        <a href="" class="leading-8 text-black py-1 px-2 text-md">Sign in</a>
                     </li>
                     <li>
                        <a href="/contact" class="leading-8 text-black py-1 px-2 text-md">Contact us</a>
                     </li>
                     <!-- <li>
                        <a href="/faq" class="leading-8 text-black py-1 px-2 text-md">Frequently Asked Questions</a>
                     </li> -->
                  </div>
                  <h2 class="flex justify-start items-center mt-5">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                     <span class="text-md px-3 py-2">Others</span>
                  </h2>
                 <div class="border-l-2 border-slate-400 pl-6 ml-4 mt-2">
                    <li>
                       <a href="" class="leading-8 text-black py-1 px-2 text-md">Blog</a>
                    </li>
                    <li>
                       <a href="/faq" class="leading-8 text-black py-1 px-2 text-md">Frequently Asked Questions</a>
                    </li>
                 </div>
              </ul>
           </nav>
        </div>
    </div>
      <div class="sticky top-0 z-10 md:hidden">
          <div class="flex justify-between py-3 bg-slate-50 align-items-center px-4">
             <div class="">
                  <h1 class="font-black tracking-normal">PENTADCROWN</h1>
             </div>
             <div class="" v-on:click="showNavigation()">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
               </svg>
             </div>
          </div>
      </div>

    <jet-authentication-card class="bg-login bg-cover bg-no-repeat w-full h-screen bg-blend-multiply bg-zinc-600">
        <!-- <template #logo>
            <jet-authentication-card-logo />
        </template> -->

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="px-3 border-2 border-slate-300 py-5 shadow-md border-0 bg-slate-100">
           <div class="mb-3">
              <h1 class="font-bold text-center leading-9 tracking-wider text-xl text-purple-800">Login to your account</h1>
           </div>
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <jet-button class="ml-4 bg-purple-800" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
    <div class="bg-black px-2 py-8">
     <div class="md:w-8/12 md:mx-auto w-screen">
        <ul class="flex justify-around md:justify-between items-start md:">
           <div class="my-3">
             <p class="text-white text-md leading-7 tracking-wider ">Home</p>
             <li><a href="/welcome" class="text-slate-300 text-md leading-7 tracking-wider ">Home</a></li>
             <li><a href="/about" class="text-slate-300 text-md leading-7 tracking-wider ">Who we are</a></li>
             <li><a href="/contact" class="text-slate-300 text-md leading-7 tracking-wider ">Reach out to us </a></li>
           </div>
           <div class="my-3">
             <p  class="text-white text-md leading-7 tracking-wider ">Form</p>
             <li><a href="/register" class="text-slate-300 text-md leading-7 tracking-wider ">Create account</a></li>
             <li><a href="/login" class="text-slate-300 text-md leading-7 tracking-wider ">Login</a></li>
             <li><a href="/contact" class="text-slate-300 text-md leading-7 tracking-wider ">Contact us</a></li>
           </div>
           <div class="my-3">
             <p  class="text-white text-md leading-7 tracking-wider ">Others</p>
             <li><a href="/faq" class="text-slate-300 text-md leading-7 tracking-wider ">FAQ</a></li>
             <li><a href="" class="text-slate-300 text-md leading-7 tracking-wider ">Blog</a></li>
             <!-- <li><a href="" class="text-slate-100 text-md leading-7 tracking-wider ">Contact us</a></li> -->
           </div>
           <div class="">
              <p  class="text-white text-md leading-7 tracking-wider ">Reach out to us via</p>
              <li><a href="mailto:pentadcrown@gmail.com" class="text-slate-300 text-md leading-7 tracking-wider ">pentadcrown@gmail.com</a></li>
              <li><a href="mailto:aderemi@pentadcrown.com.ng" class="text-slate-300 text-md leading-7 tracking-wider ">aderemi@pentadcrown.com.ng</a></li>
              <li><a href="tel:07012345678" class="text-slate-300 text-md leading-7 tracking-wider ">07012345678</a></li>
              <li><a href="tel:07060681466" class="text-slate-300 text-md leading-7 tracking-wider ">07060681466</a></li>
              <!-- <li><a href="" class="text-slate-100 text-md leading-7 tracking-wider ">Contact us</a></li> -->
             </div>
        </ul>
        <div class="md:flex md:justify-start md:mt-10">
           <div class="md:flex md:justify-start">
             <!-- <img src="./asset/image/logo.jog" alt="Pentadcrown Logo" class="md:w-12 md:h-12 md:mr-2"> -->
             <h1 class="text-lg text-white tracking-wide leading-9 font-bold">PENTADCROWN</h1>
           </div>
           <div class="ml-8">
             <p class="text-white text-sm"><span class="pr-2 border-r-2 border-white">Terms of use</span><span class="px-2 border-r-2 border-white">Privacy policy</span><span class="px-2 border-r-2 border-white">Trademarks</span><span class="px-2">Licence Agreement</span> </p>
             <p class="text-center py-2 leading-9 tracking-wider text-md text-slate-400 mb-6">Copyright &copy; 2022, PentadCrown Inc and/or it's subsidiaries. All rights reserved</p>
           </div>
        </div>
        <p class="text-center mt-4"><a href="tel:07060681466" class="text-center py-2 text-md text-slate-50">&copy;Designed and developed by Ope 09073245874</a></p>
     </div>
   </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import Footer from '@/Pages/Component/Footer.vue'
    import Header from '@/Component/Header'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import 'animate.css'
    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
            Footer,
            Header
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                }),
                navigation: false,
                entry: "h-full w-screen bg-slate-400 fixed top-0 pl-16 animate__animated animate__slideInRight z-20",
                googleMap: "./image/googleMap.png"
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            },
            showNavigation()
            {
               this.navigation = !this.navigation
            },
            closeNanigation()
            {
               this.entry = "h-full w-screen bg-slate-400 fixed top-0 pl-16 animate__animated animate__slideOutRight z-20";

               setTimeout(()=>{
                  this.navigation = !this.navigation
                  this.entry = "h-full w-screen bg-slate-400 fixed top-0 pl-16 animate__animated animate__slideInRight z-20";
               }, 500)
            }
        }
    })
</script>
