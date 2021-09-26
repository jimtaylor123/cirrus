import Vue from 'vue';

import VueRouter from 'vue-router';

import CustomerList from "./components/CustomerList";
import AccountsList from "./components/AccountsList";
import UsageHistory from "./components/UsageHistory";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
        path: '/', 
            name: 'Home',
            component: CustomerList,
            meta: { title: 'Customer List' }
        },
        {
            path: '/customers/:customerId', 
            name: 'AccountsList',
            component: AccountsList,
            props: true,
            meta: { title: 'Accounts List' }
        },
        {
            path: '/accounts/:accountId', 
            name: 'UsageHistory',
            component: UsageHistory,
            props: true,
            meta: { title: 'Usage History' }
        },
        {path: '*', redirect: '/'}
    ],
    mode: 'history'
});