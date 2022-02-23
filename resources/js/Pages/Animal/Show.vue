<template>
    <div class="grid flex-col sm:grid-cols-1 md:grid-cols-3 ">
      <div class="flex justify-center col-span-1 mb-2 space-x-4 ">
          <Link href="/dashboard">
             <Button icon=" pi pi-backward" label="All Animals" class="p-button-outlined p-button-info"/>
          </Link>
      </div>

     <div class="max-w-sm col-span-1 overflow-hidden rounded-md shadow-lg shadow-slate-400">


        <img class="w-full" :src="animal.data.url" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="mb-2 text-xl font-bold tracking-wide text-center uppercase">{{animal.data.name}}</div>
            <p class="text-base text-center text-gray-700">
             {{animal.data.description}}
           </p>
            <p class="text-base text-gray-700">
             {{animal.data.posts_count}}
           </p>

        </div>

        <div class="px-6 pt-4 pb-2">
            <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#photography</span>
            <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#travel</span>
            <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#winter</span>
        </div>
        <div class="flex items-center justify-center mb-5 space-x-5 ">
        <Button icon="pi pi-pencil" class="p-button-rounded" />
        <Button icon="pi pi-times" class="p-button-rounded p-button-danger" />

        </div>

    </div>

    <!--animal Posts begin here -->

    <div class="w-full col-span-1 p-3 mt-2 rounded-md shadow-md shadow-slate-400">
         <div class="flex justify-end mb-1 ">
            <InputText v-model="searchKey"
            class="flex h-10 px-5 pr-5 mb-4 text-black rounded-md bg-slate-100"
            placeholder="Search" />
        </div>
        <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <!-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th> -->
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Dimension</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">type</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Actions</th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="post in posts.data" :key="post.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <!-- <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full" :src="post.image" alt="" />
                    </div> -->
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ post.dimension }}
                      </div>
                      <!-- <div class="text-sm text-gray-500">
                        {{ post.type }}
                      </div> -->
                    </div>
                  </div>
                </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ post.type }}</div>
                  <!-- <div class="text-sm text-gray-500">{{ post.department }}</div> -->
                </td>
                <!--
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"> Active </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                  {{ post.role }}
                </td> -->
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

    </div>
    </div>
</template>

<script>
    import { ref, reactive,watch, computed } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3'
    import Layout from '@/Pages/Layouts/Layout'
    import AnimalCard from '@/components/AnimalCard'

import { Inertia } from '@inertiajs/inertia';
import  debounce  from "lodash/debounce";
    export default {

        props:{
        errors:Object,
        animal:Object,
        posts:Object,
        search:String,
       },

       layout:Layout,
       components:{
           AnimalCard
       },

        setup(props, context) {
            const form=useForm({name:null,description:null,species:null,avatar:null}) ;
            let searchKey=ref(props.search)
            const animal=props.animal
            const showLink='/animals/'+animal.data.id

        watch(searchKey,debounce(function(value){
                                               Inertia.get(showLink,{'search':value},{preserveState:true,preserveScroll:true})
                                               },300))
            function submit(){form.post(route('animals.store',{
                                preserveScroll: true,
                                onSuccess: () => form.reset('name','description','species'),
                                }));}
            return {
                form,submit,searchKey,showLink
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>
