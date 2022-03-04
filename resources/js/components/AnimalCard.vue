<template>
  <div class="flex flex-col justify-center">
      <div class="p-5 rounded-md shadow shadow-slate-300">
       <img class="" :src="animal.url" alt="" >
        <div class="px-6 py-4">
            <div class="text-xl tracking-wide text-center uppercase">{{animal.name}}

                    <p class="text-base text-center text-gray-700">
                        {{animal.description}}
                    </p>

                    <p>Posts</p>
                    <p class="text-base text-gray-700">
                        {{animal.posts_count}}
                   </p>

                   <p>Dimensions</p>
                    <p class="text-base text-gray-700">
                        {{animal.dimensions_count}}
                   </p>

            </div>


   </div>
      <div class="flex items-center justify-center space-x-5 ">
       <slot/>
      </div>
<!--
      <div class="flex items-center justify-center space-x-5 ">
        <Link :href="`${animal.id}/edit`">
           <Button icon="pi pi-pencil" class="p-button-rounded" />
        </Link>
        <Button @click="drop()" icon="pi pi-times" class="p-button-rounded p-button-danger" />

        </div> -->

      </div>
  </div>
  </template>
<script>
import { computed, onMounted } from '@vue/runtime-core'
// import team2 from "../../img/team-3-800x800.jpg";

// import Layout from '../Pages/Dashboard/Admin.vue'

export default {
 props:{
     animal:Object,
 },
     //showLink(id)=computed(()=>)

     setup(props){

        //  const animal=props.animal

        //  return{animal}


     }


}
</script>
