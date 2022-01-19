<template>
   <div class="flex justify-center ">
      <form class="px-3 my-20 border-2 border-slate-700 w-4/12" @submit.prevent="submit" method="post" v-if="addEstablishment">
         <p @click="toggleEstablisment()" class="text-center text-bold my-3 text-purple-900 py-2 cursor-pointer">View Establishments</p>
         <label for="name">Name of Establishment</label>
         <input id="name" type="text" class="block w-9/12" required autofocus v-model="name"/>

         <label for="email">Email of Contact person</label>
         <input id="email" type="email" class="block w-9/12" required autofocus v-model="email"/>

         <label for="phone">Phone number of Contact person</label>
         <input id="phone" type="text" class="block w-9/12" required autofocus v-model="phone"/>

         <button type="button" name="button" class="bg-black text-white py-3 px-3 my-3 mx-auto">Add Establishment</button>
      </form>
      <div class="" v-if="normalview">
         <p @click="toggleEstablisment()" class="text-center text-bold my-3 text-purple-900 py-2 cursor-pointer">Click here to add more establishments</p>
         <table v-if="establishments.length > 0" class="mx-auto">
            <thead>
               <th class="mx-2 px-2">Name of Establishment</th>
               <th class="mx-2 px-2">Email of Contact person</th>
               <th class="mx-2 px-2">Phone of Contact person</th>
               <th></th>
            </thead>
            <tbody>
               <tr v-for="establishment in establishments" :key="establishment.email" class="my-3">
                  <td class="text-center">{{establishment.name}}</td>
                  <td class="text-center">{{establishment.email}}</td>
                  <td class="text-center">{{establishment.phone}}</td>
                  <td class="text-center"><button type="button" name="button" class="py-2 px-3 mx-2 border-2 border-black text-black" @click="remove(establishment)">Remove establishment</button></td>
               </tr>
            </tbody>
         </table>
         <div class="" v-else>
            <span>You haven't added any establishment yet, Click the button below to add establishment</span>
            <button type="button" name="button" @click="toggleEstablisment()" class="block mx-auto bg-black text-white py-2 px-3 tracking-wider">Add new Establishment</button>
         </div>
      </div>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'
   import JetButton from '@/Jetstream/Button.vue'
   // import JetInput from '@/Jetstream/Input.vue'

   export default defineComponent({
      props: {

      },
      components: {
         JetButton,
         // JetInput
      },

      data(){
         return {
            email: null,
            phone: null,
            name: null,
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
            if (this.email == null || this.phone == null || this.name == null || this.email.length < 3 || this.phone.length < 10) {
               alert("Invalid form")
            }else{
               axios.post("/createEstablishment", {
                  name: this.name,
                  email: this.email,
                  phone: this.phone
               })
               .then( response => {
                  console.log(response)
                  if (response.data.status == 1) {
                     alert("Added successfully!!")
                     this.establishments.push({email: this.email, phone: this.phone, email: this.email});
                     this.addEstablishment = false
                     this.normalview = true
                  }else if(response.data.status == 0){
                     alert(response.data.message)
                  }else{
                     alert("Kasala ti Box")
                  }
               })
               .catch( error => {
                  console.log(error);
                  alert("Wahala ti wa o")
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
                     alert(response.data.message)
                  }else if(response.data.status == 1){
                     alert(response.data.message)
                     this.establishments.splice(this.establishments.indexOf(info), 1)
                  }else{
                     alert("Kasala ti box")
                  }
               }).catch(error => {
                  console.log(error)
                  alert("Wahala ti wa o")
               })
            }else{
               alert("Cannot remove invalid Establishment")
            }
         },
         retrieve()
         {
            axios.get("/getEstablishment")
            .then(response => {
               console.log(response)
               if (response.data.status == 0) {
                  alert(response.data.message)
               }else if(response.data.status ==1){
                  this.establishments = response.data.message
                  console.log(this.establishments.length)
               }else{
                  alert("Wahala ti wa o")
               }
            })
            .catch( error => {
               console.log(error)
               alert("kasala ti box")
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
