<template id="" class="relative">
   <div class="">
      <div class="" v-if="shortlisted.length > 0">
         <div class="flex justify-start items-center my-5 mx-2 px-3" v-for="list in shortlisted" :key="list.id">
            <img :src="list.profile_photo_url" class="rounded-full w-12 h-12 my-1"/>
            <p class="mx-3 ">{{list.name}}</p>
            <button class=" text-white bg-black py-1 px-3 tracking-wider border-2 border-black mx-2" @click="retrieveEstablishments(list)">Connect</button>
            <!-- <button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2">Notify</button> -->
            <button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2" @click="chooseMail(list)">Send message</button>
            <button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2" @click="remove(list)">Remove</button>
            <!-- <button class=" text-black py-1 px-3 tracking-wider border-2 border-black mx-2">Remove</button> -->
         </div>
      </div>
      <div class="" v-else>
         <span>You do not have any user shortlisted.</span>
      </div>
      <!-- <template class="my-3 "> -->
        <div>
          <vue-final-modal v-model="showEstablishentModal" >
             <div class="grid content-center my-52">
                <div v-for="establishment in establishments" :key="establishment.id" class="flex justify-start items-center bg-zinc-700 place-self-center px-5 py-4">
                   <p class="text-white font-bold px-2 mx-2">{{establishment.name}}</p>
                   <p class="text-white font-bold px-2 mx-2">{{establishment.email}}</p>
                   <button class=" text-black py-1 px-3 tracking-wider border-2 bg-white mx-2" @click="connect(establishment)">Connect</button>
                </div>
             </div>
          </vue-final-modal>
         <vue-final-modal v-model="showMailModal" >
            <!-- <div class="grid justify-center items-center w-full h-full"> -->
               <div class="w-7/12 h-4/12 mx-auto my-32 border-2 border-white px-3 py-4 shadow-xl relative overflow-hidden" >
                  <span class="bg-slate-300 text-xl py-2 px-5 -top-2 -right-2 absolute rounded-lg cursor-pointer" @click="toggleMail()">X</span>
                  <label for="header" class="block leading-9 text-bolder text-white tracking-wider text-md">Header</label>
                  <input type="text" name="header" v-model="mailForm.header">
                  <label for="body" class="block leading-9 text-bolder text-white tracking-wider text-md mt-3">Body of the mail</label>
                  <textarea name="body" class="w-8/12 h-56 py-2 px-2" v-model="mailForm.body"></textarea>
                  <div class="flex justify-center my-2">
                     <!-- <button type="button" name="button" @click="template" class="text-white border-2 border-slate-100 tracking-wide py-2 px-3 mx-3">Template</button> -->
                     <select class="" name="" v-model="template" @change="chooseTemplate()">
                        <option value="Template">Template</option>
                        <option :value="message" v-for="message in messages" :key="message.id">{{message.type}}</option>
                     </select>
                     <button type="button" name="button" @click="saveMail()" class="text-white border-2 border-slate-100 tracking-wide py-2 px-3 mx-3">Save Message</button>
                     <button type="button" name="button" @click="mail()" class="py-2 px-3 bg-black text-white text-center tracking-wide">Send Mail</button>
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
                  alert(response.data.message)
               }else if (response.data.status == 1) {
                  this.shortlisted = response.data.message
                  this.messages = response.data.templates
               }else{
                  alert("Wahala ti wa o")
               }
            })
            .catch(error => {
               console.log(error)
               alert("Kasala ti box")
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
                  alert(response.data.message)
               }).catch(error => {
                  alert("Kasala ti box")
                  console.log(error)
               })
            }else{
               alert("The mail header or body is not properly formatted")
            }
         },
         saveMail()
         {
            if (this.mailForm.header !== null && this.mailForm.header !== '' && this.mailForm.header !== undefined && this.mailForm.header.length > 3 && this.mailForm.body !== null && this.mailForm.body !== '' && this.mailForm.body !== undefined && this.mailForm.body.length > 20) {
               axios.post("/createNotification", {
                  type: this.mailForm.header,
                  content: this.mailForm.body
               }).then(response => {
                  alert(response.data.message)
               }).catch(error => {
                  alert("kasala ti box")
                  console.log(error)
               })
            }else{
               alert("The mail header or body is not properly formatted")
            }
         },
         remove(info)
         {
            axios.post("/deleteShortList", {email: info.email})
            .then( response => {
               console.log(response)
               if (response.data.status == 0) {
                  alert(response.data.message)
               }else if (response.data.status == 1) {
                  alert("User Removed from shortlist")
                  this.shortlisted.splice(this.shortlisted.indexOf(info), 1);
               }else{
                  alert("Wahala ti wa o")
               }
            })
            .catch(error => {
               console.log(error)
               alert("Kasala ti box")
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

         },
         connect(establishment)
         {
            axios.post("/sendAttachment", {
               establishment: establishment.email,
               user: this.list.email
            }).then( response => {
               alert(response.data.message)
            }).catch( error => {
               alert("Kasala ti box")
               console.log(error)
            })
         }
      },
      mounted(){
         this.retrieve()
      }
   });
</script>
