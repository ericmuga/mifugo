import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
// import dayjs from 'dayjs'
 import PrimeVue from 'primevue/config'
 import InputText from 'primevue/inputtext'
 import Toast from 'primevue/toast'
 import Button from 'primevue/button'
 import 'primevue/resources/themes/saga-blue/theme.css'       //theme
 import 'primevue/resources/primevue.min.css'                 //core css
 import 'primeicons/primeicons.css'
 import SelectButton from 'primevue/selectbutton';                        //icons
 import Dropdown from 'primevue/dropdown';
 import Checkbox from 'primevue/checkbox';
//  import Breadcrumb from 'primevue/breadcrumb';\
import Breadcrumbs from '@/components/Breadcrumbs.vue'
import FileUpload from 'primevue/fileupload';
import Avatar from 'primevue/avatar';
import AvatarGroup from 'primevue/avatargroup';
import MultiSelect from 'primevue/multiselect';
import Pagination from '@/components/Pagination.vue'

import route from "ziggy";
import ToastService from 'primevue/toastservice';
import {  Ziggy } from './ziggy';

createInertiaApp({

    title: (title) => `${title}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        const VueApp = createApp({ render: () => h(app, props) });

        // VueApp.config.globalProperties.$date = dayjs;
         VueApp.config.globalProperties.$route = route;

        VueApp.use(plugin)
             .component("Link",Link)
             .component("Head",Head)
            .use(PrimeVue)
            .use(ToastService)
            .component('InputText',InputText)
            .component('Button',Button)
            .component('Dropdown',Dropdown)
            // .component('Breadcrumb',Breadcrumb)
            .component('Checkbox',Checkbox)
            .component('Avatar',Avatar)
            .component('AvatarGroup',AvatarGroup)
            .component('Toast',Toast)
            .component('Breadcrumbs',Breadcrumbs)
            .component('Pagination',Pagination)
            .component('FileUpload',FileUpload)
            .component('MultiSelect',MultiSelect)
            .mixin({ methods: { route: (name, params, absolute) => route(name, params, absolute, Ziggy) } })
            .mount(el);
    },
});
InertiaProgress.init()
