<template>
  <div class="container-fluid wrap-content position-relative">
      <Header class="position-fixed w-100"></Header>
      <router-view/>
  </div>
</template>

<script>
import Header from './components/Header.vue'
export default {
  name: 'App',
    components: {
        Header,
    }
}
</script>
<style>

.wrap-content {
    padding-top: 78px;
}
</style>
