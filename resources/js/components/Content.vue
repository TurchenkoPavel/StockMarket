<template>
    <div class="content-wrap">
        <div class="row">
            <div class="col-lg-4">
                <market-action/>
            </div>
            <div class="col">
                <router-view/>
            </div>
        </div>
    </div>
</template>

<script>
import MarketAction from "./MarketAction";
export default {
    name: "Content",
    components: {MarketAction}
}
</script>

<style scoped>
.content-wrap{
    min-height: calc(100vh - 165px);
}

</style>
