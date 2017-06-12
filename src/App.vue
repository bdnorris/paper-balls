<template>
  <div id="app">
    <!-- <img src="./assets/logo.png"> -->
    <!-- <hello></hello> -->
    <balls></balls>
    <nameplate></nameplate>
  </div>
</template>

<script>
import Nameplate from './components/Nameplate'
import Balls from './components/Balls'

export default {
  name: 'app',
  components: {
    Nameplate,
    Balls
  }
}
</script>

<style lang="scss">
body {
  background: #3a3c3d url('assets/pink_dust.png') repeat top left;
  background-attachment: fixed;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
