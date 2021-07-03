<template>
  <div class="container-fluid wrap-content position-relative">
      <Header class="position-fixed w-100"></Header>
      <Content class="mt-3"></Content>
      <Footer></Footer>
  </div>
</template>

<script>
import Header from './components/Header.vue'
import Footer from "./components/Footer";
import Content from "./components/Content";
export default {
  name: 'App',
    components: {
        Content,
        Footer,
        Header,
    }
}
</script>
<style>

.wrap-content {
    padding-top: 78px;
}
</style>
