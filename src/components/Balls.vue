<template>
  <div class="balls">
    <dot myid="one">1</dot>
    <dot myid="two">2</dot>
    <dot myid="three">3</dot>
  </div>
</template>

<script>
import Dot from './Dot'

import * as PIXI from 'pixi.js'

export default {
  name: 'balls',
  data () {
    return {
      // msg: 'Welcome to Your Vue.js App'
      // position: [top, left]
      // top: 0 + 'px',
      // left: 0 + 'px'
      position: {
        top: 0 + 'px',
        left: 0 + 'px',
        timing: 1 + 's'
      }
    }
  },
  components: {
    Dot
  },
  props: {

  },
  methods: {
    tryPixi: function () {
      var renderer = PIXI.autoDetectRenderer(
        256, 256,
        {antialias: false, transparent: false, resolution: 1}
      )
      // Add the canvas to the HTML document
      document.body.appendChild(renderer.view)
      // Create a container object called the `stage`
      var stage = new PIXI.Container()
      // Tell the `renderer` to `render` the `stage`

      // var ball = new PIXI.Sprite(
      //   PIXI.loader.resources['./assets/LayeredPaperBall_reel_resized.png'].texture
      // )
      // stage.addChild(ball)

      var circle = new PIXI.Graphics()
      circle.beginFill(0x9966FF)
      circle.drawCircle(0, 0, 32)
      circle.endFill()
      circle.x = 64
      circle.y = 130
      stage.addChild(circle)
      renderer.render(stage)
    }
  },
  mounted: function () {
    this.tryPixi()
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
