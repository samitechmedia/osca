<!--
  Styling: /Sources/_queen/Sass/Components/_arcadeSingleGameHolder.scss
  Placeholder: /includes/templates/reviews-slot/arcadeSingleGameHolder.php
-->

<template>
  <div class="m-demo-view mb-8" v-if="link">
    <div
      class="m-demo-view__img"
      :style="{ ['background-image']: `url(${image})` }"
    >
      <a-cta-button ref="cta" @click="openModal" v-if="game">
        <template v-slot:text>
          <span aria-hidden="true">Play for free</span>
          <span class="white__inner-circle">
            <span class="fa fa-arrow-right" aria-hidden="true"></span>
          </span>
        </template>
        <template v-slot:a11y-text>
          <span class="is-accessible-text">Play {{ game.name }} for free</span>
        </template>
      </a-cta-button>
    </div>

    <component
      v-if="$store.state.currentModal"
      :is="$store.state.currentModal"
    />
  </div>
</template>

<script>
import aCtaButton from '../atoms/a-cta-button.vue';

export default {
  name: 'm-demo-view',
  components: {
    aCtaButton,
    mGameModal: () =>
      import(/* webpackChunkName: "modal" */ '../molecules/m-game-modal.vue'),
  },
  data() {
    return {};
  },
  computed: {
    image() {
      const path = this.$store.state.currentGame?.imageName;
      if (path) {
        return `${process.env.VUE_APP_IMAGE_PATH}/games/${path}`;
      }
      return null;
    },
    game() {
      return this.$store.state.currentGame;
    },
    link() {
      const links = this.$store.state.currentGame?.links || [];
      const link = links.find(link => {
        const worksInCurrentGeo = !link.blockedCountries.some(country => {
          return country.alpha2 === window._arcade.countryAlpha2;
        });
        const isFlashRestricted = new Date().getFullYear() > 2020 && link.flash;
        const isWorkingLink =
          worksInCurrentGeo && link.url && !isFlashRestricted;
        return isWorkingLink;
      });

      if (!link) {
        return null;
      }
      return link.url;
    },
  },
  methods: {
    handleClick(e) {
      this.$emit('click', e);
    },
    openModal() {
      this.$store.actions.setCurrentGame(this.game);
      this.$store.actions.openModal('m-game-modal');
    },
  },
};
</script>
