<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <strong>SUBSCRIPTIONS</strong>
            </div>
            <div class="card-body">
                <div v-if="is_loading" class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div v-else class="accordion accordion-flush" id="accordion-subscriptions">
                    <div v-for="(item, idx) in info" :key="idx" class="accordion-item">
                        <h2 class="accordion-header" :id="'heading-subscriptions-' + idx">
                            <button
                                class="accordion-button collapsed fw-bolder"
                                type="button" data-bs-toggle="collapse"
                                :data-bs-target="'#collapse-subscriptions-' + idx"
                                aria-expanded="false"
                                :aria-controls="'collapse-subscriptions-' + idx"
                            >
                                {{ item.name }}
                            </button>
                        </h2>
                        <div
                            :id="'collapse-subscriptions-' + idx"
                            class="accordion-collapse collapse"
                            :aria-labelledby="'heading-subscriptions-' + idx"
                            data-bs-parent="#accordion-subscriptions"
                        >
                            <div class="accordion-body">
                                <p v-for="(descriptopn, index ) in item.descriptopn.split('\n')" :key="index" class="mb-0">
                                    {{descriptopn}}
                                </p>
                                <p class="fw-bolder">Price {{ item.price }}$</p>
                                <p class="fw-bolder mb-0">
                                    <a :href="item.link" target="_blank">Link</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Subscriptions",
    data: () => ({
        info: [],
        is_loading: false,
    }),
    created() {
        this.is_loading = true;
        axios.get('/api/get-subscription').then(response => {
            this.info = response.data;
        }).finally(() => {this.is_loading = false;});
    }
}
</script>

<style scoped>
strong {
    font-weight: 800 !important;
    font-size: 19px;
}

.accordion.accordion-flush {
    background-color: rgb(126, 176, 186);
}
.accordion.accordion-flush button{
    color: rgb(232, 252, 252) !important;
}
.accordion.accordion-flush .accordion-body{
    background-color: rgb(232, 252, 252);
}
</style>
