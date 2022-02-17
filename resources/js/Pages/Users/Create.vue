<template>
    <div>
       <Breadcrumbs :breadcrumbs="breadcrumbs"/>
    </div>

    <div class="grid grid-cols-2 gap-2">


    <div class="col-span-1 bg-[url('/images/cow3.png')] m-5 p-5 shadow-lg bg-cover  shadow-gray-400  border-2 border-teal-200 ">

    </div>
     <div class="grid  col-span-1 min-h-screen place-items-center  -mt-8">
     <div class="border-2 border-sky-300 p-4 rounded-lg ">
         <div class="w-full bg-teal-400 uppercase text-center p-2 rounded mb-2">
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

                <div class="text-slate-400 my-2"><hr></div>

                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-phone"></i>
                    </span>
                    <InputText placeholder="Phone" v-model="form.phone" />
                     <span v-if="errors.phone"><p class="text-xs text-red-300">{{errors.phone}}</p></span>
                </div>
                <div class="text-slate-400 my-2"><hr></div>
                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-envelope"></i>
                    </span>
                    <InputText placeholder="Username" v-model="form.email" />
                     <span v-if="errors.email"><p class="text-xs text-red-300">{{errors.email}}</p></span>
                </div>



                <div class="text-slate-400 my-2"><hr></div>

                <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-key"></i>
                    </span>
                    <InputText placeholder="Password" type='password' v-model="form.password" />
                   <span v-if="errors.password"><p class="text-xs text-red-300">{{errors.password}}</p></span>
                </div>

                <div class="text-slate-400 my-2"><hr></div>
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
                <div class="text-slate-400 my-2"><hr></div>

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

                <div class="text-slate-400 my-2"><hr></div>


                <div class="p-inputgroup space-x-2 flex justify-center ">

                 <Button
                            label="Register"
                            icon="pi pi-check"
                            class="p-button-info rounded-sm"
                            type="submit"
                            :disabled="(form.name===null)||(form.email===null)||(form.password===null)||(form.processing)"
                            />
                   <!-- <Link href="users/create">
                     <Button label="Register" icon="pi pi-book" class="p-button-info rounded-sm"/>
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
