<template id="">
   <div class="">
      <h1>This is where the Category is modified</h1>
   </div>
   <form class="" @submit.prevent="addCategory" method="post">
      <jet-input id="categoryToAdd" type="text" class="mt-1 block w-4/12" required autofocus v-model="categoryToAdd"/>
      <jet-button class="ml-4">
          Add Category
      </jet-button>
   </form>
   <div class="">
      <ul class="grid grid-cols-4">
         <li class="px-3 py-2 bg-slate-300 text-lg rounded-lg text-black mx-3 my-3 relative shadow-xl" v-for="category in categories" :key="category.job">
            <p class="text-md mt-3">{{category.job}}</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-slate-400 absolute top-1 right-1 cursor-pointer hover:h-8 hover:h-8 hover:fill-slate-900 hover:shadow-2xl" viewBox="0 0 20 20" fill="currentColor" @click="removeCategory(category)">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
         </li>
      </ul>
   </div>
</template>
<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
// import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
   components: {
      JetButton,
      JetInput
   },
   props: {
      // user: Object
   },
   data()
   {
      return {
         categories: null,
         categoryToAdd: null
      }
   },
   methods: {
      availableCategories()
      {
         axios.get('/getCategories')
         .then( (response) => {
            this.categories = response.data.categories
            console.log(this.categories)
         })
         .catch( (error) => {
            console.log(error)
         })
      },

      addCategory()
      {
         if (this.categoryToAdd !== '' || this.categoryToAdd !== null) {
            axios.post('/addAdminCategories', {
               category: this.categoryToAdd
            })
            .then( (response) => {
               if (response.data.status === 0) {
                  alert(response.data.message)
               }else if(response.data.status === 1)
               {
                  alert("Added Successfully")
                  this.categories.push({job: this.categoryToAdd})
                  this.categoryToAdd = ''
               }else{
                  console.log("kasala ti box")
               }
            })
            .catch( (error) => {
               console.log(error)
            })
         }else{
            alert("Invalid Category To be added")
         }
      },
      removeCategory(job)
      {
         axios.post('/removeCategory', {
            category: job.job
         })
         .then( (response) => {
            if (response.data.status === 0) {
               alert(response.data.message)
            }else if(response.data.status === 1)
            {
               alert("Removed Successfully")
               this.categories.splice(this.categories.indexOf(job), 1)
               // this.categories.push({job: this.categoryToAdd})
               // this.categoryToAdd = ''
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
      // console.log(typeof this.categories)
   }
})
</script>
