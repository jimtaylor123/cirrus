import Vue from 'vue';
import router from './router';
import App from './components/App';
import Moment from 'moment';

require('./bootstrap');

Vue.prototype.$moment = Moment

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
    router
});