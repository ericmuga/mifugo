<template>
  <div class="flex flex-col justify-center">
      <div class="p-5 rounded-md shadow shadow-slate-300">

        <div v-for="medium in post.data.media" :key="medium.id">
            <img class="" :src="media.slug" alt="" >
            <p>{{medium.description}}</p>
        </div>

       <!--
        <div class="px-2 py-4">
            <div class="text-lg tracking-wide text-center rounded-lg shadow shadow-slate-300 ">
                <table class="min-w-full text-sm divide-y text-light">

                    <tbody class="">
                    <tr >
                        <td class="text-white uppercase bg-teal-700">Name</td>
                        <td class="bg-slate-400 whitespace-nowrap hover:bg-slate-300">
                        <div class="text-sm text-black capitalize">{{post.Title}}</div>
                        </td>
                    </tr>

                    <tr >
                        <td class="text-white uppercase bg-teal-700">Description</td>
                        <td class="whitespace-nowrap bg-slate-400 hover:bg-slate-300">
                        <div class="text-xs text-black capitalize">{{post.description}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-white uppercase bg-teal-700">Species</td>
                        <td class="capitalize whitespace-nowrap bg-slate-400 hover:bg-slate-300">
                        {{ post.species }}
                        </td>

                    </tr>

                    <tr>
                        <td class="text-white uppercase bg-teal-700">Dimensions</td>
                        <td class="capitalize whitespace-nowrap bg-slate-400 hover:bg-slate-300">
                        {{ post.dimensions_count }}
                        </td>

                    </tr>
                    </tbody>
                </table>
                 </div> -->
      <!-- </div> -->
    <!-- </div> -->
  <!-- </div> -->





 </div>


   </div>
      <!-- <div class="flex items-center justify-center space-x-5 ">
         <slot/>


      </div>

         <p class="flex justify-center mt-4 text-sm capitalize text-light">Last Updated: {{post.last_updated}}</p>

      </div>

  </div> -->
  </template>
<script>
import { computed, onMounted } from '@vue/runtime-core'


export default {
 props:{
    post:Object,
 },
     //showLink(id)=computed(()=>)

     setup(props){

        //  const post=props.post

        //  return{post}


     }


}
</script>
