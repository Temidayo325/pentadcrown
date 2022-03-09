<template>
   <Head title="Manage Clients" />
   <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">Client management dashboard</h1>
   <h3 class="tracking-wide text-center my-2 text-purple-900">Clients include those who give you express permission to handle their HR</h3>
   <div class="flex justify-center ">
      <form class="px-3 my-12 border-2 border-purple-300 w-4/12" @submit.prevent="submit" method="post" v-if="addEstablishment">
         <h2 class="text-left text-purple-800 text-xl font-bold py-4 tracking-wider">Establishment form</h2>
         <!-- <div class="px-3 my-3"> -->
            <label for="name" class="mt-3">Name of Establishment</label>
            <input id="name" type="text" class="block w-9/12 mb-5 mt-2" required autofocus v-model="form.name"/>

            <label for="email"  class="mt-3 mb-1">Email of Contact person</label>
            <input id="email" type="email" class="block w-9/12 mb-5 mt-2" required autofocus v-model="form.email"/>

            <label for="phone"  class="mt-3 mb-1">Phone number of Contact person</label>
            <input id="phone" type="text" class="block w-9/12 mb-5 mt-2" required autofocus v-model="form.phone"/>
         <!-- </div> -->

         <div class="flex justify-center">
            <button type="submit" name="button" class="bg-purple-800 text-white py-3 px-3 my-3">Add Establishment</button>
         </div>
         <p @click="toggleEstablisment()" class="text-center text-bold my-3 text-purple-900 py-1 cursor-pointer">View Client list</p>
      </form>
      <div class="" v-if="normalview">
         <div class="my-10" v-if="establishments.length > 0">
            <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-xl rounded md:mt-8">Establishment details</h1>
            <table  class="mx-auto">
               <thead>
                  <th class="mx-2 px-2 text-purple-900">Name of Establishment</th>
                  <th class="mx-2 px-2 text-purple-900">Email of Contact person</th>
                  <th class="mx-2 px-2 text-purple-900">Phone of Contact person</th>
                  <th></th>
               </thead>
               <tbody>
                  <tr v-for="establishment in establishments" :key="establishment.email" class="my-3">
                     <td class="text-center">{{establishment.name}}</td>
                     <td class="text-center">{{establishment.email}}</td>
                     <td class="text-center">{{establishment.phone}}</td>
                     <td class="text-center"><button type="button" name="button" class="py-2 px-3 mx-2 border-2 border-purple-800 text-black" @click="remove(establishment)">Remove establishment</button></td>
                  </tr>
               </tbody>
            </table>
            <p @click="toggleEstablisment()" class="text-center text-bold my-3 text-purple-900 py-2 cursor-pointer">Click here to add more establishments</p>
         </div>
         <div class="grid items-center justify-center my-20" v-else>
            <span class="my-2 text-purple-900">You do not have any registered Client yet, Click the button below to add Client</span>
            <button type="button" name="button" @click="toggleEstablisment()" class="block mx-auto bg-purple-800 text-white py-4 px-3 tracking-wider">Add new Establishment</button>
         </div>
      </div>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'
   import JetButton from '@/Jetstream/Button.vue'
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import Toastify from 'toastify-js'
   import "toastify-js/src/toastify.css"
   // import JetInput from '@/Jetstream/Input.vue'

   export default defineComponent({
      props: {

      },
      components: {
         JetButton,
         Head,
         Link
         // JetInput
      },

      data(){
         return {
            form: {
               email: null,
               phone: null,
               name: null,
            },
            addEstablishment: false,
            normalview: true,
            establishments: []
         }
      },

      methods: {
         toggleEstablisment()
         {
            this.addEstablishment = !this.addEstablishment;
            this.normalview = !this.normalview
         },
         // showForm()
         // {
         //
         // },
         submit()
         {
            if (this.form.email == null || this.form.phone == null || this.form.name == null || this.form.email.length < 3 || this.form.phone.length < 10) {
               alert("Invalid form")
            }else{
               axios.post("/createEstablishment", {
                  name: this.form.name,
                  email: this.form.email,
                  phone: this.form.phone
               })
               .then( response => {
                  console.log(response)
                  if (response.data.status == 1) {
                     // alert("Added successfully!!")
                     Toastify({
                       text: "Added successfully!!",
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
                     this.establishments.push({name: this.form.name, phone: this.form.phone, email: this.form.email});
                     this.addEstablishment = false
                     this.normalview = true
                  }else if(response.data.status == 0){
                     Toastify({
                       text: response.data.message,
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
                  }else{
                     Toastify({
                       text: "There's an issue somewhere",
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
               })
               .catch( error => {
                  console.log(error);
                  Toastify({
                    text: "Wahala wa o",
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
               })
            }
         },
         remove(info)
         {
            if (info.email !== null || info.email !== undefined || this.email == '') {
               axios.post("/removeEstablishment", {
                  email: info.email
               }).then( response => {
                  console.log(response)
                  if (response.data.status == 0) {
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
                  }else if(response.data.status == 1){
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
                     this.establishments.splice(this.establishments.indexOf(info), 1)
                  }else{
                     Toastify({
                       text: "Something seems broken",
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
               }).catch(error => {
                  console.log(error)
                  Toastify({
                    text: "Something seems broken",
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
               })
            }else{
               // alert("Cannot remove invalid Establishment")
               Toastify({
                 text: "Cannot remove invalid Establishment",
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
         retrieve()
         {
            axios.get("/getEstablishment")
            .then(response => {
               console.log(response)
               if (response.data.status == 0) {
                  Toastify({
                    text: response.data.message,
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
               }else if(response.data.status ==1){
                  this.establishments = response.data.message
                  console.log(this.establishments.length)
               }else{
                  Toastify({
                    text: "Something seems broken",
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
            })
            .catch( error => {
               console.log(error)
               Toastify({
                 text: "Something seems broken",
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
            })
         }
      }
      ,
      mounted(){
         this.retrieve()
         // alert(this.establishments.length)
      }
   });
</script>
