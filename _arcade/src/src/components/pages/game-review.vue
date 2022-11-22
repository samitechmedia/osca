<template>
  <div>
    <m-demo-view></m-demo-view>
    <m-attribute-box></m-attribute-box>
    <a-cta-button type="link" href="/go/jackpot/casino">
      <template v-slot:text>
        <span aria-hidden="true">Play for free</span>
      </template>
      <template v-slot:a11y-text>
        <span class="is-accessible-text"
          >Play {{ $store.state.currentGame.name }} for free</span
        >
      </template>
    </a-cta-button>
  </div>
</template>

<script>
/**
 * This component is for development of particular smaller review related components only
 */
import DataManager from '../../helpers/data-manager';
import mAttributeBox from '../molecules/m-attribute-box.vue';
import mDemoView from '../molecules/m-demo-view.vue';
import aCtaButton from '../atoms/a-cta-button.vue';

export default {
  name: 'game-review',
  components: {
    mAttributeBox,
    mDemoView,
    aCtaButton,
  },
  async mounted() {
    window._arcade = { currentGame: 4366 };
    const game = await DataManager.getGameById(window._arcade.currentGame);
    this.$store.actions.setCurrentGame(game);
  },
};
</script>
