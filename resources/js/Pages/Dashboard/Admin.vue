<template>
 <Head title="Dashboard" />
    <div>
        <Breadcrumbs :breadcrumbs="breadcrumbs"/>
      </div>
      <!--controls -->

      <div class="flex items-end justify-end w-full py-2 mb-3 mr-10 space-x-4 rounded-md bg-slate-300-border-2">
         <Button
       icon="pi pi-plus"
       label="Add Animal"
       severity="danger"
       type="button"
       class="flex flex-shrink"
      />
      <span class="float-right p-input-icon-right">
                <i class="pi pi-search" />
                <InputText
                    icon="pi pi-search"
                    class="flex justify-end"
                    placeholder="Search"
                />
            </span>

      </div>
      <!--end of controls -->
    <div class="flex rounded-lg shadow-sm shadow-gray-600">


        <div class="m-3 rounded-lg ">
         <!-- Sidebar -->
        <!-- <Sidebar /> -->

        <!-- <div class="flex flex-col justify-center w-full rounded-lg shadow-sm">
            <ul class="">
                <li class="w-full">
                    <Button type="button"
                            label="Animals"
                            icon="pi pi-book"
                            class="p-button-warning"
                            :badge=totalAnimals
                            badgeClass="p-badge-danger" /> </li>
               <div class="w-full pb-2"> <hr></div>
                <li>
                     <Button
                         type="button"
                         label="Posts"
                          icon="pi pi-github"
                          class="p-button-warning"
                          :badge=totalPosts
                          badgeClass="p-badge-danger" /> </li>
                <li>Seccond</li>
                <li>Third</li>
                <li>Fourth</li>
            </ul>
        </div> -->

        </div>



        <div class="grid w-full gap-3 p-5 mx-4 my-4 border-2 rounded-md shadow-lg lg:grid-cols-3 md:grid-cols-1 shadow-gray-600 border-sky-400 ">
         <!--content -->

            <div v-for="animal in animals.data" :key="animal.id">
                    <div class="flex p-5 border-gray-300 rounded-md shadow-md shadow-slate-500 border-1">
                        <AnimalCard :animal="animal" />
                    </div>
            </div>
        </div>
    </div>
    <div class="w-full">
                            <Pagination  :items="animals"/>
    </div>
</template>

<script>
    import { ref, reactive } from 'vue';
    import Layout from '@/Pages/Layouts/Layout'
    import Sidebar from '@/components/Sidebar2'
    import AnimalCard from '@/components/AnimalCard'
import Pagination from '../../components/Pagination.vue';
// import Breadcrumbs from '../../components/Breadcrumbs.vue';
    export default {
         props:{ breadcrumbs:Object,
                 animals:Object,
                 totalAnimals:Object,
                 totalPosts:Object,

         },
         components:{
           Sidebar,
           AnimalCard,
                  Pagination
         },
        layout:Layout,
        setup(props, context) {
            // const breadcrumbs=props.breadcrumbs
            // const featureRef = ref(value);
            // const featureState = reactive({ property: 'value' });

            return {
                // breadcrumbs
                // featureRef,
                // featureState
            }
        }
    }
</script>

<style lang="scss" scoped>


</style>
