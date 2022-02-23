<template>
 <Head title="Dashboard" />
    <div>
        <Breadcrumbs :breadcrumbs="breadcrumbs"/>
      </div>
      <!--controls -->

      <div class="flex items-end justify-end w-full space-x-4 rounded-md bg-slate-300-border-2">



      <span class="float-right p-input-icon-right">
          <div class="flex justify-between space-x-2">


           <Link href="/animals/create">
                <Button
                    icon="pi pi-user-plus"
                    label="Add"
                    severity="danger"
                    type="button"
                    class="flex flex-shrink"
                />
         </Link>
                <InputText
                    icon="pi pi-search"
                    class="flex justify-end"
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
                  <Link :href="`/animals/${animal.id}`"

                           >
                           <div class="justify-end float-right max-w-sm p-3 rounded-md shadow-sm shadow-slate-200 -ml-96 shadow-slate-400">

                            <Button icon="pi pi-bookmark" class="p-button-rounded p-button-secondary" />
                          </div>
                          </Link>





                      <div class="flex p-5 border-2 border-gray-300 rounded-md shadow-slate-500 border-1">

                        <AnimalCard :animal="animal" />
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


           watch(search,debounce(function(value){
                                               Inertia.get(route('dashboard'),{'search':value},{preserveState:true})
                                               },300))

            return {
                search
                // breadcrumbs
                // featureRef,
                // featureState
            }
        }
    }
</script>

<style lang="scss" scoped>


</style>
