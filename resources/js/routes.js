import Example from './components/ExampleComponent.vue';
import Create from './components/payment/Create.vue';
import Confirmation from './components/payment/Confirmation.vue';

export const routes = [
    {
        name: 'home',
        path: '/a',
        component: Example
    },
    {
        name:'create',
        path: '/create',
        component: Create
    },
    {
        name:'confirmation',
        path: '/confirmation',
        component: Confirmation
    },
];