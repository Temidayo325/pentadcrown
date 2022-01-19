<template>
    <Head title="Register" />
    <div :class="entry" v-if="navigation">
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
      <div class="sticky top-0 z-10">
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
      <div class="bg-register bg-cover bg-no-repeat w-full h-48 bg-blend-multiply bg-zinc-600 flex justify-center items-center">
         <!-- <div class="bg-zinc-900 w-full h-full opacity-40 flex justify-center items-center"> -->
            <h1 class="font-bold text-center leading-9 tracking-wider text-xl text-white italic">Become a Pentadcrowner</h1>
         <!-- </div> -->
      </div>
    <jet-authentication-card>
        <!-- <template #logo>
            <jet-authentication-card-logo />
        </template> -->

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit" class="px-3 border-2 border-slate-300 py-5 shadow-md">
           <div class="mb-3">
              <h1 class="font-bold text-center leading-9 tracking-wider text-xl">Create your account</h1>
           </div>
            <div>
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
    <div class="">
      <div class="bg-black px-2 py-2 border-t-2 border-red-600">
          <p class="text-center py-2 leading-9 tracking-wider text-md text-slate-100 mb-6">&copy;Copyright of PentadCrown 2022</p>
          <div class="px-6 bg-black">
             <img :src="googleMap" alt="" class="mt-0 mb-5 h-5/6 w-full">
          </div>
          <ul class="flex justify-between items-center ">
            <div class="my-3">
               <p class="text-white text-md leading-7 tracking-wider ">Home</p>
               <li><a href="/welcome" class="text-slate-300 text-md leading-7 tracking-wider ">Home</a></li>
               <li><a href="/about" class="text-slate-300 text-md leading-7 tracking-wider ">Who we are</a></li>
               <li><a href="/contact" class="text-slate-300 text-md leading-7 tracking-wider ">Reach out to us </a></li>
            </div>
            <div class="">
               <p  class="text-white text-md leading-7 tracking-wider ">Form</p>
               <li><a href="" class="text-slate-300 text-md leading-7 tracking-wider ">Create account</a></li>
               <li><a href="" class="text-slate-300 text-md leading-7 tracking-wider ">Login</a></li>
               <li><a href="" class="text-slate-300 text-md leading-7 tracking-wider ">Contact us</a></li>
            </div>
            <div class="">
               <p  class="text-white text-md leading-7 tracking-wider ">Others</p>
               <li><a href="/faq" class="text-slate-300 text-md leading-7 tracking-wider ">FAQ</a></li>
               <li><a href="" class="text-slate-300 text-md leading-7 tracking-wider ">Blog</a></li>
               <!-- <li><a href="" class="text-slate-100 text-md leading-7 tracking-wider ">Contact us</a></li> -->
            </div>
          </ul>
          <ul>
            <div class="">
               <p  class="text-white text-md leading-7 tracking-wider ">Reach out to us via</p>
               <li><a href="mailto:pentadcrown@gmail.com" class="text-slate-300 text-md leading-7 tracking-wider ">pentadcrown@gmail.com</a></li>
               <li><a href="mailto:aderemi@pentadcrown.com.ng" class="text-slate-300 text-md leading-7 tracking-wider ">aderemi@pentadcrown.com.ng</a></li>
               <li><a href="tel:07012345678" class="text-slate-300 text-md leading-7 tracking-wider ">07012345678</a></li>
               <li><a href="tel:07060681466" class="text-slate-300 text-md leading-7 tracking-wider ">07060681466</a></li>
               <!-- <li><a href="" class="text-slate-100 text-md leading-7 tracking-wider ">Contact us</a></li> -->
            </div>
          </ul>
          <p class="text-center mt-4"><a href="tel:07060681466" class="text-center py-2 text-md text-slate-50">&copy;Design and developed by Ope 07060681466</a></p>
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
    import { Head, Link } from '@inertiajs/inertia-vue3';

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
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                }),
                navigation: false,
                entry: "h-full w-screen bg-slate-400 fixed top-0 pl-16 animate__animated animate__slideInRight z-20",
                googleMap: "./image/googleMap.png"
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
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
