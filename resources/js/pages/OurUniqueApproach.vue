<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <strong>UNIQUE APPROACH</strong>
            </div>
            <div class="card-body">
                <div v-if="is_loading" class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div v-else class="accordion accordion-flush" id="accordion-unique-approach">
                    <div v-for="(item, idx) in info.filter(item => item.answer !== '' && item.question !== '')" :key="idx" class="accordion-item">
                        <h2 class="accordion-header" :id="'heading-unique-approach-' + idx">
                            <button
                                class="accordion-button collapsed fw-bolder"
                                type="button" data-bs-toggle="collapse"
                                :data-bs-target="'#collapse-unique-approach-' + idx"
                                aria-expanded="false"
                                :aria-controls="'collapse-unique-approach-' + idx"
                            >
                                {{ item.question }}
                            </button>
                        </h2>
                        <div
                            :id="'collapse-unique-approach-' + idx"
                            class="accordion-collapse collapse"
                            :aria-labelledby="'heading-unique-approach-' + idx"
                            data-bs-parent="#accordion-unique-approach"
                        >
                            <div class="accordion-body">
                                <p v-for="(answer, index ) in item.answer.split('\n')" :key="index" class="mb-0">
                                    {{answer}}
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
