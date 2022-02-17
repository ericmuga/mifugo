<template>
  <Head title="Login"/>
    <div class="grid min-h-screen place-items-center">
       <!-- <Breadcrumbs :breadcrumbs=breadcrumbs /> -->

       <div class="flex border-2 rounded-lg p-3"> Hello World</div>
    </div>
</template>

<script>
    import { ref, reactive } from 'vue';


    export default {
       props:{
        breadcrumbs:Object
    },
     setup(props, context) {
            // const featureRef = ref(value);
            // const featureState = reactive({ property: 'value' });

            return {
                // featureRef,
                // featureState
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
