<template>
  <div class="flex flex-col justify-center">
      <div class="p-5 rounded-md shadow shadow-slate-300">
       <img class="" :src="animal.url" alt="" >
        <div class="px-2 py-4">
            <div class="text-lg tracking-wide text-center rounded-lg shadow shadow-slate-300 ">
                <table class="min-w-full text-sm divide-y text-light">

                    <tbody class="">
                    <tr >
                        <td class="text-white uppercase bg-teal-700">Name</td>
                        <td class="bg-slate-400 whitespace-nowrap hover:bg-slate-300">
                        <div class="text-sm text-black capitalize">{{animal.name}}</div>
                        </td>
                    </tr>

                    <tr >
                        <td class="text-white uppercase bg-teal-700">Description</td>
                        <td class="whitespace-nowrap bg-slate-400 hover:bg-slate-300">
                        <div class="text-xs text-black capitalize">{{animal.description}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-white uppercase bg-teal-700">Species</td>
                        <td class="capitalize whitespace-nowrap bg-slate-400 hover:bg-slate-300">
                        {{ animal.species }}
                        </td>

                    </tr>

                    <tr>
                        <td class="text-white uppercase bg-teal-700">Dimensions</td>
                        <td class="capitalize whitespace-nowrap bg-slate-400 hover:bg-slate-300">
                        {{ animal.dimensions_count }}
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- </div> -->
      <!-- </div> -->
    <!-- </div> -->
  <!-- </div> -->





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
         <p class="flex justify-center mt-4 text-sm capitalize text-light">Last Updated: {{animal.last_updated}}</p>

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
