<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import pickBy from 'lodash/pickBy';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        AppLayout,
        Pagination,
        TextInput,
        Link,
    },
    data() {
        return {
            search: this.filters.search,
        }
    },
    props: {
        contacts: {
            type: Object,
            required: true,
        },
        filters: Object,
    },
    watch: {
        search(value) {
            this.$inertia.get('/contacts', pickBy({ search: value }), { preserveState: true });
        }
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

        <div class="container">
            <!-- component -->
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                <div class="px-6 py-4 flex items-center">
                    <TextInput class="flex-1" v-model="search" placeholder="Ingrese texto a filtrar">

                    </TextInput>
                    <Link :href="route('contacts.create')" class="ml-4 flex-shrink-0 btn btn-blue">Nuevo</Link>

                </div>
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="basic-th">Name</th>
                            <th scope="col" class="basic-th">Organization</th>
                            <th scope="col" class="basic-th">City</th>
                            <th scope="col" class="basic-th">Phone</th>
                            <th scope="col" class="basic-th"></th>
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
                <Pagination :pagination="contacts"> </Pagination>
            </div>
        </div>
        <!-- <pre>
            {{ contacts.data }}
        </pre> -->
    </AppLayout>
</template>
<style></style>
