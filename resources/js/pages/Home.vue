<template>
    <div>
        Home
    </div>
</template>

<script>
import HelloWorld from '../components/HelloWorld.vue'
import Sidebar from '../components/Sidebar.vue'

export default {
    name: "Home",
    components: {
        HelloWorld,
        Sidebar,
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
