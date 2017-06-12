<template>
  <div>{{ letter }}</div>
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

    }
  },
  methods: {

  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
