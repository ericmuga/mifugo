<template>
    <div>
       <Breadcrumbs :breadcrumbs="breadcrumbs"/>
    </div>

    <div class="grid gap-2 md:grid-cols-2">


    <div class=" sm:invisible md:visible md:col-span-1 md:bg-[url('/images/cow3.png')] rounded-md sm:bg-teal-50 m-5 p-5 shadow-lg bg-cover  shadow-gray-400  md:border-2 md:border-teal-200 ">

    </div>
     <div class="grid min-h-screen col-span-1 place-items-center sm:-mt-8 sm:col-span-1 ">
     <div class="p-4 border-2 rounded-lg border-sky-300 ">
         <div class="w-full p-2 mb-2 text-center uppercase bg-teal-400 rounded">
             Register
         </div>
         <form  @submit.prevent="submit">
              <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-user"></i>
                    </span>
                    <InputText placeholder="Name" v-model="form.name" />
                     <span v-if="errors.name"><p class="text-xs text-red-300">{{errors.name}}</p></span>
                </div>

                <div class="my-2 text-slate-400"><hr></div>

                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-phone"></i>
                    </span>
                    <InputText placeholder="Phone" v-model="form.phone" />
                     <span v-if="errors.phone"><p class="text-xs text-red-300">{{errors.phone}}</p></span>
                </div>
                <div class="my-2 text-slate-400"><hr></div>
                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-envelope"></i>
                    </span>
                    <InputText placeholder="Username" v-model="form.email" />
                     <span v-if="errors.email"><p class="text-xs text-red-300">{{errors.email}}</p></span>
                </div>



                <div class="my-2 text-slate-400"><hr></div>

                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-key"></i>
                    </span>
                    <InputText placeholder="Password" type='password' v-model="form.password" />
                   <span v-if="errors.password"><p class="text-xs text-red-300">{{errors.password}}</p></span>
                </div>

                <div class="my-2 text-slate-400"><hr></div>
                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-key"></i>
                    </span>
                    <Dropdown v-model="form.field_id"
                             :options="fields"
                             optionLabel="name"
                             optionValue="id"
                             :filter="true"
                             placeholder="Select a field"
                             :showClear="true"
                    />
                </div>
                <div class="my-2 text-slate-400"><hr></div>

                 <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-key"></i>
                    </span>
                    <Dropdown v-model="form.type_id"
                             :options="usertypes"
                             optionLabel="name"
                             optionValue="id"
                             :filter="true"
                             placeholder="Select a User Type"
                             :showClear="true"
                    />
                </div>

                <div class="my-2 text-slate-400"><hr></div>


                <div class="flex justify-center space-x-2 p-inputgroup ">

                 <Button
                            label="Register"
                            icon="pi pi-check"
                            class="rounded-sm p-button-info"
                            type="submit"
                            :disabled="(form.name===null)||(form.email===null)||(form.password===null)||(form.processing)"
                            />
                   <!-- <Link href="users/create">
                     <Button label="Register" icon="pi pi-book" class="rounded-sm p-button-info"/>
                  </Link> -->

                </div>

                <!-- <div class="p-inputgroup ">

                </div> -->
         </form>
     </div>
    </div>
    </div>
</template>

<script>
    import { ref, reactive } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3'

    export default {
        props:{
            breadcrumbs:Object,
            errors:Object,
            fields:Object,
            usertypes:Object,
            },

        setup(props, context) {
               const form=useForm({
                email:null,
                password:null,
                field_id:null,
                phone:null,
                name:null,
                type_id:null
            })

            const errors=props.errors;

             function submit()
             {
               form.post(route('users.store'))
             }
            return {
                form,errors,submit
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
