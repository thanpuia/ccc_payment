import Example from './components/ExampleComponent.vue';
import Create from './components/payment/Create.vue';
import Confirmation from './components/payment/Confirmation.vue';
import PaymentList from './components/payment/PaymentList.vue';
import Login from './components/Auth/Login.vue';

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
    {
        name:'payment_list',
        path: '/payment-list',
        component: PaymentList
    },
    {
        name:'login',
        path: '/loginp',
        component: Login
    },
];