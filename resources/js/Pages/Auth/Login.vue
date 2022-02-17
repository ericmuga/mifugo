<template>
    <div class="grid min-h-screen place-items-center bg-[url('/images/livestock.jpg')] sm:scale-75 md:transform-none">
     <div class="border-2 border-sky-300 p-4 rounded-lg ">
         <div class="w-full bg-teal-400 uppercase text-center p-2 rounded mb-2">
             Mifugo App
         </div>
         <form  @submit.prevent="submit">
              <div class="p-inputgroup">
                    <span class="p-inputgroup-addon">
                        <i class="pi pi-user"></i>
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
                  <div>
                      <Checkbox v-model="form.remember" :binary="true" /> <label for="remember" class="text-slate-100">Remember Me</label>
                 <div class="text-slate-400 my-2"><hr></div>
                  </div>
                <div class="p-inputgroup space-x-2 flex justify-center ">

                 <Button
                            label="Login"
                            icon="pi pi-arrow-circle-right"
                            class="p-button-success rounded-sm"
                            type="submit"
                            :disabled="((form.email===null)&&(form.password===null))||(form.processing)"
                            />

                  <Button label="Register" icon="pi pi-book" class="p-button-info rounded-sm"/>


                </div>

                <!-- <div class="p-inputgroup ">

                </div> -->
         </form>
     </div>
    </div>
</template>

<script>
import { ref, reactive } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3'
    export default {
      props:{
          errors:Object
      },

        setup(props, context) {

            const form=useForm({
                email:null,
                password:null,
                remember:false,
            })

            const errors=props.errors;

             function submit()
             {
               form.post(route('login.store'))
             }
            return {
                form,errors,submit
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
