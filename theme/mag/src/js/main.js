import Vue from 'vue';
import '../libs/bootstrap/js/bootstrap.bundle.min';
import './global';
import axios from 'axios';

axios.defaults.headers['Content-Type'] = 'application/x-www-form-urlencoded';
import axiosMethodOverride from 'axios-method-override';

axiosMethodOverride(axios);
const instance = axios.create();
axiosMethodOverride(instance);
import VueAxios from 'vue-axios';
import store from './store';
import Main from '../vue/main.vue';
import router from './router';
import VuejsDialog from 'vuejs-dialog';
import _ from 'lodash';

Vue.use(VuejsDialog);
Vue.use(VueAxios, axios);

__webpack_public_path__ = PINOOX.URL.THEME + 'dist/';

new Vue({
    el: '#app',
    render: h => h(Main),
    router: router,
    store: store,
});

