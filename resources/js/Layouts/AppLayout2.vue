<template id="">

</template>
<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
export default defineComponent({
    props: {
        title: String,
        userInfo: Object
    },

    components: {
        Head,
        // JetApplicationMark,
        // JetBanner,
        // JetDropdown,
        // JetDropdownLink,
        // JetNavLink,
        // JetResponsiveNavLink,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },

    methods: {
        // switchToTeam(team) {
        //     this.$inertia.put(route('current-team.update'), {
        //         'team_id': team.id
        //     }, {
        //         preserveState: false
        //     })
        // },
        //
        // logout() {
        //     this.$inertia.post(route('logout'));
        // },
    }
})
</script>
