<template>
  <ul class="m-game-list">
    <li v-for="game in games" :key="game.id">
      <m-game-card :game="game" />
    </li>
  </ul>
</template>

<script>
import mGameCard from '../molecules/m-game-card.vue';

export default {
  name: 'm-game-list',
  components: {
    mGameCard,
  },
  props: {
    games: {
      type: Array,
      required: true,
    },
  },
};
</script>
