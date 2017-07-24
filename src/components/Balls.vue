<template>
  <div class="balls">
    <dot myid="one">1</dot>
    <!-- <dot myid="two">2</dot>
    <dot myid="three">3</dot> -->
  </div>
</template>

<script>
import Dot from './Dot'

export default {
  name: 'balls',
  data () {
    return {
      position: {
        top: 0 + 'px',
        left: 0 + 'px',
        timing: 1 + 's'
      }
    }
  },
  components: {
    Dot
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.balls {

}
</style>
