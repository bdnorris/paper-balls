<template>
  <div id="app">
    <!-- <img src="./assets/logo.png"> -->
    <!-- <hello></hello> -->
    <balls></balls>
    <sheet></sheet>
  </div>
</template>

<script>
import Sheet from './components/Sheet'
import Balls from './components/Balls'

export default {
  name: 'app',
  components: {
    Sheet,
    Balls
  }
}
</script>

<style lang="scss">
html {
  height: 100%;
  box-sizing: border-box;
}
*, *:before, *:after {
  box-sizing: inherit;
}
body {
  background: #3a3c3d url('assets/pink_dust.png') repeat top left;
  background-attachment: fixed;
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: 'Fira Mono', monospace;
}
#app {
  // font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  height: 100%;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  align-items: center;
  align-content: center;
  padding: 2em;
}
</style>
