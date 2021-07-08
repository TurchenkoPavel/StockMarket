<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <strong>OPEN ORDERS</strong>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Symbol</th>
                        <th scope="col">Order</th>
                        <th scope="col">Stop</th>
                        <th scope="col">Limit</th>
                        <th scope="col">Market</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="is_loading">
                        <td colspan="5">
                            <div class="text-center">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Загрузка...</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <template v-else>
                        <tr
                            v-for="(item, idx) in open_orders" :key="item.symbol"
                            class="cursor-pointer"
                            :class="{'table-active': (current_type === 'openOrders' && current_symbol &&  current_symbol.symbol === item.symbol)}"
                            @click="clickOpenOrder(idx, item.symbol, item.order )"
                        >
                            <td scope="row">{{ item.symbol }}</td>
                            <td>{{ item.order }}</td>
                            <td>{{ item.stop }}</td>
                            <td>{{ item.limit }}</td>
                            <td>{{ item.market }}</td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "OpenOrders",
    props: {
        open_orders: {
            type: Array,
            default: () => []
        },
        selected_idx: {
            type: Number,
            default: () => 0
        },
        is_loading: {
            type: Boolean,
            default: () => false
        }
    },
    computed: {
        ...mapGetters({
            current_symbol: 'getSymbol',
            current_type: 'getType',
        }),
    },
    methods: {
        clickOpenOrder(idx, symbol, order ){
            this.$emit('update:selected_idx', idx)
            this.$store.commit('setSymbol', {
                symbol: {
                    symbol: symbol,
                    name: order,
                },
                type: 'openOrders',
            })
        }
    }
}
</script>

<style scoped>
strong {
    font-weight: 800 !important;
    font-size: 19px;
}
</style>
