<template>
    <app-layout title="Upload">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Upload
            </h2>
        </template> -->
        <div class="mx-auto my-6">
           <h2 class="text-xl tracking-wider font-bold text-black text-center">Upload files</h2>
           <h3 class="text-md py-2 text-slate-700 text-center">Upload the required here</h3>
        </div>
        <div class="my-3 px-3 border-4 border-slate-400 border-dashed bg-slate-300 py-3 px-3 mx-4">
           <form action="" method="post" enctype="multipart/form-data" class="grid justify-center">
             <label for="type" class="block text-md ">Choose Document type</label>
             <select class="" name="type" v-model="type">
                <option value=""></option>
                <option value="cv">CV</option>
                <option value="cl">Cover letter</option>
             </select>
             <input type="file" @change="chooseFile($event)" class="bg-slate-400 w-11/12 h-48 my-6 mx-3 hidden" ref="fileInput">
             <button type="button" name="button" @click="$refs.fileInput.click()" class="bg-slate-400 my-3 text-xl text-white ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-60 my-4 mx-auto fill-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                  </svg>
                  Click to upload File
               </button>
             <button type="button" name="button" class="py-2 px-2 bg-black text-white leading-9 tracking-wider text-md shadow-2xl" @click="uploadFile()">Upload CV</button>
           </form>
        </div>
        <div class="px-3" v-if="startUpload">
           <p class="leading-8 tracking-wider text-black font-md italics">{{fileUploaded}}</p>
           <p class="leading-8 tracking-wider text-black font-lg italics">{{uploadPercentageRealTime}} %</p>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    // import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    // import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
    // import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'
    // import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
    // import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'

    export default defineComponent({
        props: ['sessions', 'user'],

        components: {
            AppLayout,
            // DeleteUserForm,
            JetSectionBorder,
            // LogoutOtherBrowserSessionsForm,
            // TwoFactorAuthenticationForm,
            // UpdatePasswordForm,
            // UpdateProfileInformationForm,
        },
        data() {
           return {
             file: null,
             userData: this.user,
             type: "",
             startUpload: false,
             uploadPercentage: "",
             fileUploaded: ""
          }
       },
       computed: {
          uploadPercentageRealTime()
          {
             return this.uploadPercentage
          }
       },
        methods: {
           chooseFile(event)
           {
             this.file = event.target.files[0];
             this.fileUploaded = this.file.name;
             // console.log(event.target.files)
          },
          uploadFile()
          {
             this.startUpload = true;
             let data = new FormData();
             data.append('image', this.file, this.file.name);
             data.append('email', this.user.email);
             data.append('type', this.type);
             const config = {
                onUploadProgress: uploadEvent => {
                  this.uploadPercentage = Math.round( (uploadEvent.loaded / uploadEvent.total) * 100);
               }
             }
             axios.post('upload_cv', data, config)
             .then( (response) => {
                console.log(response)
                console.log(this.uploadPercentage)
             })
             .catch( (error) => {
                console.log(error)
             })
          }
        }
    })
</script>
