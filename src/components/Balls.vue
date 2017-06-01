<template>
  <div class="balls">
    <dot myid="one">1</dot>
    <dot myid="two">2</dot>
  </div>
</template>

<script>
import Dot from './Dot'

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

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.dot {
  position: relative;
  width: 50px;
  height: 50px;
  background-color: aqua;
  //border-radius: 1.5em;
  text-align: center;
  padding-top: 1em;
  box-sizing: border-box;
  cursor: pointer;
  //top: 0;
  //left: 0;
  // transition: background-color 200ms ease-in, width 200s ease-in, height 200s ease, transform 500ms ease;
  transition: left 1s ease, top 1s ease;
  animation-name: rotate;
  animation-duration: 4000ms;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-fill-mode: forwards;
  animation-delay: 0s;
  overflow: visible;
  transform: rotate(0deg);
  transform-style: preserve-3d;
  // transition: transform 1s ease-out;
  &.try {
    // transform: rotate(1turn);
  }
  &.captured {
    background-color: gray !important;
    animation-play-state: paused;
    // transform: rotate(45deg);
    // animation-play-state: paused;
  }
  &:hover {
    //transform: none;
  }
  //position: absolute;
  background-color: pink;
  //top: -1em;
  //right: -1em;
}

#one {
  background-color: aqua;
}
#two {
  background-color: pink;
}
#three {
  background-color: green;
}



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
</style>
