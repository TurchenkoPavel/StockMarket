<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <strong>TRADE SETUP</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <table v-if="current_type === 'openOrders'" class="table">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row " class="symbol-size">{{ symbol }}</th>
                                    <td> {{ info.long_name }} </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fs-3"> {{ info.currency_symbol }}{{ info.price.fmt }}</th>
                                    <td class="fs-4" :class="{'text-danger': info.change.raw < 0, 'text-success': info.change.raw > 0}">
                                        {{ info.change.fmt }}
                                        <fa v-if="info.change.raw > 0" icon="arrow-up"></fa>
                                        <fa v-if="info.change.raw < 0" icon="arrow-down"></fa>
                                        {{ info.change_percent.fmt }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Sector</th>
                                    <td> {{info.sector}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Industry</th>
                                    <td> {{info.industry}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Market cap</th>
                                    <td> {{info.market_cap.fmt}} </td>
                                </tr>
                                <tr>
                                    <td colspan="2" v-if="trade_setup">
                                        <span class="fw-bolder">Trade Setup: </span>
                                        <p v-for="(trade, index ) in trade_setup.split('\n')" :key="index" class="mb-0">
                                            {{trade}}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table v-else-if="current_type === 'marketTrend'" class="table">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row " class="symbol-size">{{ current_symbol.symbol }}</th>
                                    <td> {{ current_symbol.name }} </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fs-3"> {{ info.currency_symbol }}{{ info.price.fmt }}</th>
                                    <td class="fs-4" :class="{'text-danger': info.change.raw < 0, 'text-success': info.change.raw > 0}">
                                        {{ info.change.fmt }}
                                        <fa v-if="info.change.raw > 0" icon="arrow-up"></fa>
                                        <fa v-if="info.change.raw < 0" icon="arrow-down"></fa>
                                        {{ info.change_percent.fmt }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-8 trading-view-chart"><trading-view v-if="symbol" :options="result_options"/></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TradingView from "./TradingView";
import axios from "axios";
import { mapGetters } from 'vuex';
export default {
    name: "TradeSetup",
    components: {TradingView},
    props: {
        symbol: {
            type: String
        },
        trade_setup: {
            type: String
        }
    },
    data: () => ({
        info: {
            short_name: '',
            long_name: '',
            sector: '',
            industry: '',
            market_cap: {raw: null, fmt: '', longFmt: ''},
            change: {raw: null, fmt: ''},
            change_percent: {raw: null, fmt: ''},
            price: {raw: null, fmt: ''},
            currency_symbol: '',
            currency: '',
        },
        trading_options:  {
            "autosize": true,
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "light",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
        },
    }),
    computed: {

        ...mapGetters({
            current_symbol: 'getSymbol',
            current_type: 'getType',
        }),
    },
    created() {
        this.getData();
    },
    methods: {
        getData(symbol) {
            if(this.symbol) {
                this.info = {
                    short_name: '',
                    long_name: '',
                    sector: '',
                    industry: '',
                    market_cap: {raw: null, fmt: '', longFmt: ''},
                    change: {raw: null, fmt: ''},
                    change_percent: {raw: null, fmt: ''},
                    price: {raw: null, fmt: ''},
                    currency_symbol: '',
                    currency: '',
                }
                axios.post('/api/get-symbol-info', {symbol}).then(response => {
                    this.info = response.data;
                });
            }
        }
    },
    watch: {
        symbol(newVal) {
            this.getData(newVal);
            this.result_options = Object.assign({ symbol: this.symbol }, this.trading_options)
        },
        current_symbol: {
            deep: true,
            handler(newVal){
                this.getData(newVal.symbol);
                this.result_options = Object.assign({ symbol: newVal.symbol_trading_view}, this.trading_options)

            }
        }
    }
}
</script>

<style scoped>
.trading-view-chart {
    min-height: 500px;
}

strong {
    font-weight: 800 !important;
    font-size: 19px;
}
.symbol-size {
    font-size: 24px;
}
</style>
