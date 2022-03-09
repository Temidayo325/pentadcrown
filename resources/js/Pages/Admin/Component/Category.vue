<template id="">
   <Head title="Available job categories"/>
   <!-- <div class="">
      <h1>This is where the Category is modified</h1>
   </div> -->
   <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">Add to your Job category</h1>
   <h3 class="tracking-wide text-center">Add to the categories when the Opening comes up</h3>
   <form class="flex justify-center my-5" @submit.prevent="addCategory" method="post">

      <jet-input id="categoryToAdd" type="text" class="mt-1 block w-4/12" required autofocus v-model="categoryToAdd"/>
      <jet-button class="ml-4 bg-purple-800">
          Add Category
      </jet-button>
   </form>
   <div class="w-10/12 mx-auto">
      <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-left text-2xl rounded md:mt-8">List of available Job categories</h1>
      <h3 class="tracking-wide">This is the options the user can apply for when applying for Job</h3>
      <ul class="flex justify-start flex-wrap">
         <li class="px-3 mr-5 py-2 pr-10 bg-purple-300 text-lg rounded-lg text-black my-5 relative shadow-2xl" v-for="category in categories" :key="category.job">
            <p class="text-md mt-1">{{category.job}}</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-red-500 absolute top-1 right-1 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" @click="removeCategory(category)">
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
import { Head, Link } from '@inertiajs/inertia-vue3'
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
// import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
   components: {
      JetButton,
      JetInput,
      Link,
      Head
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
                  // alert(response.data.message)
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
                    text: "Category added successfully",
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
            // alert("Invalid Category To be added")
            Toastify({
              text: "Invalid Category To be added",
              duration: 5000,
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "red",
             },
              onClick: function(){} // Callback after click
            }).showToast();
         }
      },
      removeCategory(job)
      {
         axios.post('/removeCategory', {
            category: job.job
         })
         .then( (response) => {
            if (response.data.status === 0) {
               // alert(response.data.message)
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
               // alert("Removed Successfully")
               Toastify({
                 text: "Job category removed successfully",
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
