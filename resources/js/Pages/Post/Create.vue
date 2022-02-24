<template>
    <div class="grid border-2 rounded-lg shadow-md place-items-center sm:grid-cols-1 shadow-slate-400">

        <!-- <div class="flex items-center"> -->

            <form class="p-2 text-center" @submit.prevent="submit">
              <div class="grid items-center mb-5 text-center uppercase place-content-center ">Create Post</div>

               <div class="field">
                   <span class=" p-float-label">
                        <InputText  type="text" v-model="form.title" />
                        <label for="title" class="w-full -ml-2 text-center">Title</label>
                    </span>
                    <small v-if="errors.title" id="title-help" class="p-error">errors.title</small>
               </div>

               <div class="my-4 text-slate-400"><hr></div>

                 <div class="field">
                   <span class="p-float-label">
                    <InputText  type="text" v-model="form.dimension" />
                    <label for="dimension"  class="w-full -ml-2 text-center">Dimension</label>
                   </span>
                   <small v-if="errors.dimension" id="title-help" class="p-error">errors.dimension</small>
                 </div>

                 <div class="my-4 text-slate-400"><hr></div>
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

                   <div class="my-4 text-slate-400"><hr></div>

                         <textarea
                            id="e-textarea"
                            class="w-full border-2 border-slate-200"
                            rows="20"
                            cols="50"

                            placeholder="Type the body here.."
                        v-model="form.body"
                            >
                            </textarea>
                  <div class="my-4 text-slate-400"><hr></div>
                    <textarea
                            id="e-textarea"
                            class="w-full border-2 border-slate-200"
                            rows="5"
                            cols="50"
                            placeholder="Type the footer here.."
                        v-model="form.footer"
                            >
                            </textarea>
                  <div class="my-4 text-slate-400"><hr></div>
                        <FileUpload mode="basic" type="file" @input="form.avatar = $event.target.files[0]"  />
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                            </progress>
                            <div class="my-4 text-slate-400"><hr></div>
                             <div class="field">
                                <span class="p-float-label">
                                    <InputText  type="text" v-model="form.media_description" />
                                    <label for="dimension"  class="w-full -ml-2 text-center">Media Description</label>
                                </span>
                                <small v-if="errors.media_description" id="title-help" class="p-error">errors.media_description</small>
                            </div>


                    <div class="my-4 text-slate-400"><hr></div>
                        <Button
                        class="text-center item-center"
                        type="submit"
                        label="Create Post"
                        icon="pi pi-check"
                        />
                    <div class="my-4 text-slate-400"><hr></div>
            </form>
        <!-- </div> -->

    </div>
</template>

<script>
    import { ref, reactive } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3'
    import Layout from '@/Pages/Layouts/Layout'
    // import { reactive } from 'vue'
    import { usePage } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
    export default {

        props:{
        errors:Object,
        animals:Object,
        },

       layout:Layout,

        setup(props, context) {
            //   const user = computed(() => usePage().props.value.auth.user)
            const form=reactive({
                                title:null,
                                dimension:null,
                                animal_id:null,
                                avatar:null,
                                body:'',
                                footer:'',
                                type:'photo',
                                media_description:null,
                                // user_id:user.id
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
