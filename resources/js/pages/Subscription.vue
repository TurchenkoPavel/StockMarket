<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                SUBSCRIPTIONS
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                    <tr
                        v-for="(item, idx) in info" :key="idx"
                    >
                        <td scope="row">{{ item.text }}</td>
                        <td>{{ item.link }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Subscription",
    data: () => ({
        info: []
    }),
    created() {
        axios.get('/api/get-subscription').then(response => {
            this.info = response.data;
        });
    }
}
</script>

<style scoped>

</style>
