<template>
    <div>
        <trade-setup :symbol="selected.symbol" :trade_setup="selected.trade_setup"/>
        <open-orders :open_orders="open_orders" v-model:selected_idx="selected_idx" :is_loading="is_loading"/>
    </div>
</template>

<script>

import TradeSetup from "../components/TradeSetup";
import OpenOrders from "../components/OpenOrders";
import axios from "axios";

export default {
    name: "Home",
    components: {
        OpenOrders,
        TradeSetup,
    },
    data: () => ({
        open_orders: [],
        selected_idx: 0,
        is_loading: false,
    }),
    computed: {
        selected() {
            if (this.open_orders.length > 0) {
                return this.open_orders[this.selected_idx];
            }
            return {};
        },
    },
    created() {
        this.is_loading = true;
        axios.get('/api/get-open-orders').then(response => {
            this.open_orders = response.data;
        }).finally(() => {this.is_loading = false;});
    }
}
</script>

<style class="scss">
    .wrap-content {
        padding-top: 78px;
    }
    .sidebar {
        height: calc(100vh - 78px);
        position: fixed;
        min-width: 72px !important;
        max-width: 72px !important;
    }
</style>
