<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components:{
        AppLayout,
    },
    props: {
        contact: {
            type: Object,
            required:true,
        }
    }
}
</script>
<template>
    <AppLayout title="Contactos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contactos Editar
            </h2>

            {{ contact }}

        </template>
    </AppLayout>

</template>
<style>

</style>
