<template>
    <div class="row header-wrap">
        <header class="d-flex flex-wrap align-items-center justify-content-between justify-content-md-between py-3 border-bottom bg-white">
            <a href="/" class="d-flex align-items-center col-md-1 mb-2 mb-md-0 text-dark text-decoration-none position-relative">
                <img src="/public/images/logo.svg" alt="">
<!--                <img src="/images/logo.svg" alt="">-->
            </a>
            <ul class="nav col-auto col-md-auto mb-2 justify-content-center mb-md-0">
                <li><router-link :to="{name: 'Home'}" class="nav-link px-2 link-secondary">Home</router-link></li>
                <li><router-link :to="{name: 'Trading.rules'}" class="nav-link px-2 link-secondary">Trading Rules</router-link></li>
                <li><router-link :to="{name: 'Subscriptions'}" class="nav-link px-2 link-secondary">Subscriptions</router-link></li>
                <li><router-link :to="{name: 'Members'}" class="nav-link px-2 link-secondary">Members</router-link></li>
            </ul>
        </header>
    </div>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style scoped>
.header-wrap {
    z-index: 100;
    top: 0;
}
header {
    background-color: rgb(232, 252, 252) !important;
    height: 110px;
}
a {
  font-size: 27px !important;
}
.router-link-active {
    color: black !important;
    font-weight: 600 !important;
}
img {
    position: absolute;
    top: -87px;
    left: -46px;
    width: 450px;
}
</style>

