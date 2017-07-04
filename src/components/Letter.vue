<template>
  <div class="letter" v-on:manual="startMove" >{{ letter }}</div>
</template>

<script>
export default {
  name: 'letter',
  props: {
    letter: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      animating: {
        playable: true,
        clicked: false
      }
    }
  },
  methods: {

    wrap: function (direction, event) {
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
    this.triggerEvent()
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .letter {
    
  }
</style>
