<template>
    <div class="grid border-2 rounded-lg shadow-md place-items-center sm:grid-cols-1 shadow-slate-400">

        <!-- <div class="flex items-center"> -->

            <form class="mb-3" @submit.prevent="submit">
                <div class="flex items-center w-full p-2 text-center uppercase ">Create Animal</div>
               <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.name" />
                    <label for="name">Name</label>
                </span>
                <small v-if="errors.name" id="name-help" class="p-error">errors.name</small>
               </div>
                <div class="flex flex-shrink w-full my-3">
                    <hr>
                </div>
                 <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.description" />
                    <label for="description">Description</label>
                </span>
                <small v-if="errors.description" id="name-help" class="p-error">errors.description</small>
               </div>
               <div class="flex flex-shrink w-full my-3">
                    <hr>
                </div>
                 <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.species" />
                    <label for="species">Species</label>
                </span>
                <small v-if="errors.species" id="name-help" class="p-error">errors.species</small>
                <div class="flex flex-shrink w-full my-3">
                    <hr>
                </div>
                 <FileUpload mode="basic" type="file" @input="form.avatar = $event.target.files[0]"  />

                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                    </progress>
                <div class="flex flex-shrink w-full my-3">
                    <hr>
                </div>
                <Button
                 class="text-center item-center"
                 type="submit"
                 label="Create"
                 icon="pi pi-check"
                 />
               </div>
            </form>
        <!-- </div> -->

    </div>
</template>

<script>
    import { ref, reactive } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3'
    import Layout from '@/Pages/Layouts/Layout'
    export default {

        props:{
        errors:Object,
       },

       layout:Layout,

        setup(props, context) {
            const form=useForm({name:null,description:null,species:null,avatar:null}) ;

            function submit(){form.post(route('animals.store',{
                                preserveScroll: true,
                                onSuccess: () => form.reset('name','description','species'),
                                }));}
            return {
                form,submit
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>
