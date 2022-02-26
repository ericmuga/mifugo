<template>
 <Head title="Dashboard" />
    <div>
        <Breadcrumbs :breadcrumbs="breadcrumbs"/>
      </div>
      <!--controls -->

      <div class="flex justify-end rounded-md">



      <span class="">
          <div class="flex flex-col items-center justify-center">


           <Link href="/animals/create">
                <Button
                    icon="pi pi-user-plus"
                    label="Add"
                    severity="danger"
                    type="button"
                    class="block object-scale-down mb-2"
                />

         </Link>
                <InputText

                    class="block my-4"
                    placeholder="Search"
                    v-model="search"
                /></div>
            </span>

      </div>
      <!--end of controls -->
    <!-- <div class="flex rounded-lg shadow-sm shadow-gray-600"> -->


        <!-- <div class="m-3 rounded-lg ">


        </div> -->



        <div class="grid w-full gap-3 my-4 lg:grid-cols-3 md:grid-cols-2 ">
         <!--content -->

            <div v-for="animal in animals.data" :key="animal.id">






                      <div class="flex py-2 border-2 border-gray-300 rounded-md shadow-slate-500 border-1">

                        <AnimalCard :animal="animal" >
                            <div class="mt-3 space-x-1">


                             <Link :href="`/animals/${animal.id}`">
                                <Button icon="pi pi-bookmark" class="p-button-rounded p-button-warning"/>
                             </Link>
                               <!-- <div class="flex"> -->
                             <Link :href="`/animals/${animal.id}/edit`">
                                 <Button icon="pi pi-pencil" class="p-button-rounded p-button-info"  />
                             </Link>
                                    <Button icon="pi pi-times" class="p-button-rounded p-button-danger" @click="drop(animal.id)" />
                               <!-- </div> -->

                             <!-- <div class="flex"> -->
                             <!-- </div> -->


                            </div>
                        </AnimalCard>

                    </div>
            </div>
        </div>

    <div class="w-full">
                            <Pagination  :items="animals"/>
    </div>
</template>

<script>
    import { ref, reactive, watch } from 'vue';
    import Layout from '@/Pages/Layouts/Layout'
    import Sidebar from '@/components/Sidebar2'
    import AnimalCard from '@/components/AnimalCard'
import Pagination from '../../components/Pagination.vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from 'lodash/debounce'
// import Breadcrumbs from '../../components/Breadcrumbs.vue';
    export default {
         props:{ breadcrumbs:Object,
                 animals:Object,
                 totalAnimals:Object,
                 totalPosts:Object,
                 search:String
         },
         components:{
           Sidebar,
           AnimalCard,
                  Pagination,

         },
        layout:Layout,
        setup(props, context) {
            // const breadcrumbs=props.breadcrumbs
            // const featureRef = ref(value);
            // const featureState = reactive({ property: 'value' });

           const search = ref(props.search)

            function drop(id){
                 if (confirm ('Are you sure you want to drop this item?')){
                        Inertia.delete(route('animals.destroy',id))
                 }
            }
           watch(search,debounce(function(value){
                                               Inertia.get(route('dashboard'),{'search':value},{preserveState:true})
                                               },300))

            return {
                search,
                drop
                // breadcrumbs
                // featureRef,
                // featureState
            }
        }
    }
</script>

<style lang="scss" scoped>


</style>
