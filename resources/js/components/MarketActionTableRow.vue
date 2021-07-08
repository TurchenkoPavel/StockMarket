<template>
    <tr>
        <td scope="row">{{ symbol }}</td>
        <td>{{ (name_symbol) ? name_symbol : (info.long_name) ? info.long_name : info.short_name }}</td>
        <td>{{ info.price.fmt }}</td>
        <td class="text-right" :class="(info.change_percent.fmt.includes('-')) ? 'text-danger' : 'text-success'">{{ info.change_percent.fmt }}</td>
    </tr>
</template>

<script>
import axios from "axios";

export default {
    name: "MarketActionTableRow",
    props: {
        symbol: String,
        name_symbol: String,
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
    }
}
</script>

<style scoped>
.text-right {
    text-align: right;
}
</style>
