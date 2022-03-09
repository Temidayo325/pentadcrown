<template>
   <Head title="Dashboard"/>
   <div class="">

   </div>
      <div class="sticky top-0 z-10">
          <div class="flex justify-center py-3 bg-slate-50 align-items-center px-4 text md:items-center">
             <div class="">
                  <h1 class="font-black tracking-normal text-xl">PENTADCROWN</h1>
             </div>
             <div class="flex justify-start ">
                <a href="/welcome" class="leading-8 text-black py-1 px-2 md:px-4 text-md md:text-lg">Home</a>
                <a href="/contact" class="leading-8 text-black py-1 px-2 md:px-4 text-md md:text-lg">Reach out to us</a>
                <a href="/about" class="leading-8 text-black py-1 px-2 md:px-4 text-md md:text-lg">Who we are</a>
                <a href="/faq" class="leading-8 text-black py-1 px-2 md:px-4 text-md md:text-lg">Frequently Asked Questions</a>
             </div>
             <!-- <div class="" v-on:click="showNavigation()">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
               </svg>
             </div> -->
          </div>
      </div>
   <!-- </div> -->
   <div class="min-h-screen w-full flex justify-start">
      <div class="w-3/12 bg-purple-800 py-5 px-3 ">
         <ul>
            <li class="text-white py-3 px-2 text-lg leading-9 tracking-wider cursor-pointer" @click="changeComponent('default')">Home</li>
            <li class="text-white py-3 px-2 text-lg leading-9 tracking-wider cursor-pointer" @click="changeComponent('category')">Add Categories</li>
            <li class="text-white py-3 px-2 text-lg leading-9 tracking-wider cursor-pointer" @click="changeComponent('establishment')">Establishment</li>
            <li class="text-white py-3 px-2 text-lg leading-9 tracking-wider cursor-pointer" @click="changeComponent('notification')">Add Notification</li>
            <li class="text-white py-3 px-2 text-lg leading-9 tracking-wider cursor-pointer" @click="changeComponent('shortlisted')">Short listed Candidates</li>
            <li class="text-white py-3 px-2 text-lg leading-9 tracking-wider cursor-pointer" @click="changeComponent('test')">Test</li>
         </ul>
      </div>
      <div class="w-full bg-white">
         <!-- <transition name="fade" mode="out-in" appear> -->
         <keep-alive>
           <component :is="currentViewComputed" class="my-4"></component>
        </keep-alive>
        <!-- </transition> -->
      </div>
      <!-- <default></default> -->
   </div>
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
   import { defineComponent } from 'vue';
   import { Head } from '@inertiajs/inertia-vue3'
   import Default from './Component/Default'
   import Category from './Component/Category'
   import Establishment from './Component/Establishment'
   import Notification from './Component/Notification'
   import Shortlisted from './Component/Shortlisted'
   import Test from './Component/Test'

   export default defineComponent({
      components: {
         Head,
         Default,
         Category,
         Establishment,
         Notification,
         Shortlisted,
         Test
      },

      props: {
           canResetPassword: Boolean,
           status: String
      },

      data() {
           return {
               currentView: "default",
               navigation: false,
               entry: "h-full w-screen bg-slate-400 fixed top-0 pl-16 animate__animated animate__slideInRight z-20",
               googleMap: "./image/googleMap.png",
               job: null
           }
      },
      computed: {
            currentViewComputed()
            {
               return this.currentView
            }
      },
      methods: {

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
           },
           changeComponent(info)
           {
             this.currentView = info
          }
      }
   })
</script>
