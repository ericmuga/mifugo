<template>
    <div class="grid mx-5 my-10 border-2 rounded-lg shadow-md place-items-center sm:grid-cols-1 shadow-slate-400">

        <!-- <div class="flex items-center"> -->

            <form class="p-5 m-4" @submit.prevent="submit">
                <div class="flex items-center w-full mx-5 my-6 text-center uppercase ">Edit Animal</div>
               <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.name" />
                    <label for="name">Name</label>
                </span>
                <small v-if="errors.name" id="name-help" class="p-error">{{errors.name}}</small>
               </div>
               <SpacedRule/>
                 <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.description" />
                    <label for="description">Description</label>
                </span>
                <small v-if="errors.description" id="name-help" class="p-error">{{errors.description}}</small>
               </div>


                <SpacedRule/>
                 <MultiSelect v-model="di" :options="dimensions" optionLabel="name" optionValue="id"  class=" max-h-28" placeholder="Select Dimensions" filter="true" />
               <SpacedRule/>

                 <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.species" />
                    <label for="species">Species</label>
                </span>
                <small v-if="errors.species" id="name-help" class="p-error">{{errors.species}}</small>
                <SpacedRule/>
                 <FileUpload mode="basic" type="file" @input="form.avatar = $event.target.files[0]"  />

                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                    </progress>
               <SpacedRule/>
                <Button
                 class="text-center item-center"
                 type="submit"
                 label="Update"
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
import { Inertia } from '@inertiajs/inertia';
    export default {

        props:{
        errors:Object,
        animal:Object,
        dimensions:Object,
       },

       layout:Layout,

        setup(props, context) {
            // let animal=ref(props.animal)
            const di=ref()
            const form=useForm({name:props.animal.data.name,
                                description:props.animal.data.description,
                                species:props.animal.data.species,
                                avatar:props.animal.data.url,
                                dimension_ids:di}) ;

            function submit(){


                 Inertia.post(route('animals.update',props.animal.data.id),{

                     name:form.name,
                     description:form.description,
                     species:form.species,
                     avatar:form.avatar
                     ,_method:'put'})}
            return {
                form,submit,di
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>
