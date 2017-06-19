<template>
  <div>
    <div class="dot" v-bind:class="{ captured: animating.playable == false }" :id="myid" v-on:manual="startMove" v-on:transitionend="startMove" v-on:click="pause" v-bind:style="[ {top: position.top}, {left: position.left}, {transitionDuration: position.timing} ]"> </div>
  </div>
</template>

<script>
// var dynamics = require('../node_modules/dynamics.js/lib/dynamics.min.js')
// import dynamics from 'App'

// console.log('pixi')
// console.dir(PIXI)

export default {
  name: 'dot',
  props: ['myid'],
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
      },
      animating: {
        playable: true,
        clicked: false
      }
    }
  },
  methods: {

    getRandomIntInclusive: function (min, max) {
      min = Math.ceil(min)
      max = Math.floor(max)
      return Math.floor(Math.random() * (max - min + 1)) + min
    },

    changePos: function () {
      // alert('changePos started')
      let elementSize = 150 * 2
      let wih = window.innerHeight - elementSize
      let wiw = window.innerWidth - elementSize
      let dt = this.getRandomIntInclusive(1, wih)
      let dl = this.getRandomIntInclusive(1, wiw)
      // console.log(wih + ' ' + wiw + ' | ' + dt + ' ' + dl)
      return [dt, dl]
    },

    offset: function (elt) {
      // console.dir(elt)
      let rect = elt.target.getBoundingClientRect
      let bodyElt = document.body
      return {
        top: rect.top + bodyElt.scrollTop,
        left: rect.left + bodyElt.scrollLeft
      }
    },
    calculateTiming: function (newP, left, top) {
      let x = Math.pow(newP[1] - left, 2)
      let y = Math.pow(newP[0] - top, 2)
      let distance = Math.sqrt(x + y)
      return Math.floor(distance / 60)
    },
    startMove: function (event) {
      // alert('startMove started')
      // setInterval( function() {
      // let elem = document.getElementById(event)
      // console.log(elem)
      let currentP = {left: 0, top: 0}
      currentP.left = event.target.offsetLeft
      currentP.top = event.target.offsetTop
      // console.dir(currentP)
      let newP = this.changePos()
      let timing = this.calculateTiming(newP, currentP.left, currentP.top)
      // console.log('timing: ' + timing)

      // $(id).css({ top: newP[0], left: newP[1] });
      // let newSize = this.getRandomIntInclusive(40, 60) + 'px'
      // JQUERY
      // id.toggleClass('try')
      // JQUERY
      // id.animate({
      //   top: newP[0], left: newP[1], width: newSize, height: newSize }, timing, function () {
      //     startMove(id)
      //   })

      // console.log('newP: ' + newP)
      // console.log('newSize: ' + newSize)

      // return {
        // top: newP.top + 'px',
        // left: newP.left + 'px'
      // }
      if (this.animating.playable === true) {
        this.$set(this.position, 'top', newP[0] + 'px')
        this.$set(this.position, 'left', newP[1] + 'px')
        this.$set(this.position, 'timing', timing + 's')
        this.$set(this.animating, 'playable', true)
      }
      // console.log(window.getComputedStyle(event.target).top)
    },
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
    },
    pause: function (event) {
      // let currentPos = {}
      if (this.animating.clicked === false) {
        // currentPos.left = event.target.style.left
        // currentPos.top = event.target.style.top
        this.$set(this.animating, 'playable', false)
        this.$set(this.animating, 'clicked', true)
        // event.target.style.transitionProperty = 'none'
        // this.$set(this.position, 'top', currentPos.top)
        // event.target.top = currentPos.top
        // this.$set(this.position, 'left', currentPos.left)
        // event.target.left = currentPos.left
        // https://codepen.io/Zeaklous/pen/GokAm
        let computedStyle = window.getComputedStyle(event.target)
        // console.dir(computedStyle)
        let left = computedStyle.getPropertyValue('left')
        let top = computedStyle.getPropertyValue('top')
        event.target.style.left = left
        event.target.style.top = top
        // boxOne.classList.remove('horizTranslate');
        // console.log('left: ' + currentPos.left)
        // console.log('top: ' + currentPos.top)
        // console.log('top: ' + this.animating.playing)
        this.wrap('forwards', event)
      } else {
        this.$set(this.animating, 'clicked', false)
        this.startAgain(event)
      }
    },
    startAgain: function (event) {
      this.$set(this.animating, 'playable', true)
      this.wrap('reverse', event)
      this.startMove(event)
    },
    manualE: function () {
      return new Event('manual', {
        'view': window,
        'bubbles': true,
        'cancelable': true
      })
    },
    triggerEvent: function () {
      let manual = this.manualE()
      let dots = document.getElementsByClassName('dot')
      // console.dir(dots)
      for (let i = 0; i < dots.length; i++) {
        dots[i].dispatchEvent(manual)
      }
    }
    // onLoad: function () {
      // let elem = document.getElementById('one')
      // this.startMove(elem)
      // console.log('mounted: ' + elem)
    // }
  },
  mounted: function () {
    this.triggerEvent()
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.dot {
  position: absolute;
  top: 1em;
  left: 1em;
  width: 150px;
  height: 150px;
  background-color: aqua;
  //border-radius: 1.5em;
  text-align: center;
  padding-top: 1em;
  box-sizing: border-box;
  cursor: pointer;
  //top: 0;
  //left: 0;
  // transition: background-color 200ms ease-in, width 200s ease-in, height 200s ease, transform 500ms ease;
  transition: left 1s ease, top 1s ease, transform 1s linear;
  animation-name: rotate;
  animation-duration: 4000ms;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-fill-mode: forwards;
  animation-delay: 0s;
  overflow: visible;
  // transform: rotate(0deg);
  transform-style: preserve-3d;
  background-image: url('../assets/LayeredPaperBall_reel_resized.png');
  background-repeat: no-repeat;
  background-position: 0 0;
  background-size: cover;
  width: 150px;
  height: 150px;
  transform: rotate(0.1deg);
  // transition: transform 1s ease-out;
  &.captured {
    // background-color: gray !important;
    // animation-play-state: paused;
    // transform: rotate(45deg);
    animation-play-state: paused;
    // animation-name: rotateBack;
    // animation-duration: 2s;
    // animation-timing-function: linear;
    // animation-iteration-count: 1;
    // animation-fill-mode: forwards;
    // animation-delay: 0s;
    // transition: transform 1s ease;
  }
  &:hover {
    //transform: none;
  }
  //position: absolute;
  // background-color: pink;
  background-color: transparent;
  //top: -1em;
  //right: -1em;
}

// #one {
//   background-color: aqua;
// }
// #two {
//   background-color: pink;
// }
// #three {
//   background-color: green;
// }



@keyframes rotate {
  from {
    transform: rotate(-180deg);
  }
  to {
    transform: rotate(180deg);
  }
}

@keyframes rotateBack {
  from {
    transform: initial;
  }
  to {
    transform: rotate(0deg);
  }
}

@keyframes move {
  from {
    left: 0;
    top: 0;
  }
  to {
    left: 0;
    top: 0;
  }
}
</style>
