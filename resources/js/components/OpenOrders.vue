<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                OPEN ORDERS
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Symbol</th>
                        <th scope="col">Order</th>
                        <th scope="col">Stop</th>
                        <th scope="col">Limit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="is_loading">
                        <td colspan="4">
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
                            :class="{'table-active': idx === selected_idx}"
                            @click="$emit('update:selected_idx', idx)"
                        >
                            <td scope="row">{{ item.symbol }}</td>
                            <td>{{ item.order }}</td>
                            <td>{{ item.stop }}</td>
                            <td>{{ item.limit }}</td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
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
    }
}
</script>

<style scoped>

</style>
