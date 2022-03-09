<template id="">
   <Head title="Search available jobs"/>
   <div class="" >
      <!-- <div class="md:bg-purple-800 md:w-10/12 md:h-36 md:my-0 md:mx-auto"> -->
         <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">Search available Jobs</h1>
         <form class="flex justify-start md:justify-center mt-5 mb-10" method="post" @submit.prevent="search()">
            <jet-input id="searchText" type="text" class="block w-4/12" required autofocus v-model="searchText"/>
            <jet-button class="py-3 bg-purple-800" >
                Search
            </jet-button>
         </form>
      <!-- </div> -->

      <div class="" v-if="results !== null">
         <div class="flex justify-center items-center my-3">
            <!-- <template v-for="(link, k) in results.links" :key="k">
              <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
              <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" />
            </template> -->
            <template id="" class="flex justify-center items-center my-3">
               <button type="button" name="previous" class="bg-purple-800 text-white py-3 px-3 mx-4" @click="previous()" v-if="results.prev_page_url !== null">Previous</button>
               <button type="button" name="previous" class="bg-purple-800 text-white py-3 px-3" @click="next()">next</button>
            </template>
         </div>
         <table class=" rounded mx-auto px-3 py-2" >
            <thead class="text-left py-3 text-purple-900">
               <th class="py-3 px-3"></th>
               <th>Name</th>
               <th>Role</th>
               <!-- <th>Passport</th> -->
               <th>CV</th>
               <th>Cover Letter</th>
               <th>Short List</th>
               <!-- <th>Notify</th> -->
            </thead>
            <tbody class="space-y-4">
               <tr v-for="result in results.data" :key="result.id" class="my-5 shadow-md py-4 px-3">
                  <td><img :src="result.profile_photo_url" class="rounded-full w-15 h-15 my-1"/></td>
                  <td class="px-3">{{result.name}}</td>
                  <td>{{result.jobs}}</td>
                  <!-- <td>View picture</td> -->
                  <td><button class=" text-black py-1 px-3 tracking-wider border-2 border-purple-900 mx-2" @click="viewCv(result.cvpath)">View CV</button></td>
                  <td><button class=" text-black py-1 px-3 tracking-wider border-2 border-purple-900 mx-2" @click="viewCl(result.coverletterpath)">View cover letter</button></td>
                  <td><button class="text-white py-2 px-3 tracking-wider bg-purple-800" @click="shortList(result)">Short list</button></td>
                  <!-- <td><button class=" text-black py-1 px-3 tracking-wider border-2 border-black">Notify</button></td> -->
               </tr>
            </tbody>
         </table>
         <template id="" class="flex justify-center items-center my-3">
            <button type="button" name="previous" class="bg-purple-800 text-white py-3 px-3 mx-4" @click="previous()" v-if="results.prev_page_url !== null">Previous</button>
            <button type="button" name="previous" class="bg-purple-800 text-white py-3 px-3" @click="next()">next</button>
         </template>
      </div>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'
   // import {Link} from '@inertiajs/inertia-vue3'
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import JetButton from '@/Jetstream/Button.vue'
   import JetInput from '@/Jetstream/Input.vue'
   // import {toastr} from "toastr";
   import Toastify from 'toastify-js'
   import "toastify-js/src/toastify.css"

   export default defineComponent({
      components: {
         JetButton,
         JetInput,
         Link,
         Head
      },
      data()
      {
         return {
            searchText: null,
            results: null,
            counter: 0
         }
      },
      computed: {
         increaseCounter()
         {
            this.counter = this.counter + 1
            return this.counter
         }
      },
      methods:
      {
         previous()
         {
            axios.get(this.results.prev_page_url)
            .then( response => {
               console.log(response)
               if (response.data.status == 0) {
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
                  console.log(response)
               }else if (response.data.status == 1) {
                  console.log(typeof response.data.message)
                  if (response.data.message !== null  ) {
                     this.results = response.data.message
                  }else{
                     // alert("No registered user with that job descriptoin yet")
                     Toastify({
                       text: "No registered user with that job descriptoin yet",
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
                  }
               }else{
                  console.log(response)
               }
            })
            .catch( error => {
               console.log(error)
               alert("There is problem comrade")
            })
         },

         next()
         {
            axios.get(this.results.next_page_url)
            .then( response => {
               console.log(response)
               if (response.data.status == 0) {
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
                  console.log(response)
               }else if (response.data.status == 1) {
                  console.log(typeof response.data.message)
                  if (response.data.message !== null  ) {
                     this.results = response.data.message
                  }else{
                     // alert("No registered user with that job descriptoin yet")
                     Toastify({
                       text: "No registered user with that job descriptoin yet",
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
                  }
               }else{
                  console.log(response)
               }
            })
            .catch( error => {
               console.log(error)
               alert("There is problem comrade")
            })
         },

         search()
         {
            axios.get('/search?search='+this.searchText)
            .then( response => {
               console.log(response)
               if (response.data.status == 0) {
                  // alert(response.data.message)
                  Toastify({
                    text: response.datda.message,
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
                  console.log(response)
               }else if (response.data.status == 1) {
                  console.log(typeof response.data.message)
                  if (response.data.message !== null  ) {
                     this.results = response.data.message
                  }else{
                     // alert("No registered user with that job descriptoin yet")
                     Toastify({
                       text: "No registered user with that job descriptoin yet",
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
                  }
               }else{
                  console.log(response)
               }
            })
            .catch( error => {
               console.log(error)
               alert("There is problem comrade")
            })
         }
         ,
         shortList(info)
         {
            axios.post('/createShortList', {
               email: info.email
            })
            .then(response => {
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
               }else if (response.data.status === 1) {
                  // alert("User Shortlisted!")
                  Toastify({
                    text: "User Shortlisted",
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
                  this.results.data.splice(this.results.data.indexOf(info), 1)
               }else{
                  alert("kasala ti box")
               }
            })
            .catch(error => {
               console.log(error)
            })
         }
         ,
         viewCv(url)
         {
            window.open(url)
         },
         viewCl(url)
         {
            window.open(url)
         }
      }

   })
</script>
