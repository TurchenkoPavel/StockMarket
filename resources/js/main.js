import { createApp } from 'vue'
import App from './App.vue'
import '../scss/_app.scss';
import HighchartsVue from 'highcharts-vue'
import Highcharts from 'highcharts'
import stockInit from 'highcharts/modules/stock'
import mapInit from 'highcharts/modules/map'


stockInit(Highcharts)
mapInit(Highcharts)

const app = createApp(App);

app.use(HighchartsVue)
app.mount("#app");
