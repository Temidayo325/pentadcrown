<template id="">
   <div class="" >
      <form class="flex justify-start items-center my-10 mx-auto" method="post" @submit.prevent="search()">
         <jet-input id="searchText" type="text" class="block w-4/12" required autofocus v-model="searchText"/>
         <jet-button class="py-3" >
             Search
         </jet-button>
      </form>
      <div class="" v-if="results !== null">
         <div class="flex justify-center items-center my-3">
            <template v-for="(link, k) in results.links" :key="k">
              <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
              <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
         </div>
         <table class=" rounded mx-auto px-3 py-2" >
            <thead class="text-left">
               <th class="py-3 px-3 border-r-2 border-"></th>
               <th>Name</th>
               <th>Role</th>
               <!-- <th>Passport</th> -->
               <th>CV</th>
               <th>Cover Letter</th>
               <th>Short List</th>
               <!-- <th>Notify</th> -->
            </thead>
            <tbody class="space-y-4">
               <tr v-for="result in results.data" :key="result.id" class="my-5 shadow-md py-2 px-3">
                  <td><img :src="result.profile_photo_url" class="rounded-full w-12 h-12 my-1"/></td>
                  <td class="px-3">{{result.name}}</td>
                  <td>{{result.jobs}}</td>
                  <!-- <td>View picture</td> -->
                  <td><button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2" @click="viewCv(result.cvpath)">View CV</button></td>
                  <td><button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2" @click="viewCl(result.coverletterpath)">View cover letter</button></td>
                  <td><button class="text-white py-2 px-3 tracking-wider bg-black" @click="shortList(result)">Short list</button></td>
                  <!-- <td><button class=" text-black py-1 px-3 tracking-wider border-2 border-black">Notify</button></td> -->
               </tr>
            </tbody>
         </table>
         <div class="flex justify-center items-center my-3">
            <button type="button" name="button" v-for="link in results.links" :key="link.label" class="py-1 px-5 bg-slate-300 text-black mx-2">{{link.label}}</button>
         </div>
      </div>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'
   import {Link} from '@inertiajs/inertia-vue3'
   import JetButton from '@/Jetstream/Button.vue'
   import JetInput from '@/Jetstream/Input.vue'

   export default defineComponent({
      components: {
         JetButton,
         JetInput,
         Link
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
         search()
         {
            axios.get('/search?search='+this.searchText)
            .then( response => {
               console.log(response)
               if (response.data.status == 0) {
                  alert(response.data.message)
                  console.log(response)
               }else if (response.data.status == 1) {
                  console.log(typeof response.data.message)
                  if (response.data.message !== null  ) {
                     this.results = response.data.message
                  }else{
                     alert("No registered user with that job descriptoin yet")
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
                  alert(response.data.message)
               }else if (response.data.status === 1) {
                  alert("User Shortlisted!")
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
