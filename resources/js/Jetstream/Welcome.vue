<template id="">
   <Head title="Dashboard" />
   <div class="md:w-full md:flex md:justify-start md:gap-12">
      <div class="md:w-3/12 md:bg-white md:shadow-md md:px-4  md:py-14 md:sticky-0 md:max-h-screen md:sticky md:top-0 md:shadow-lg">
         <h1 class="leading-9 mt-6 md:text-lg text-extrabold tracking-wide font-bold">PentadCrown</h1>
         <h3 class="bg-purple-50 py-3 px-4 font-bold rounded-3xl my-3 leading-9 text-lg cursor-pointer">Available jobs</h3>
         <div class="">
            <p class="py-3 px-4 font-bold my-3 leading-9 text-lg cursor-pointer" @click="changeComponent('home')">Home</p>
            <p class="py-3 px-4 font-bold my-3 leading-9 text-lg cursor-pointer" @click="changeComponent('aptitude')">Entry test</p>
            <p class="py-3 px-4 font-bold my-3 leading-9 text-lg cursor-pointer" @click="changeComponent('job')">Add Job Category</p>
            <p class="py-3 px-4 font-bold my-3 leading-9 text-lg cursor-pointer" @click="changeComponent('upload')">Upload Resume and CV</p>
            <!-- <p>Add Job Category</p> -->
            <!-- <Link :href="route('logout')">
               <p class="py-3 px-4 font-bold my-3 leading-9 text-lg cursor-pointer" @click="logout()">Logout</p>
            </Link> -->
            <img src="image/happy.svg" alt="Goodluck in your test" class="md:w-7/12 md:h-24 md:mx-4 md:my-3">
         </div>
      </div>
      <div class="md:w-8/12 md:px-4 md:ml-10 md:py-14">
         <component :is="currentViewComputed" class="my-4" :name="getSecondName()" :user="userInfo"></component>
      </div>

   </div>
</template>
<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import Home from '@/Pages/Component/Home.vue'
    import Job from '@/Pages/Component/Job.vue'
    import Upload from '@/Pages/Component/Upload.vue'
    import Aptitude from '@/Pages/Component/Aptitude.vue'

    export default defineComponent({
      props:['userInfo'],
        components: {
           Head,
           Link,
           Home,
           Job,
           Upload,
           Aptitude
        },
        computed: {
          currentViewComputed()
          {
             return this.currentView
          }
       },
        data(){
          return {
             currentView: "home",
             faqs: [
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 0},
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 1},
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 2},
                {question: "What is the question", answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", state: false, id: 3}
             ]
          }
        },
        methods: {
           changeComponent(info)
           {
             this.currentView = info
           },
          showItem(faq)
          {
             faq.state = !faq.state
          },
          getSecondName()
          {
             let secondName = this.userInfo.name.split(" ")
             return secondName[1]
          },
          // logout() {
          //    this.$inertia.post(route('logout'));
          // }
        }
    })
</script>
