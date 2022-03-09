<template id="" class="relative">
   <Head title="Shortlisted candidates" />
   <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">Shortlisted candidates</h1>
   <h3 class="tracking-wide text-center my-2 text-purple-900">Candidates that have been shortlisted from the home page appear here</h3>
   <div class="flex justify-center">
      <div class="" v-if="shortlisted.length > 0">
         <div class="flex justify-start items-center my-5 mx-2 px-3" v-for="list in shortlisted" :key="list.id">
            <img :src="list.profile_photo_url" class="rounded-full w-12 h-12 my-1"/>
            <p class="mx-3 ">{{list.name}}</p>
            <button class=" text-white bg-purple-800 py-1 px-3 tracking-wider border-2 mx-2" @click="retrieveEstablishments(list)">Connect</button>
            <!-- <button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2">Notify</button> -->
            <button class=" text-purple-900 py-1 px-3 tracking-wider border-2 border-purple-800 mx-2" @click="chooseMail(list)">Send message</button>
            <button class=" text-purple-900 py-1 px-3 tracking-wider border-2 border-purple-800 mx-2" @click="remove(list)">Remove</button>
            <!-- <button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2">Remove</button> -->
         </div>
      </div>
      <div class="" v-else>
         <h1 class="text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">You do not have shortlisted candidates</h1>
      </div>
      <!-- <template class="my-3 "> -->
        <div>
          <vue-final-modal v-model="showEstablishentModal" >
             <div class="grid my-20 mx-auto bg-white py-3 px-3 w-6/12 ">
                <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">Send Candidates details to Client</h1>
                <h3 class="tracking-wide text-center my-2 text-purple-900">You can only send to Clients registered on your dashboard</h3>
                <div v-for="establishment in establishments" :key="establishment.id" class="flex justify-start items-center place-self-center px-5 py-4 my-3">
                   <p class="text-purple-900 font-bold px-2 mx-2">{{establishment.name}}</p>
                   <p class="text-purple-900 font-bold px-2 mx-2">{{establishment.email}}</p>
                   <button class=" text-white py-3 px-3 tracking-wider border-2 bg-purple-800 mx-2" @click="connect(establishment)">Connect</button>
                </div>
             </div>
          </vue-final-modal>
         <vue-final-modal v-model="showMailModal" >
            <!-- <div class="grid justify-center items-center w-full h-full"> -->
               <div class="w-6/12 h-4/12 mx-auto my-20 border-2 border-white px-3 py-4 shadow-xl relative overflow-hidden bg-white" >
                  <span class="bg-slate-300 text-xl py-2 px-5 -top-2 -right-2 absolute rounded-lg cursor-pointer" @click="toggleMail()">X</span>
                  <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-3">Send message to candidate</h1>
                  <label for="header" class="block leading-9 text-bolder text-purple-900 tracking-wider text-md">Header</label>
                  <input type="text" name="header" v-model="mailForm.header">
                  <label for="body" class="block leading-9 text-bolder text-purple-900 tracking-wider text-md mt-3">Body of the mail</label>
                  <textarea name="body" class="w-8/12 h-56 py-2 px-2" v-model="mailForm.body"></textarea>
                  <div class="flex justify-start my-2">
                     <!-- <button type="button" name="button" @click="template" class="text-white border-2 border-slate-100 tracking-wide py-2 px-3 mx-3">Template</button> -->
                     <div class="">
                        <!-- <label for="template" class="block leading-9 text-bolder text-purple-900 tracking-wider text-md mt-3">Select template</label> -->
                        <select class="" name="template" v-model="template" @change="chooseTemplate()" placeholder="Choose template">
                           <option value="Template">Template</option>
                           <option :value="message" v-for="message in messages" :key="message.id">{{message.type}}</option>
                        </select>
                     </div>
                     <button type="button" name="button" @click="saveMail()" class="text-purple-800 border-2 border-purple-800 tracking-wide py-2 px-3 mx-3">Save Message</button>
                     <button type="button" name="button" @click="mail()" class="py-2 px-3 bg-purple-800 text-white text-center tracking-wide">Send Mail</button>
                  </div>
               </div>
               <!-- <div class="w-7/12 h-4/12 mx-auto my-32 border-2 border-white px-3 py-4 shadow-xl relative overflow-hidden" v-else>

               </div> -->
            <!-- </div> -->
         </vue-final-modal>
        </div>
      <!-- </template> -->
   </div>

</template>
<script>
   import {defineComponent} from 'vue'
   // import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
   import { VueFinalModal, ModalsContainer } from 'vue-final-modal'
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import Toastify from 'toastify-js'
   import "toastify-js/src/toastify.css"

   export default defineComponent({
      components:{
         // SweetModal,
         // SweetModalTab
         VueFinalModal,
         ModalsContainer
      },
      data(){
         return {
            shortlisted: [],
            showEstablishments: true,
            establishments: [],
            messages: [],
            showEstablishentModal: false,
            showMailModal: false,
            list: null,
            writeMessage: true,
            template: null,
            mailForm: {
               header: null,
               body: null
            }
         }
      },
      computed: {

      },
      methods: {
         retrieve()
         {
            axios.get("/readShortList", {start: 0})
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
               }else if (response.data.status == 1) {
                  this.shortlisted = response.data.message
                  this.messages = response.data.templates
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
            .catch(error => {
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
         },
         template()
         {
            this.writeMessage = !this.writeMessage
         },
         employ()
         {

         },
         toggleMail()
         {
            this.showMailModal = false
         },
         showEstabliishment(){
            this.$refs.modal.open()
         },
         chooseMail(info)
         {
            this.list = info
            this.showMailModal = true
         },
         chooseTemplate()
         {
            if (this.template !== "Template") {
               let getIndex = this.messages.indexOf(this.template)
               this.mailForm.header = this.messages[getIndex].type
               this.mailForm.body = this.messages[getIndex].content
            }
         },
         mail()
         {
            if (this.mailForm.header !== null && this.mailForm.header !== '' && this.mailForm.header !== undefined && this.mailForm.header.length > 3 && this.mailForm.body !== null && this.mailForm.body !== '' && this.mailForm.body !== undefined && this.mailForm.body.length > 20) {
               axios.post("/sendMail", {
                  email: this.list.email,
                  header: this.mailForm.header,
                  body: this.mailForm.body
               }).then(response => {
                  console.log(response)
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
                      background: "green",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
               }).catch(error => {
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
                  console.log(error)
               })
            }else{
               // alert("The mail header or body is not properly formatted")
               Toastify({
                 text: "The mail header or body is not properly formatted",
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
         },
         saveMail()
         {
            if (this.mailForm.header !== null && this.mailForm.header !== '' && this.mailForm.header !== undefined && this.mailForm.header.length > 3 && this.mailForm.body !== null && this.mailForm.body !== '' && this.mailForm.body !== undefined && this.mailForm.body.length > 20) {
               axios.post("/createNotification", {
                  type: this.mailForm.header,
                  content: this.mailForm.body
               }).then(response => {
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
                      background: "green",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
               }).catch(error => {
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
                  console.log(error)
               })
            }else{
               // alert("The mail header or body is not properly formatted")
               Toastify({
                 text: "The mail header or body is not properly formatted",
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
         },
         remove(info)
         {
            axios.post("/deleteShortList", {email: info.email})
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
               }else if (response.data.status == 1) {
                  // alert("User Removed from shortlist")
                  Toastify({
                    text: "User Removed from shortlist",
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
                  this.shortlisted.splice(this.shortlisted.indexOf(info), 1);
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
            .catch(error => {
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
         },
         retrieveEstablishments(info)
         {
            this.showEstablishentModal = true
            this.list = info
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
                      background: "orange",
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

         },
         connect(establishment)
         {
            axios.post("/sendAttachment", {
               establishment: establishment.email,
               user: this.list.email
            }).then( response => {
               Toastify({
                 text: response.data.message,
                 duration: 5000,
                 newWindow: true,
                 close: true,
                 gravity: "top", // `top` or `bottom`
                 position: "right", // `left`, `center` or `right`
                 stopOnFocus: true, // Prevents dismissing of toast on hover
                 style: {
                   background: "blue",
                },
                 onClick: function(){} // Callback after click
               }).showToast();
            }).catch( error => {
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
               console.log(error)
            })
         }
      },
      mounted(){
         this.retrieve()
      }
   });
</script>
