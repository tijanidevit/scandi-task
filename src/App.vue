<template>
  <div class="container mt-5">
    <Add />
  </div>
</template>

<script>
import  Add  from './pages/products/Add.vue';

export default {
  name: 'App',
  components: {
    Add
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
