<template>
   <app-layout title="Add Job Category">
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Job categories
          </h2>
      </template>
      <div class="">
         <div class="" v-if="categories !== null">
            <h1>Here are your Job Categories</h1>
            <p v-for="jobs in categories">{{jobs}}</p>
         </div>
         <div class="" v-else>
            <h1>Choose your Job interests here</h1>
            <div class="">
               <ul>
                  <li v-for="category in Jobcategories" :key="category.length" class="my-2  flex items-center justify-start">
                     <input type="checkbox" :id="category.job" :value="category.job" v-model="myCategories">
                     <label :for="category.job" class="px-2">{{category.job}}</label>
                  </li>
               </ul>
               <button type="button" name="button" @click="addCategories()" class="px-2 py-2 bg-black text-white">Add Categories</button>
            </div>
         </div>
      </div>
   </app-layout>
</template>
<script>
   import { defineComponent } from 'vue'
   import AppLayout from '@/Layouts/AppLayout.vue'

   export default defineComponent({
      components: {
         AppLayout
      },
      props: {
         user: Object
      },
      data()
      {
         return {
            // categories: ["Web developer", "Front End Developer", "Backend Developer", "Fullstack Developer"],
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
            axios.post('/addCategories', {
               email: this.user.email,
               jobs: this.myCategories
            })
            .then( (response) => {
               if (response.data.status === 0) {
                  alert(response.data.message)
               }else if(response.data.status === 1)
               {
                  alert("Added Successfully")
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
