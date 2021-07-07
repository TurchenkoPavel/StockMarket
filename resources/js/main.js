import { createApp } from 'vue'
import App from './App.vue'
import '../scss/_app.scss';
import bootstrap from 'bootstrap';
// import HighchartsVue from 'highcharts-vue'
// import Highcharts from 'highcharts'
// import stockInit from 'highcharts/modules/stock'
// import mapInit from 'highcharts/modules/map'
import router from './router'
import store from './store'
import Notifications from '@kyvg/vue3-notification'
import { FontAwesomeIcon } from './plugins/fontawesome';
import './plugins/axios';

// stockInit(Highcharts)
// mapInit(Highcharts)

const app = createApp(App).component('fa', FontAwesomeIcon);

// app.use(HighchartsVue)
app.use(router)
app.use(store)
app.use(Notifications)
app.mount("#app");
