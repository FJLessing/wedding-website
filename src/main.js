import Vue from 'vue';
import App from './App.vue';
import './styles/styles.scss';
// import './registerServiceWorker';
import router from './router';
import store from './store';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.config.productionTip = false
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBC1_4waw1Q--XyOzF_vUAXTnm7stzLJdQ'
  }
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
