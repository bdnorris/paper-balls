<template>
  <div class="content" v-on:click="wrap">
    <h1>{{ msg }}</h1>
    <h2>Web <swap info="['Designer', 'Developer']"></swap></h2>
  </div>
</template>

<script>
import Swap from './Swap'

export default {
  name: 'sheet',
  components: {
    Swap
  },
  data () {
    return {
      msg: 'Brian Norris'
    }
  },
  props: {

  },
  methods: {
    wrap: function (event) {
      event.target.style.backgroundColor = 'white'
    },
    wrap2: function (direction, event) {
      let numFrames = 6
      let frameHeight = 150 // pixels
      // let direction = direction
      let newFrameHeight = ''
      // if (Number.isInteger(numFrames)) {
      if (direction === 'forwards') {
        newFrameHeight = frameHeight
      } else if (direction === 'reverse') {
        numFrames = numFrames - 1
        newFrameHeight = (0 - frameHeight * numFrames)
      } else {}
      for (let i = 0; i <= numFrames; i++) {
        // (function(i){
        window.setTimeout(function () {
          // console.log('frameHeight: ' + newFrameHeight + '...' + i)
          // $(jQObj).css('background-position', '0 '+newFrameHeight+'px')
          event.target.style.backgroundPosition = '0 ' + newFrameHeight + 'px'
          if (direction === 'forwards') {
            newFrameHeight = newFrameHeight - frameHeight
          } else if (direction === 'reverse') {
            newFrameHeight = newFrameHeight + frameHeight
          } else {}
        }, i * 80)
      }
      // }
    }
  },
  mounted: function () {

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

$base-a: 11;
$base-b: 8.5;

.content {
  $factor: 8;
  background-color: transparent;
  border: 1px solid white;
  width: $base-b * $factor + vw;
  height: $base-a * $factor + vw;
  margin: 0 auto;
  flex: 0 1 auto;
  text-align: left;
  padding: 2em;
}

@media screen and (min-width: 960px) {
  .content {
    $factor: 5;
    width: $base-a * $factor + vw;
    height: $base-b * $factor + vw;
  }
}

h1 {
  font-size: 3.333em;
}

h1, h2 {
  font-weight: normal;
  margin: 0 0 0.5em 0;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
