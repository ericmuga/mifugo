<template>
    <div class="grid flex-col gap-3 place-items-center sm:grid-cols-1 md:grid-cols-3 ">
      <div class="flex justify-center col-span-1 mb-2 ">
          <Link href="/dashboard">
             <Button icon=" pi pi-backward" label="All Animals" class="p-button-outlined p-button-info"/>
          </Link>
      </div>

     <div class="col-span-1 rounded-md shadow-lg shadow-slate-400">


        <img class="" :src="animal.data.url" alt="{{animal.data.description}}">
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
        <Link :href="`${animal.data.id}/edit`">
           <Button icon="pi pi-pencil" class="p-button-rounded" />
        </Link>
        <Button @click="drop()" icon="pi pi-times" class="p-button-rounded p-button-danger" />

        </div>

    </div>

    <!--animal Posts begin here -->

    <div class="object-scale-down col-span-1 p-3 mt-2 overflow-scroll rounded-md shadow-md shadow-slate-400">
         <div>
             <Link :href="createPost">
               <Button type="button" icon="pi pi-plus" label="Add"></Button>
             </Link>
         </div>

         <div class="flex justify-end mb-1 ">
            <InputText v-model="searchKey"
            class="flex h-10 px-5 pr-5 mb-4 text-black rounded-md bg-slate-100"
            placeholder="Search" />
        </div>
          <table class="">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Dimension</th>
                <th scope="col" class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase sm:hidden">type</th>
                <th scope="col" class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Actions</th>
                <th scope="col" class="relative">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="post in posts.data" :key="post.id">
                <td class="px-6 py-4 whitespace-wrap">
                  <div class="flex items-center">

                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ post.dimension }}
                      </div>

                    </div>
                  </div>
                </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 sm:hidden">{{ post.type }}</div>

                </td>

                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>
            </tbody>
          </table>
          <Pagination :items=posts />


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
            const createPost= route('posts.create')

        function drop(){
              if (confirm('Are you sure you want to drop this animal? The animal\'s post will remain intact :-)'))
              {
                   Inertia.delete(route('animals.destroy',animal.data.id));
              }
         }

        watch(searchKey,debounce(function(value){
                                               Inertia.get(showLink,{'search':value},{preserveState:true,preserveScroll:true})
                                               },300))
            function submit(){form.post(route('animals.store',{
                                preserveScroll: true,
                                onSuccess: () => form.reset('name','description','species'),
                                }));}
            return {
                form,submit,searchKey,showLink,drop,createPost
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>
