<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                TRADE SETUP
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ symbol }}</th>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="col-8"><trading-view v-if="symbol" :options="result_options"/></div>
                </div>
                <div class="row mt-2">
                    <div class="col"><p><span class="fw-bolder">Trade Setup: </span>{{ trade_setup }}</p></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TradingView from "./TradingView";
import axios from "axios";
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
        result_options() {
            return Object.assign({ symbol: this.symbol }, this.trading_options)
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
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
                axios.post('/api/get-symbol-info', {symbol: this.symbol}).then(response => {
                    this.info = response.data;
                });
            }
        }
    },
    watch: {
        symbol() {
            this.getData();
        }
    }
}
</script>

<style scoped>

</style>
