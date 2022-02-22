<template>
  <!-- <div
    class="relative flex flex-col w-full min-w-0 break-words bg-white rounded-lg shadow-xl"
  > -->
    <div class="grid min-w-full px-6 place-items-center">
      <div class="flex flex-wrap justify-center">
        <div class="flex justify-center w-full ">
          <div class="relative">
            <img
              alt="..."
              :src="animal.url"
              class="w-40 h-40 align-middle border-none rounded-full shadow-xl"
            />
          </div>
        </div>
        <div class="w-full px-4 text-center">
          <div class="flex justify-center ">
            <div class="p-3 mr-4 text-center">
                Posts
              <span
                class="block text-xl font-bold tracking-wide uppercase text-blueGray-600"
              >
                {{animal.posts_count}}
              </span>

            </div>
          </div>
        </div>
      </div>
      <div class="mt-12 text-center">
        <h3
          class="mb-2 text-xl font-semibold leading-normal text-blueGray-700"
        >
         {{animal.name}}
        </h3>
        <div
          class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400"
        >
          <i class="mr-2 text-lg fas fa-map-marker-alt text-blueGray-400"></i>
          {{animal.description}}
        </div>
        <div class="mt-10 mb-2 text-blueGray-600">
          <i class="mr-2 text-lg fas fa-briefcase text-blueGray-400"></i>
          {{animal.species}}
        </div>
        <!-- <div class="mb-2 text-blueGray-600">
          <i class="mr-2 text-lg fas fa-university text-blueGray-400"></i>
          University of Computer Science
        </div> -->
      </div>
      <!-- <div class="py-10 mt-10 text-center border-t border-blueGray-200">
        <div class="flex flex-wrap justify-center">
          <div class="w-full px-4 lg:w-9/12">
            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
              An artist of considerable range, Jenna the name taken by
              Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and
              records all of his own music, giving it a warm, intimate feel with
              a solid groove structure. An artist of considerable range.
            </p>
            <a href="javascript:void(0);" class="font-normal text-emerald-500">
              Show more
            </a>
          </div>
        </div>
      </div> -->
    </div>
  <!-- </div> -->
</template>
<script>
import { onMounted } from '@vue/runtime-core'
// import team2 from "../../img/team-3-800x800.jpg";

// import Layout from '../Pages/Dashboard/Admin.vue'

export default {
 props:{
     animal:Object,
 },


     setup(props){

        //  const animal=props.animal

        //  return{animal}


     }


}
</script>
