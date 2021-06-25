<template>
  <div class="d-flex flex-column flex-shrink-0 bg-light">

    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="#" class="nav-link  py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <BIconHouseDoor class="icons-size"> </BIconHouseDoor>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <BIconGraphUp class="icons-size"> </BIconGraphUp>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
          <BIconSpeedometer2 class="icons-size"></BIconSpeedometer2>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
          <BIconTable class="icons-size"></BIconTable>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
          <BIconGrid class="icons-size"></BIconGrid>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
          <BIconPersonCircle class="icons-size"></BIconPersonCircle>
        </a>
      </li>
    </ul>
    <div class="dropdown border-top">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
import { BIconHouseDoor, BIconSpeedometer2, BIconTable , BIconGrid, BIconPersonCircle, BIconGraphUp } from 'bootstrap-icons-vue';
export default {
  name: "Sidebar",
  components: {
    BIconHouseDoor,
    BIconSpeedometer2,
    BIconTable,
    BIconGrid,
    BIconPersonCircle,
    BIconGraphUp,
  }
}
</script>

<style scoped>
.icons-size {
  font-size: 24px;
}
</style>
