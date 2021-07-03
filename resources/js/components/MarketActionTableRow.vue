<template>
    <tr>
        <td scope="row">{{ symbol }}</td>
        <td>{{ info.long_name }}</td>
        <td>{{ info.price.fmt }}</td>
        <td>{{ info.change_percent.fmt }}</td>
    </tr>
</template>

<script>
import axios from "axios";

export default {
    name: "MarketActionTableRow",
    props: {
        symbol: String
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

</style>
