<template>
      <div class="flex flex-col w-full p-4 mb-4 bg-slate-200">
        <div>
            <ul class="list-none">
                <li v-for="bc in breadcrumbs" :key="bc.url" class="inline-block mx-2 ">
                    <Link
                    :href="bc.url"

                    class="text-xs font-medium uppercase"
                    >
                    {{bc.title}}
                    <span v-if="index != Object.keys(breadcrumbs).length - 1">/</span>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
   props:{
       breadcrumbs:Object,
   },

   setup(props){
       const breadcrumbs= props.breadcrumbs;
       return {breadcrumbs}

   }
}
</script>
