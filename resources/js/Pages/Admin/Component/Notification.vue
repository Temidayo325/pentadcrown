<template>
   <div class="flex justify-center items-center">
      <div class="" v-if="viewList">
         <div class="" v-if="notifications.content.length > 0">
            <p class="my-2 text-purple-900 text-bold text-md py-3 px-2 text-center cursor-pointer" @click="ToggleViewlist()">Add Notification</p>
            <table class="table-auto border-collapse border border-slate-500 mx-auto w-10/12">
               <thead class="py-3 bg-slate-500 ">
                  <th class="py-2 text-white leading-9 tracking-wider">Header</th>
                  <th class="py-2 text-white leading-9 tracking-wider">Content</th>
                  <th></th>
               </thead>
               <tbody>
                  <tr v-for="message in notifications.content" :key="message.id" class="border border-slate-700 px-2 py-2">
                     <td class="py-6 px-2 my-2 ">{{message.type}}</td>
                     <td>{{message.content}}</td>
                     <td><button type="button" class="border-2 border-black px-3 py-2 " @click="remove(message)">Remove</button></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="" v-else>
            <p class="text-center text-purple-900">You do not have any registered Notifications, <span class="cursor-pointer px-2 bg-purple-800 text-slate-100" @click="ToggleViewlist()">Click here</span> to add Notifications</p>
         </div>

      </div>

      <form class="w-4/12 border-2 border-black " method="post" @submit.prevent="submit" v-else >
         <p class="py-2 bg-slate-400 text-center text-bolder text-white mb-3">Create new Notifications</p>
         <label for="type" class="px-2 py-2 mt-3">Type of Notification Message</label>
         <input id="type" type="text" class="block w-11/12 px-2 mx-2" required autofocus v-model="notificationForm.type" placeholder=""/>
         <label for="content" class="block mt-3 py-2 px-2">Content of Notification Message</label>
         <textarea name="content" class="w-11/12 h-56 py-2 px-2 block mx-2" v-model="notificationForm.content"></textarea>
         <button class="py-3 block bg-black text-white my-3 mx-auto px-2" type="submit">
             Create new textarea
         </button>
         <p class="my-2 text-purple-900 text-bold text-md py-3 px-2 text-center cursor-pointer" @click="ToggleViewlist()">View list of Notifications</p>
      </form>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'

   export default defineComponent({
      components: {
      },
      data(){
         return {
            notificationForm: {
               type: null,
               content: null,
            },
            viewList: true,
            notifications: {
               empty: true,
               content: []
            }
         }
      },
      methods: {
         submit()
         {
            if (this.notificationForm.type !== null && this.notificationForm.type !== undefined && this.notificationForm.type !== '' && this.notificationForm.type.length > 3 && this.notificationForm.content !== null && this.notificationForm.content !== undefined && this.notificationForm.content !== '' && this.notificationForm.content.length > 20) {
               axios.post("/createNotification", {
                  type: this.notificationForm.type,
                  content: this.notificationForm.content
               })
               .then(response => {
                  if (response.data.status == 0) {
                     alert(response.data.message)
                  }else if (response.data.status == 1) {
                     if (response.data.message !== null) {
                           this.viewList = true
                           this.notifications.content = response.data.message
                           alert(response.data.message)
                     }
                  }else{
                     alert("Wahala wa o")
                  }
               }).catch(error => {
                  alert("Kasala ti box")
                  console.log(error)
               })
            }else{
               alert("The header or the body of the message is not properly formatted")
            }
         },
         ToggleViewlist()
         {
            if (this.viewList) {
               this.viewList = false
            }else{
               this.viewList = true
            }
         },
         retrieve()
         {
            axios.get("/getNotification")
            .then(response => {
               if (response.data.status == 0) {
                  alert(response.data.message)
               }else if (response.data.status == 1) {
                  if (response.data.message !== null) {
                        this.notifications.empty = false
                        this.notifications.content = response.data.message
                  }
               }else{
                  alert("Wahala wa o")
               }
            }).catch(error => {
               alert("Kasala ti box")
               console.log(error)
            })
         },
         remove(info)
         {
            axios.post("/removeNotification", {
               type: info.type
            })
            .then(response => {
               if (response.data.status == 0) {
                  alert(response.data.message)
               }else if (response.data.status == 1) {
                  alert(response.data.status)
                  this.notifications.content.splice(1, this.notifications.content.indexof(info))
               }else{
                  alert("Wahala wa o")
               }
            }).catch(error => {
               alert("Kasala ti box")
               console.log(error)
            })
         }
      },
      mounted(){
         this.retrieve();
      }

   });
</script>
