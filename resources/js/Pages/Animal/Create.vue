<template>
    <div class="grid border-2 rounded-lg shadow-md place-items-center sm:grid-cols-1 shadow-slate-400">

        <!-- <div class="flex items-center"> -->

            <form class="mb-3" @submit.prevent="submit">
                <div class="flex items-center w-full px-2 py-5 text-center uppercase ">Create Animal</div>
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
                 label="Create"
                 icon="pi pi-check"
                 />
               </div>
            </form>
        <!-- </div> -->

    </div>
</template>

<script>
    import { ref, reactive, watch } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3'
    import Layout from '@/Pages/Layouts/Layout'
    export default {

        props:{
        errors:Object,
        dimensions:Object,
       },


       layout:Layout,

        setup(props, context) {
            const di=ref()
            const form=useForm({name:null,description:null,species:null,avatar:null,dimension_ids:di}) ;

      // watch(di)

            let dimensions=ref(props.dimensions)


            function submit(){form.post(route('animals.store',{
                                preserveScroll: true,
                                onSuccess: () => form.reset('name','description','species'),
                                }));}
            return {
                form,submit,dimensions,di
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>

