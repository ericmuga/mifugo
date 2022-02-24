<template>
    <div class="grid mx-5 my-10 border-2 rounded-lg shadow-md place-items-center sm:grid-cols-1 shadow-slate-400">

        <!-- <div class="flex items-center"> -->

            <form class="p-5 m-4" @submit.prevent="submit">
              <div class="grid items-center w-full mx-5 my-6 text-center uppercase place-content-center ">Create Post</div>

               <div class="field">
                   <span class="p-float-label">
                        <InputText  type="text" v-model="form.title" />
                        <label for="title">Title</label>
                    </span>
                    <small v-if="errors.title" id="title-help" class="p-error">errors.title</small>
               </div>

               <div class="my-2 text-slate-400"><hr></div>

                 <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.dimension" />
                    <label for="dimension">Dimension</label>
                   </span>
                   <small v-if="errors.dimension" id="title-help" class="p-error">errors.dimension</small>
                 </div>

                 <div class="my-2 text-slate-400"><hr></div>
                    <div class="p-inputgroup">
                        <span class="p-inputgroup-addon">
                            <i class="pi pi-key"></i>
                        </span>
                        <Dropdown v-model="form.animal_id"
                                :options="animals"
                                optionLabel="name"
                                optionValue="id"
                                :filter="true"
                                placeholder="Select an animal"
                                :showClear="true"
                        />
                    </div>


                  <div class="my-2 text-slate-400"><hr></div>

                         <textarea
                            id="e-textarea"
                            class="w-full"
                            row="100"
                            cols="100"
                            placeholder="Type the body here.."
                        v-model="form.body"
                            >
                            </textarea>
                  <div class="my-2 text-slate-400"><hr></div>
                    <textarea
                            id="e-textarea"
                            class="w-full"
                            row="100"
                            cols="100"
                            placeholder="Type the footer here.."
                        v-model="form.footer"
                            >
                            </textarea>
                  <div class="my-2 text-slate-400"><hr></div>
                        <FileUpload mode="basic" type="file" @input="form.avatar = $event.target.files[0]"  />
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                            </progress>
                    <div class="my-2 text-slate-400"><hr></div>
                        <Button
                        class="text-center item-center"
                        type="submit"
                        label="Create Post"
                        icon="pi pi-check"
                        />

            </form>
        <!-- </div> -->

    </div>
</template>

<script>
    import { ref, reactive } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3'
    import Layout from '@/Pages/Layouts/Layout'
    // import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
    export default {

        props:{
        errors:Object,
        animals:Object,
       },

       layout:Layout,

        setup(props, context) {
            const form=reactive({
                                title:null,
                                dimension:null,
                                animal_id:null,
                                avatar:null,
                                body:'',
                                footer:'',
                                type:'photo',
                                }) ;

            function submit(){Inertia.post(route('posts.store'),form)}

            return {
                form,submit
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>
