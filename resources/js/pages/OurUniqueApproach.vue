<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <strong>UNIQUE APPROACH</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
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
                        <tr v-for="(item, idx) in info" :key="idx">
                            <td scope="row">{{ item.text }}</td>
                            <td><a :href="item.link" target="_blank">Link</a></td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "OurUniqueApproach",
    data: () => ({
        info: [],
        is_loading: false,
    }),
    created() {
        this.is_loading = true;
        axios.get('/api/get-unique-approach').then(response => {
            this.info = response.data;
        }).finally(() => {this.is_loading = false;});
    }
}
</script>

<style scoped>
strong {
    font-weight: 800 !important;
}
</style>
