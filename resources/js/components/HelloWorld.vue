<template>
  <div class="chartElem container py-4">
    <div class="row">
      <div class="col-12">
        <tradingView :options="tradingOptions"></tradingView>
      </div>
      <div class="col-12">
        <highcharts v-if="ohlc.length > 0" class="stock" :constructor-type="'stockChart'" :options="stockOptions2"></highcharts>
      </div>
      <div class="col-12 my-4">
        <highcharts v-if="dataStock2.length > 0" class="stock" :constructor-type="'stockChart'" :options="stockOptions"></highcharts>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import tradingView from "./TradingView";
export default {
  name: 'HelloWorld',
  components: {
    tradingView
  },
  data: () => ({
    tradingOptions:  {
      "width": 980,
      "height": 610,
      "symbol": "NASDAQ:AAPL",
      "interval": "D",
      "timezone": "Etc/UTC",
      "theme": "light",
      "style": "1",
      "locale": "ru",
      "toolbar_bg": "#f1f3f6",
      "enable_publishing": false,
      "allow_symbol_change": true,
      "container_id": "tradingview_a2b70"
    },
    title: '',
    numNum: Number,
    durationOptions: [0, 500, 1000, 2000],
    points: [10, 0, 8, 2, 6, 4, 5, 5],
    chartType: 'Spline',
    seriesColor: '#6fcd98',
    colorInputIsSupported: null,
    animationDuration: 1000,
    updateArgs: [true, true, {duration: 1000}],
    ohlc:[],
    volume: [],
    dataLength: 0,
    dataStock2: [],
    i: 0,
    groupingUnits: [[
      'week',                         // unit name
      [1]                             // allowed multiples
    ], [
      'month',
      [1, 2, 3, 4, 6]
    ]]
  }),
  computed: {
    stockOptions() {
      return {
        title: {
          text: 'AAPL stock price by minute'
        },

        subtitle: {
          text: 'Using ordinal X axis'
        },

        xAxis: {
          gapGridLineWidth: 0
        },

        rangeSelector: {
          buttons: [{
            type: 'hour',
            count: 1,
            text: '1h'
          }, {
            type: 'day',
            count: 1,
            text: '1D'
          }, {
            type: 'all',
            count: 1,
            text: 'All'
          }],
          selected: 1,
          inputEnabled: false
        },

        series: [{
          name: 'AAPL',
          type: 'area',
          data: this.dataStock2,
          gapSize: 5,
          tooltip: {
            valueDecimals: 2
          },
          fillColor: {
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
            stops: [
              [0, '#7cb5ec'],
              [1, 'rgba(124,181,236,0)']
            ]
          },
          threshold: null
        }]
      }
    },
    stockOptions2() {
      return {
        chart: {
          height: 600,
        },
        rangeSelector: {
          selected: 1
        },

        title: {
          text: 'AAPL Historical'
        },

        yAxis: [{
          labels: {
            align: 'right',
            x: -3
          },
          title: {
            text: 'OHLC'
          },
          height: '60%',
          lineWidth: 2,
          resize: {
            enabled: true
          }
        }, {
          labels: {
            align: 'right',
            x: -3
          },
          title: {
            text: 'Volume'
          },
          top: '65%',
          height: '35%',
          offset: 0,
          lineWidth: 2
        }],

        tooltip: {
          split: true
        },

        series: [{
          type: 'candlestick',
          name: 'AAPL',
          data: this.ohlc,
          dataGrouping: {
            units: this.groupingUnits
          }
        }, {
          type: 'column',
          name: 'Volume',
          data: this.volume,
          yAxis: 1,
          dataGrouping: {
            units: this.groupingUnits
          }
        }]
      }
    }
  },
  created () {
    this.getStockPriceData();
    this.getStockPrice2Data();
  },

  methods: {
    async getStockPriceData(){
      const { data } = await axios.get('https://demo-live-data.highcharts.com/aapl-ohlcv.json')
      this.dataLength = data.length;
      let i = 0;
      for (i; i < this.dataLength; i += 1) {
        this.ohlc.push([
          data[i][0], // the date
          data[i][1], // open
          data[i][2], // high
          data[i][3], // low
          data[i][4] // close
        ]);

        this.volume.push([
          data[i][0], // the date
          data[i][5] // the volume
        ]);
      }
    },
    async getStockPrice2Data(){
      const { data } = await axios.get('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/new-intraday.json')
      this.dataStock2 = data;
    },
  }
}
</script>

<style scoped>

</style>
