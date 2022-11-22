<template>
  <div id="arcade-free-games" v-if="$store.state.initialised">
    <o-library />
  </div>
</template>

<script>
import oLibrary from '../organisms/o-library.vue';

export default {
  name: 'free-games',
  components: {
    oLibrary,
  },
};
</script>

<style lang="scss">
#arcade-free-games {
  max-width: 1170px;
  margin: 0 auto;
  background: white;
}
</style>
