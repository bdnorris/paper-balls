<template>
  <div id="app">
    <!-- <img src="./assets/logo.png"> -->
    <!-- <hello></hello> -->
    <balls :balls="balls"></balls>
    <!-- <button type="button" name="add" class="dial" v-on:click="addComponent">Add</button>
    <button type="button" name="remove" class="dial" v-on:click="removeComponent">Remove</button> -->
    <div class="controls">
      <input type="range" v-model.number="balls" min="0" max="30" step="1" name="" value="1" />
      <p>{{ balls }}</p>
    </div>
  </div>
</template>

<script>
// import Sheet from './components/Sheet'
import Balls from './components/Balls'

export default {
  name: 'app',
  data () {
    return {
      balls: 1
    }
  },
  components: {
    Balls
  },
  methods: {
    addComponent: function () {
      this.balls++
      // console.log(this.balls)
    },
    removeComponent: function () {
      this.balls--
      // console.log(this.balls)
    }
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
  background: #3a3c3d url('assets/hip-square_i.png') repeat top left;
  /* ========================================================
  This pattern is downloaded from www.subtlepatterns.com
  If you need more, that's where to get'em.
  ========================================================*/
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
  .controls {
    background-color: #333;
    padding: 1em;
    border-radius: 0.333em;
    p {
      color: #999;
      margin: 0.333em 0 0 0;
    }
  }
}
input[type="range"] {
  z-index: 10;
}
</style>
