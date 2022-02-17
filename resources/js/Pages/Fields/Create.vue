<template>
<Breadcrumbs :breadcrumbs="breadcrumbs"/>
    <div class="grid grid-cols-3 mx-10 min-h-screen gap-3">

     <div class="col col-span-1 border  shadow-sky-100 rounded-md bg-[url('/images/cows.jpg')] opacity-70 bg-slate-300 overflow-hidden ">

     </div>
      <!-- List -->
    <div class="col col-span-2">
    <div class=" flex border-2 border-sky-200 shadow-sm shadow-red-50 my-5 rounded-lg py-3 px-3">
        <div class="w-1/2 bg-slate-300 h-full m-5 p-5 relative  flex-shrink shadow-sm shadow-teal-50 block border-2">
               Graph will come here
        </div>



       <div class="flex flex-col flex-shrink flex-grow flex-auto w-1/2">
        <div class=" flex justify-end mb-1 ">
            <InputText v-model="searchKey"
            class=" flex mb-4 h-10 px-5 pr-5 text-black rounded-md bg-slate-100"
            placeholder="Search" />
        </div>



        <table class="mt-3 table-auto flex-shrink">
          <thead class="text-left text-white uppercase bg-teal-500 text-sm w-md ">
            <tr class="">
              <th scope="col" class="px-6 py-3">
                 Name
              </th>
              <th scope="col" class="px-6 py-3">
                 Description
             </th>
             <th scope="col" class="px-6 py-3">
                 Actions
             </th>


            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="item in items.data" :key="item.id" class="hover:bg-slate-200 hover:font-semibold text-sm px-4 py-2 sm:text-xs md:text-sm">
              <td class=" whitespace-nowrap">
                <div class="items-center">

                  <!-- <div class=""> -->
                    <div class="text-sm font-medium text-gray-900">
                      {{item.name}}
                    </div>
                    <!-- <div class="text-sm text-gray-500">
                     { {item.abbreviation}}
                    </div> -->
                  <!-- </div> -->
                </div>
              </td>
              <td class=" whitespace-nowrap">
                <div class="text-sm text-gray-900">{{item.description}}</div>
                <!-- <div class="text-sm text-gray-500">Optimization</div> -->
              </td>
              <!-- <td class="px-4 py-2 whitespace-nowrap">
                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"

                >
                {{item.posting_date}}
                </span>
              </td> -->
              <td class=" whitespace-nowrap">
               <Button
                              class="text-white rounded-md p-button-danger text-xs bg-slate-600"
                                icon="pi pi-times"
                                label="Delete"
                                @click="drop(item.id)"
                              />



              </td>
<!--
              <td class="px-4 py-2 whitespace-nowrap">
               {{item.amount}}
               </td>
                <td class="px-4 py-2 whitespace-nowrap">
               {{item.entry_type}}
               </td>

                <td class="px-4 py-2 whitespace-nowrap">
               {{item.user}}
               </td> -->

            </tr>

            <!-- More people... -->
          </tbody>

        </table>

<div class="p-3 mt-6 text-black">
                        <Link v-for="link in items.meta.links" v-html="link.label" :href="link.url" :key="link.url" preserveScroll class="p-2 border-2 border-white border-sm hover:bg-slate-200 hover:font-bold" >
                        </Link>
            </div>
        </div>
 <!--pagination -->

                  <!--end of pagination -->
      <!--end of list -->
</div>

     <div class="col-span-2 flex justify-center flex-col  border  shadow-sky-100 rounded-md sm:col-span-1 md:col-span-2">
        <div class="border-2 border-sky-300 p-4 rounded-lg ">
         <div class="w-full bg-teal-400 uppercase text-center text-sm p-2 rounded mb-2">
            Add Professional Fields
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
                        <i class="pi pi-book"></i>
                    </span>
                    <InputText placeholder="Description"  v-model="form.description" />
                   <span v-if="errors.description"><p class="text-xs text-red-300">{{errors.description}}</p></span>
                </div>

                <div class="p-inputgroup space-x-2 flex justify-center mt-3">

                 <Button
                            label="Add"
                            icon="pi pi-plus"
                            class="p-button-success rounded-sm"
                            type="submit"
                            :disabled="(form.name===null)||(form.processing)"
                            />

                  <!-- <Button label="Register" icon="pi pi-book" class="p-button-info rounded-sm"/> -->


                </div>

                <!-- <div class="p-inputgroup ">

                </div> -->
         </form>
     </div>
     </div>
    </div>
    </div>
</template>

<script>
    import { ref, reactive,watch } from 'vue';
    import {useForm} from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';
import  debounce  from "lodash/debounce";
    export default {
         props:{
             breadcrumbs:Object,
             errors:Object,
             items:Object,
         },

        setup(props, context) {
             const form=useForm({
                name:null,
                description:null,
                // remember:false,
            })

            const errors=props.errors;
            let searchKey= ref(props.search);
            function drop(id){
               if  (confirm('Are you sure you want to drop this entry?'))
               {
                Inertia.delete(route('fields.destroy',id))
               }
            }

        watch(searchKey,debounce(function(value){
                                               Inertia.get(route('fields.index'),{'search':value},{preserveState:true})
                                               },300))



             function submit()
             {
               form.post(route('fields.store'),{
               preserveScroll: true,
                onSuccess: () => (form.reset('name','description')
                                  )
             })
             }
            return {
                form,errors,submit,drop,searchKey
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
