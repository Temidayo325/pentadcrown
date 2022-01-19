<template>
    <app-layout title="Upload">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Aptitude test
            </h2>
        </template>

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
        props: ['sessions'],

        components: {
            AppLayout,
            // DeleteUserForm,
            JetSectionBorder,
            // LogoutOtherBrowserSessionsForm,
            // TwoFactorAuthenticationForm,
            // UpdatePasswordForm,
            // UpdateProfileInformationForm,
        },
    })
</script>
