<template>
  <div>
    <Header class="position-fixed w-100"></Header>
    <div class="d-flex wrap-content">
      <Sidebar class="sidebar"  style="width: 2.5rem;"></Sidebar>
      <HelloWorld class="flex-grow-1"/>
    </div>
  </div>
</template>

<script>
import Header from './components/Header.vue'
import HelloWorld from './components/HelloWorld.vue'
import Sidebar from './components/Sidebar.vue'

export default {
  name: 'App',
  components: {
    Header,
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
