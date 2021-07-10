<template>
    <tr @click="chooseSymbol"
        class="cursor-pointer"
        :class="{'table-active': (current_type === 'marketTrend'  && current_symbol &&  current_symbol.symbol === symbol)}">
        <td scope="row" >{{ symbol }}</td>
        <td>{{ (name_symbol) ? name_symbol : (info.long_name) ? info.long_name : info.short_name }}</td>
        <td>{{ info.price.fmt }}</td>
        <td class="text-right" :class="(info.change_percent.fmt.includes('-')) ? 'text-danger' : 'text-success'">{{ info.change_percent.fmt }}</td>
    </tr>
</template>

<script>
import axios from "axios";
import {mapGetters} from "vuex";

export default {
    name: "MarketActionTableRow",
    props: {
        symbol: String,
        name_symbol: String,
        symbol_trading_view: String,
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
    }),
    created() {
        axios.post('/api/get-symbol-info', {symbol: this.symbol}).then(response => {
            this.info = response.data;
        });
    },
    computed: {
        ...mapGetters({
            current_symbol: 'getSymbol',
            current_type: 'getType',
        }),
    },
    methods: {
        chooseSymbol(){
            this.$store.commit('setSymbol', {
                symbol: {
                    symbol: this.symbol,
                    symbol_trading_view: this.symbol_trading_view,
                    name: this.name_symbol,
                },
                type: 'marketTrend',
            })
        }
    }
}
</script>

<style scoped>
.text-right {
    text-align: right;
}
</style>
