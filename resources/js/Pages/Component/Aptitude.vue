<template>
    <app-layout title="Upload">
       <Head title="Pentad crown test" />
       <h1 class="text-3xl font-bold leading-9 tracking-wider">Welcome to the Pentadcrown test</h1>

       <div class="md:rounded md:shadow-md md:bg-white md:px-4 md:py-6 md:mt-10 border-b-4 border-slate-400">
          <h2 class="font-bold text-xl leading-9 mb-2 tracking-wide ">Why take the Pentadcrown test</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       </div>
       <div class="md:rounded md:shadow-md md:bg-white md:px-4 md:py-6 md:mt-10 border-b-4 border-slate-400">
          <h2 class="font-bold text-xl leading-9 mb-2 tracking-wide ">About Pentadcrown test</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       </div>
       <div class="md:rounded md:shadow-md md:bg-white md:px-4 md:py-6 md:mt-10 border-b-4 border-slate-400">
          <h2 class="font-bold text-xl leading-9 mb-2 tracking-wide ">Important note about</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="flex mt-4 justify-center items-center">
             <!-- <Link type="button" name="button"  method="get"> -->
                <button type="button" @click="open()" name="button" class="py-3 px-4 bg-purple-800 text-white leading-9 tracking-wide">Take test</button>
             <!-- </Link> -->
          </div>
       </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'

    export default defineComponent({
        props: ['sessions'],

        components: {
            AppLayout,
            Head,
            Link,
            JetSectionBorder
        },
        methods: {
           open()
           {
             window.open("/test")
           }
        }
    })
</script>
