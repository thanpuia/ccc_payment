import Example from './components/ExampleComponent.vue';
import Create from './components/payment/Create.vue';

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
    
];