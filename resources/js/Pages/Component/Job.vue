<template>
   <app-layout title="Add Job Category">
      <Head title="Welcome to your dashboard" />
      <!-- <template #header class="md:hidden">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Job categories
          </h2>
      </template> -->
      <div class=" my-2 px-4">
         <div class="my-3" >
            <h1 class="text-2xl font-bold tracking-wide leading-9 ">Here are your Job Categories</h1>
            <!-- <p v-for="jobs in categories">{{jobs}}</p> -->
            <p v-if="categories == null" class="text-md text-red-500 leading-8 ">You have indicated the jobs you are interested in. You can add from the available jobs below</p>
            <div v-else class="flex justify-start flex-wrap my-4 gap-2 md:gap-6">
               <p  class="text-left text-lg bg-white py-3 px-6 rounded-2xl tracking-wide shadow-lg" v-for="jobs in categories">{{jobs}}</p>
            </div>
         </div>
         <div class="my-2 md:my-12">
            <h1 class="text-xl font-bold tracking-wide leading-9 ">Choose your Job interests here</h1>
            <div class="">
               <ul class="flex flex-wrap justify-start gap-3">
                  <li v-for="category in Jobcategories" :key="category.length" class="my-2 grid bg-white rounded shadow-md px-3 py-3 ">
                     <input class="mx-3 my-2" type="checkbox" :id="category.job" :value="category.job" v-model="myCategories">
                     <label :for="category.job" class="px-2">{{category.job}}</label>
                  </li>
               </ul>
               <div class="flex items-center justify-center">
                  <button type="button" name="button" @click="addCategories()" class="px-3 py-3 my-3 text-md bg-purple-800 text-center text-white">Add Categories</button>
               </div>
            </div>
         </div>
      </div>
   </app-layout>
</template>
<script>
   import { defineComponent } from 'vue'
   import AppLayout from '@/Layouts/AppLayout.vue'
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import Toastify from 'toastify-js'
   import "toastify-js/src/toastify.css"

   export default defineComponent({
      components: {
         AppLayout,
         Head,
         Link,
      },
      props: {
         user: Object
      },
      data()
      {
         return {
            myCategories: [],
            Jobcategories: [],
            categories: JSON.parse(this.user.jobs)
         }
      },
      methods: {
         availableCategories()
         {
            axios.get('/getCategories')
            .then( (response) => {
               this.Jobcategories = response.data.categories
               // console.log(response)
            })
            .catch( (error) => {
               console.log(error)
            })
         },

         addCategories()
         {
            if (this.categories == null) {
               this.categories = this.myCategories
            }else{
               for (let category of this.myCategories)
               {
                  if (this.categories.indexOf(category) === -1) {
                     this.categories.push(category)
                  }
               }
            }

            axios.post('/addCategories', {
               email: this.user.email,
               jobs: this.categories
            })
            .then( (response) => {
               if (response.data.status === 0) {
                  Toastify({
                    text: response.data.message,
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                      background: "orange",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
               }else if(response.data.status === 1)
               {
                  Toastify({
                    text: "Job category added succesfully!",
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                      background: "green",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
                  this.categories = this.myCategories
               }else{
                  console.log("kasala ti box")
               }
            })
            .catch( (error) => {
               console.log(error)
            })
         }
      },
      mounted()
      {
         this.availableCategories();
         console.log(typeof this.categories)
      }
   })
</script>
