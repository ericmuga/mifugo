<template>
    <div class="grid flex-col gap-5 sm:grid-cols-1 md:grid-cols-2 ">


<div class="grid justify-center w-full col-span-1 my-4">
         <!--content -->
          <Link href="/dashboard" class="flex justify-center">
             <Button icon=" pi pi-backward" label="All Animals" class="p-button-outlined p-button-info"/>
          </Link>
            <!-- <div v-for="animal in animals.data" :key="animal.id"> -->
                <AnimalCard :animal="animal.data" >
                    <div class="mt-3 space-x-1">
                        <Link :href="`/animals/${animal.data.id}`">
                        <Button icon="pi pi-bookmark" class="p-button-rounded p-button-warning"/>
                        </Link>
                         <Link :href="`/animals/${animal.data.id}/edit`">
                            <Button icon="pi pi-pencil" class="p-button-rounded p-button-info"  />
                        </Link>
                            <Button icon="pi pi-times" class="p-button-rounded p-button-danger" @click="drop(animal.id)" />
                    </div>
                </AnimalCard>

            <!-- </div> -->
        </div>
    <div  v-if="animal.data.dimensions_count>0" class="flex flex-col w-full col-span-1 p-5 mb-4 rounded-lg shadow-sm shadow-slate-300">
<div class="flex justify-center w-full py-4 mb-3 text-center bg-gray-300 rounded-lg">Animal Posts</div>

        <div class="flex flex-col my-4">
            <div v-for="dimension in dimensionDetails" :key="dimension.id" class="flex">

             <Accordion class="flex">
                   <AccordionTab class="w-full">
                    <template #header>
                        <i class="pi pi-calendar"></i>
                        <span>{{dimension.name}}</span>
                    </template>
                    <div class="flex grid w-full place-items-center sm:grid-cols-1 md:grid-cols-2 ">
                            <Link
                            class="flex "
                            :href="`${animal.data.id}/dimensions/${dimension.id}/posts/create`"
                            >
                                <Button  label="Add Post"></Button>
                            </Link>
                            <SpacedRule/>

                             <div v-if="dimensionPosts(dimension.name).length>0">
                                 <div v-for="post in dimensionPosts(dimension.name)" :key="post.id">
                                  <PostCard :post=post />
                            </div>
                            </div>

                    </div>
                </AccordionTab>
            </Accordion>

        </div>


        </div>

    </div>

    </div>
</template>

<script>
    import { ref, reactive,watch, computed, onMounted } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3'
    import Layout from '@/Pages/Layouts/Layout'
    import AnimalCard from '@/components/AnimalCard'
    import PostCard from '@/components/PostCard'
    import Accordion from 'primevue/accordion';
    import AccordionTab from 'primevue/accordiontab';

import { Inertia } from '@inertiajs/inertia';
import  debounce  from "lodash/debounce";
import SpacedRule from '../../components/SpacedRule.vue';
    export default {

        props:{
        errors:Object,
        animal:Object,
        posts:Object,
        search:String,
       },

       layout:Layout,
       components:{
           AnimalCard,
           PostCard,
           Accordion,
           AccordionTab,
              SpacedRule
       },

        setup(props, context) {

            //onMounted(()=>{console.log(animal.data.dimensions.dimensions[0].name)})

            const dimensionDetails=props.animal.data.dimensions.dimensions;
              onMounted(()=>{console.log(dimensionDetails)})
           const form=useForm({name:null,description:null,species:null,avatar:null}) ;
            let searchKey=ref(props.search)
            const animal=props.animal
            const showLink='/animals/'+animal.data.id
            const createPost= route('posts.create')

            function dimensionPosts(id){
               //let posts=props.posts
               return Object.values(props.posts.data).filter((el)=>el.dimension===id)
            }

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
                form,submit,searchKey,showLink,drop,createPost,dimensionDetails,dimensionPosts
           }
        }
    }
</script>

<style lang="scss" scoped>

</style>
