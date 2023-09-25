<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue';

export default {
    components: {
        AppLayout,
        Pagination,
    },
    props: {
        contacts: {
            type: Object,
            required: true,
        },
    }
}
</script>
<template>
    <AppLayout title="Contactos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contactos
            </h2>
        </template>

        <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8">
            <!-- component -->
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Organization</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">City</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <tr class="hover:bg-gray-50" v-for="contact in contacts.data" :key="'contacts-' + contact.id">
                            <td class="px-6 py-4">{{ contact.first_name + ' ' + contact.last_name }}</td>
                            <td class="px-6 py-4">{{ contact.organization.name }}</td>
                            <td class="px-6 py-4">{{ contact.city }}</td>
                            <td class="px-6 py-4">{{ contact.phone }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a x-data="{ tooltip: 'Delete' }" href="#">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a x-data="{ tooltip: 'Edite' }" href="#">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <Pagination />
            </div>

        </div>

        <pre>
            {{ contacts.data }}
        </pre>
    </AppLayout>
</template>
<style></style>
