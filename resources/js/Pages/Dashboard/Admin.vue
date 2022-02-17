<template>
    <div>
        <Breadcrumbs :breadcrumbs="breadcrumbs"/>
        Main Dashboard Content.
    </div>
</template>

<script>
    import { ref, reactive } from 'vue';
    import Layout from '@/Pages/Layouts/Layout'
import Breadcrumbs from '../../components/Breadcrumbs.vue';
    export default {
  components: { Breadcrumbs },
        layout:Layout,
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
