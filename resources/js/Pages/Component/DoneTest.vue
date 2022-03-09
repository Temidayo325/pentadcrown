<template id="" class="">
   <Head title="Access Denied"/>
   <div class="bg-slate-400 w-full h-screen flex justify-center items-center">
      <div class="md:mx-auto md:py-12 md:w-7/12 py-12 md:py-24" >
         <img src="image/deny.svg" alt="Congratuations on your test" class="w-72 h-52 my-10 mx-auto md:my-0 md:w-96 md:h-52">
         <h1 class="text-center font-bold text-2xl tracking-wide leading-8 my-5 md:my-8 text-white">Seems you have previosly attempted the pentad crown test</h1>
      </div>
   </div>

</template>
<script>
   import { defineComponent } from 'vue'
   import { Head, Link } from '@inertiajs/inertia-vue3'

   export default defineComponent({
      components: {
         Head, Link
      }
   })
</script>
