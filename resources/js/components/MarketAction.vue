<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <strong>MARKET TREND</strong>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-auto">
                        <fa v-if="state === 'Uptrend'" icon="arrow-alt-circle-up" class="text-success display-5"/>
                        <fa v-if="state === 'Downtrend'" icon="arrow-alt-circle-down" class="text-danger display-5"/>
                        <fa v-if="state === 'Sideways'" icon="arrows-alt-h" class="text-primary display-5"/>
                    </div>
                    <div class="col align-self-center fs-4 symbol-size"><b >{{ state }}</b></div>
                </div>
                <div v-if="info" class="card-text">
                    <p v-for="(infos, index ) in info.split('\n')" :key="index" class="mb-0">
                        {{ infos }}
                    </p>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Symbol</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Change</th>
                    </tr>
                    </thead>
                    <tbody>
                    <market-action-table-row v-for="item in symbols"
                                             :key="item.symbol"
                                             :symbol="item.symbol"
                                             :name_symbol="item.name"
                                             :symbol_trading_view="item.same_symbol_in_tradingview">
                    </market-action-table-row>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import MarketActionTableRow from "./MarketActionTableRow";

export default {
    name: "MarketAction",
    components: {MarketActionTableRow},
    data: () => ({
        state: null,
        info: null,
        symbols: []
    }),
    created() {
        axios.get('/api/get-market-state').then(response => {
            this.state = response.data.state;
            this.info = response.data.info;
        });
        axios.get('/api/get-market-action-symbols').then(response => {
            this.symbols = response.data;
        });
    }
}
</script>

<style scoped>
strong {
    font-weight: 800 !important;
    font-size: 19px;
}
.symbol-size b{
    color: rgb(108, 117, 125);
    font-weight: 700 !important;
    font-size: 24px !important;
}
</style>
