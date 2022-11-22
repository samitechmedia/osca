<template>
  <article
    class="m-game-card"
    itemprop="associatedMedia"
    itemscope
    itemtype="http://schema.org/MediaObject"
  >
    <meta itemprop="genre" :content="game.gameType.name" />
    <meta itemprop="playerType" :content="gamePlayerType" />
    <meta itemprop="datePublished" :content="game.releaseDate" />
    <meta
      itemprop="regionsAllowed"
      :content="metadataCountry.join(', ')"
      v-if="metadataCountry.length"
    />
    <div
      class="m-game-card_inner"
      v-if="!$store.state.loading"
      itemprop="encodesCreativeWork"
      itemscope
      itemtype="http://schema.org/Game"
    >
      <div class="m-game-card_front">
        <div class="m-game-card_cover-wrap">
          <img
            class="m-game-card_cover"
            :src="getImage()"
            :alt="game.name"
            @click="openModal"
            itemprop="image"
          />
          <div class="m-game-card_cover-overlay">
            <a-cta-button class="m-game-card_cta" ref="cta" @click="openModal">
              <template v-slot:text>
                <span aria-hidden="true">Play for FREE</span>
              </template>
              <template v-slot:a11y-text>
                <span class="is-accessible-text"
                  >Play {{ game.name }} for free</span
                >
              </template>
            </a-cta-button>
          </div>
        </div>

        <div class="m-game-card_info">
          <div class="m-game-card_title" itemprop="name">{{ game.name }}</div>
          <div
            class="m-game-card_provider"
            itemprop="provider"
            itemscope
            itemtype="https://schema.org/Organization"
          >
            <span itemprop="name">{{ getProviderName(game.providerId) }}</span>
          </div>
        </div>
      </div>
    </div>
      <div class="sfg__game" v-else>
          <div class="sfg__game-image skeleton-item"></div>
          <div class="sfg__game-description skeleton-item"></div>
      </div>
  </article>
</template>

<script>
import aCtaButton from '../atoms/a-cta-button.vue';
import DarkroomService from '../../helpers/darkroomService';

export default {
  name: 'm-game-card',
  components: {
    aCtaButton
  },
  computed: {
    gamePlayerType() {
      const isFlash = this.game?.links[0]?.flash;
      if (isFlash) {
        return 'Flash';
      }
      return 'HTML5';
    },
    metadataCountry() {
      const link = this.game?.links[0];
      const geckoCountries = ['US', 'CA', 'AT', 'DE', 'GB', 'NZ'];
      return geckoCountries.filter(
        (gecko) => !link.blockedCountries.includes(gecko),
      );
    },
  },
  methods: {
    getImage() {
     const darkroomService = new DarkroomService(this.$props.game);

      return darkroomService.generateLink();
    },
    openModal() {
      this.$store.actions.setCurrentGame(this.game);
      this.$store.actions.openModal('m-game-modal');
    },
    getProviderName(id) {
      if (!this.$store.state.filteringMetadata) {
        return null;
      }
      return this.$store.state.filteringMetadata.providers[id];
    },
  },
  props: {
    game: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.m-game-card_inner {
  width: 100%;
  height: 100%;
  transition: transform 0.6s;
}

.m-game-card_front,
.m-game-card_back {
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.m-game-card_back {
  transform: rotateY(180deg);
  background: white;
}

.m-game-card_front {
  display: flex;
  flex-direction: column;

  &:hover {
    .m-game-card_cover-overlay {
      opacity: 1;
      visibility: visible;
      transition: opacity 0.2s ease;
    }
  }
}

/** it's important that components don't manage it's outer margin too much **/
.m-game-card {
  &:focus-within {
    background: rgba($focus-color, 0.1);
  }
}

.m-game-card_cover-wrap {
  position: relative;
  border-radius: 4px;
  overflow: hidden;
  padding-bottom: 74.9019%;
  background: #E9ECF1;
}

.m-game-card_cover-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.9);
  opacity: 0;
  visibility: hidden;
  transition: 0.2s visibility 0s ease, opacity 0.2s ease;
}

.m-game-card_cover {
  cursor: pointer;
  width: 100%;
  flex-shrink: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  object-fit: cover;
}

.m-game-card_placeholder {
  width: 100%;
  height: 100%;
}

.m-game-card_info {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
  margin-top: 8px;
  min-height: rem(46px);
}

.m-game-card_title {
  font-weight: bold;
  line-height: 1.25;
  font-size: rem(12px);
  margin-bottom: rem(4px);
}

.m-game-card_provider {
  margin-top: 0;
  font-size: rem(12px);
  color: var(--cl-light-gray);
  line-height: 1;
}

.m-game-card {
  dt {
    font-weight: bold;

    &::after {
      content: ':';
    }
  }

  .a-cta-button {
    font-family: 'Open Sans', sans-serif;
    background: var(--cl-green);
    font-size: rem(14px);
    cursor: pointer;
    color: white;
    font-weight: bold;
    box-shadow: 0 rem(4px) 0 0 var(--cl-green-darkest);
    border: 1px solid var(--cl-green);
    border-radius: rem(4px);
    padding: rem(8px) rem(16px);
    margin: 0;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
}

.sfg__game{
  width: 100%;
  margin: 0 !important;
}
</style>
