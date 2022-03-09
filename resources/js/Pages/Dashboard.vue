<template>
    <app-layout title="Dashboard" :userInfo="user">

        <div class="bg-slate-200">
            <div class="">
                <div class="">
                    <welcome :userInfo="user"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        props:['user'],
        components: {
            AppLayout,
            Welcome
        },
    })
</script>
