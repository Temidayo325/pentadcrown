<template id="">
   <Head title="Welcome to your dashboard" />
   <h1 class="md:text-3xl font-bold md:leading-9 md:mb-4 md:mt-4 pt-6 md:pt-0  px-4 md:px-0 text-2xl">Welcome back {{name}} !</h1>
   <h2 class="leading-9 text-bold mt-6 md:text-xl text-lg text-bold font-bold px-4 md:px-0">How the Pentad system works </h2>
   <div class="md:my-4 flex justify-start overflow-scroll my-3 gap-4 md:gap-8 px-4 md:px-0">
      <div class="w-44 h-36 bg-white rounded px-3 py-3 md:flex md:items-center">
         <div class="">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2">1</p>
            <p class="">Take Pentad test</p>
         </div>
      </div>
      <div class="w-44 h-36 bg-white rounded px-3 py-3 md:flex md:items-center">
         <div class="">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2">2</p>
            <p>Pick Job Category you are interested in</p>
         </div>
      </div>
      <div class="w-44 h-36 bg-white rounded px-3 py-3 md:flex md:items-center">
         <div class="">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2">3</p>
            <p>Upload your Document</p>
         </div>
      </div>
      <div class="w-44 h-36 bg-white rounded px-3 py-3 md:flex md:items-center">
         <div class="">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2">4</p>
            <p>Get matched to available companies</p>
         </div>
      </div>
   </div>
   <div class="py-12 shadow-lg md:w-full md:rounded md:py-4 px-4 md:my-8 md:flex md:justify-start md:items-center md:gap-10 bg-white">
      <div class="md:w-6/12 flex justify-center md:block">
            <img src="image/find.svg" alt="Why PentadCrown is the best for you" class="w-52 h-44 my-6 md:my-0 md:w-96 md:h-52">
      </div>
      <div class="">
         <h2 class="leading-9 text-bold mt-6 md:text-xl text-bold font-bold mb-3 md:mb-6 text-center md:text-left text-lg">Why Join PentadCrown</h2>
         <div class="mb-4 flex items-center justify-start md:justify-center">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2 mr-3 mt-2">1</p>
            <p class="text-md">Work full time at top companies</p>
         </div>
         <div class="mb-4 flex items-center justify-start md:justify-center">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2 mr-3 mt-2">1</p>
            <p class="text-md">Work full time at top companies</p>
         </div>
         <div class="mb-4 flex items-center justify-start md:justify-center">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2 mr-3 mt-2">1</p>
            <p class="text-md">Work full time at top companies</p>
         </div>
         <div class="mb-4 flex items-center justify-start md:justify-center">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2 mr-3 mt-2">1</p>
            <p class="text-md">Work full time at top companies</p>
         </div>
         <div class="mb-4 flex items-center justify-start md:justify-center">
            <p class="bg-purple-800 text-white rounded-full text-sm text-center w-5 h-5 mb-2 mr-3 mt-2">1</p>
            <p class="text-md">Work full time at top companies</p>
         </div>
      </div>
   </div>
   <div class="md:shadow-lg md:w-full md:rounded py-4 md:px-4 md:my-3 md:flex md:justify-start md:items-center md:gap-6 md:bg-white">
      <div class="md:w-6/12 flex justify-center md:block">
            <img src="image/about.svg" alt="Why PentadCrown is the best for you" class="w-52 h-44 my-6 md:my-0 md:w-96 md:h-52">
      </div>
      <div class="md:w-6/12 px-4 md:px-0">
         <h2 class="leading-9 text-bold mt-6 md:text-xl text-2xl text-bold font-bold mb-3 md:mb-6 text-center md:text-left">About pentad crown</h2>
         <p class="leading-6 tracking-wide md:text-sm mb-3 text-md">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
         </p>
         <p class="leading-6 tracking-wide text-md md:text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>
   </div>
   <div class="md:shadow-lg md:w-full md:rounded md:py-4 md:px-4 md:my-3 md:flex md:justify-start md:items-center md:gap-6 md:bg-white">

      <div class="md:w-11/12 bg-white md:bg-transparent py-2 md:py-0">
         <h2 class="leading-9 mt-6 text-2xl md:text-xl font-bold md:pb-8 mb-3 md:mb-6 text-center md:border-b-2 md:border-gray-100">Frequently asked questions</h2>
         <ul class="">
            <li v-for="faq in faqs" :key="faq.id" class="pb-3 md:my-3 border-b-2 border-gray-200">
               <div class="flex justify-start items-center" @click="showItem(faq)">
                  <p v-text="faq.question" class="py-4 font-bold tracking-wide px-3 text-left cursor-pointer"></p>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-grey-800" viewBox="0 0 20 20" >
                     <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
               </div>
               <p v-text="faq.answer" class="px-3 py-2 text-md leading-8 " v-if="faq.state"></p>
            </li>
         </ul>
      </div>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'
   import { Head, Link } from '@inertiajs/inertia-vue3'

   export default defineComponent({
      props: ['name'],
      components: {
         Head,
         Link
      },
      data(){
         return {
            faqs: [
               {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 0},
               {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 1},
               {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 2},
               {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 3}
            ]
         }
      },
      methods: {
         showItem(faq)
         {
           faq.state = !faq.state
         }
      }

   })
</script>
