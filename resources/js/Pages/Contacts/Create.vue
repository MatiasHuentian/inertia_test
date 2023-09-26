<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';

export default {
    components: {
        AppLayout,
        TextInput,
        ValidationErrors,
    },
    data() {
        return {
            contact: {
                first_name: '',
                last_name: '',
                organization_id: '',
                email: '',
                phone: '',
                address: '',
                city: '',
                state: '',
                country_id: '',
                postal_code: '',
            }
        }
    },
    props: {
        organizations: Array,
        countries: Array,
    },
    methods: {
        store() {
            this.$inertia.post(this.route('contacts.store'), this.contact);
        },
    }
}
</script>
<template>
    <AppLayout title="Contactos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contactos Crear
            </h2>
        </template>

        <div class="container py-12">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3"> <span class="text-indigo-500"> Contacts /</span> Create
            </h1>
            <div class="bg-white px-6 py-8 rounded-lg shadow">
                <ValidationErrors :errors="this.$page.props.errors" />
                <!-- <div v-if="Object.keys(this.$page.props.errors).length > 0" class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            <li v-for="error in this.$page.props.errors" >{{ error }}</li>
                        </ul>
                    </div>
                </div> -->

                <!-- <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span :key="'errors-' + error" class="font-medium" >
                        {{ error }}
                    </span>
                </div> -->


                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label>
                            First Name
                            <TextInput v-model="contact.first_name" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            Last Name
                            <TextInput v-model="contact.last_name" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            Organization
                            <select v-model="contact.organization_id" class="w-full form-input">
                                <option value="" selected disabled>Seleccione una opción</option>
                                <option v-for="organization in organizations" :value="organization.id"
                                    :key="'organization-' + organization.id">
                                    {{ organization.name }}
                                </option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <label>
                            Email Name
                            <TextInput v-model="contact.email" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            Phone
                            <TextInput v-model="contact.phone" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            Address
                            <TextInput v-model="contact.address" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            City
                            <TextInput v-model="contact.city" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            State
                            <TextInput v-model="contact.state" class="w-full"></TextInput>
                        </label>
                    </div>
                    <div>
                        <label>
                            Country
                            <!-- <TextInput v-model="contact.country_id" class="w-full"></TextInput> -->
                            <select v-model="contact.country_id" class="w-full form-input">
                                <option value="" selected disabled>Seleccione una opción</option>
                                <option v-for="country in countries" :value="country.id" :key="'country-' + country.id">
                                    {{ country.name }}
                                </option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <label>
                            Postal code
                            <TextInput v-model="contact.postal_code" class="w-full"></TextInput>
                        </label>
                    </div>
                </div>
                <div class="flex justify-end mt-3">
                    <button class="btn btn-indigo" @click="store">
                        Guardar
                    </button>
                </div>
            </div>
        </div>


</AppLayout></template>
<style></style>
