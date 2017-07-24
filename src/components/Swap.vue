<template>
  <div class="swap">{{ info }}</div>
</template>

<script>
export default {
  name: 'swap',
  props: {
    info: {
      type: Array,
      required: true
    }
  },
  data () {
    return {

    }
  },
  methods: {

  },
  mounted: function () {
    // this.triggerEvent()
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .swap {

  }
</style>
