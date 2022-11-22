<template>
  <div
    class="m-game-modal"
    :class="{
      'is-rotation-skipped': skippedRotation,
      'is-portrait': this.$sass.currentOrientation === 'portrait',
    }"
    @click="handleClose"
    tabindex="-1"
    role="dialog"
    aria-labelledby="game-header"
  >
    <a-device-rotation-info v-if="displayDeviceRotationInfo" @skip="handleSkip">
    </a-device-rotation-info>
    <div class="m-game-modal_window" v-show="!displayDeviceRotationInfo">
      <header class="m-game-modal_header">
        <h4 class="m-game-modal_name" id="game-header">{{ game.name }}</h4>
        <button
          class="m-game-modal_button m-game-modal_button--fullscreen"
          v-if="fullscreenEnabled"
          @click="handleFullScreen"
        ></button>
        <button
          aria-label="Close the modal"
          class="m-game-modal_button m-game-modal_button--close"
          @click="handleClose"
        ></button>
      </header>
      <div class="m-game-modal_content" ref="modal-content">
        <div class="m-game-modal_content__bonus-section">
          <div
            class="m-game-modal_content__bonus-section m-game-modal_content__bonus-section--main-text"
          >
            Do you want to play in the best
            <span class="m-game-modal__main-text-mobile">mobile </span>casino?
          </div>
          <div
            class="m-game-modal_content__bonus-section m-game-modal_content__bonus-section--bonus-text"
          >
            {{ bonusText || 'Get free casino bonus!' }}
          </div>
          <div class="m-game-modal_content__bonus-section__button">
            <a-cta-button
              class="m-game-modal__cta"
              type="link"
              :href="link || '/go/jackpotcity/socialcasino'"
            >
              <template v-slot:text>
                <span aria-hidden="true">Play for real money</span>
              </template>
              <template v-slot:a11y-text>
                <span class="is-accessible-text"
                  >Play {{ game.name }} for real money</span
                >
              </template>
            </a-cta-button>
          </div>
        </div>
        <div class="m-game-modal_content__game-section" ref="demo">
          <div class="m-game-modal_demo-game">
            <button
              aria-label="Close the modal"
              class="m-game-modal_content__game-section__button"
              @click="handleClose"
            ></button>
            <div
              class="m-game-modal_game-placeholder"
              :style="{ ['background-image']: `url(${image})` }"
            >
              <div class="m-game-modal_loading">Loading {{ game.name }}...</div>
            </div>

            <iframe :src="gameLink"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import aCtaButton from '../atoms/a-cta-button.vue';
import aDeviceRotationInfo from '../atoms/a-device-rotation-info';
import Trappies from 'trappies';

export default {
  name: 'm-game-modal',
  components: {
    aDeviceRotationInfo,
    aCtaButton,
  },
  data() {
    return {
      traps: null,
      bonusText: window._arcade?.bonusText,
      link: window._arcade?.affiliateLink,
      skippedRotation: null,
    };
  },
  mounted() {
    document.body.classList.add('is-modal-open');
    this.traps = new Trappies();

    this.traps.setTrap({
      name: 'modal', // name of the trap that is going to be created
      autoFocus: '.m-game-modal', // element that will be autofocused once trap activates
      areas: [
        {
          isContainer: true, // optional: if true will make all focusable elements within selector reachable
          selector: '.m-game-modal', // selector to element that should be focusable (or have all children focusable)
        },
      ],
    });

    this.traps.trapWithin('modal');
  },
  methods: {
    handleClose(ev) {
      if (
        ev.target.matches(
          '.m-game-modal, .m-game-modal_button--close, .m-game-modal_content__game-section__button',
        )
      ) {
        this.$store.actions.closeModal();
      }
    },
    handleFullScreen() {
      const gameScreen = this.$refs['modal-content'];
      gameScreen.requestFullscreen();
    },
    handleSkip() {
      this.skippedRotation = true;
    },
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
    gameLink() {
      return this.game.links[0].url;
    },
    fullscreenEnabled() {
      return document.fullscreenEnabled;
    },
    displayDeviceRotationInfo() {
      return (
        this.$sass.currentOrientation === 'portrait' && !this.skippedRotation
      );
    },
  },
  beforeDestroy: function() {
    document.body.classList.remove('is-modal-open');
    this.traps.release();
  },
};
</script>

<style lang="scss">
.m-game-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(#000, 0.8);
  z-index: 2;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  z-index: 99999;
}

.is-rotation-skipped.is-portrait {
  .m-game-modal_content {
    flex-direction: column-reverse;
    justify-content: space-evenly;
    height: 100vh;
  }
  .m-game-modal_content__bonus-section {
    padding: 0;
    height: auto;
    width: 70%;
    align-self: center;
    > * {
      margin: rem(10px);
    }
  }

  .m-game-modal__main-text-mobile {
    display: inline;
    margin: 0;
  }

  iframe,
  .m-game-modal_game-placeholder {
    height: 100%;
    width: 100vw;
  }

  .m-game-modal_loading {
    display: none;
  }
}

.m-game-modal__cta {
  background: var(--cl-green);
  box-shadow: 0 5px 0px 0px var(--cl-green-darker);
  border: none;
  display: block;
  font-size: rem(12px);

  @media only screen and #{$viewport-medium} {
    font-size: rem(14px);
  }

  @media only screen and #{$viewport-x-large} {
    margin: 0 rem(10px);
  }
}

.m-game-modal__main-text-mobile {
  display: block;

  @media only screen and #{$viewport-large} {
    display: none;
  }
}

%modal-outline {
  outline: rem(5px) solid yellow;
  outline-offset: rem(3px);
}

.m-game-modal_button,
.m-game-modal__cta {
  &[data-focus-visible-added] {
    @extend %modal-outline;
  }
}

[data-js-focus-visible] .m-game-modal_content__game-section:focus-within {
  @extend %modal-outline;
}

.m-game-modal_content {
  display: flex;

  @media only screen and #{$viewport-x-large} and (display-mode: fullscreen) {
    flex-direction: column-reverse;
  }

  &__bonus-section {
    background-color: black;
    width: 20%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    text-transform: uppercase;
    text-align: center;

    @media only screen and #{$viewport-x-small} {
      padding: 0 rem(5px);
      font-size: rem(12px);
    }

    @media only screen and #{$viewport-small} {
      padding: 0 rem(5px);
      font-size: rem(14px);
    }

    @media only screen and #{$viewport-medium} {
      padding: 0 rem(10px);
    }

    @media only screen and #{$viewport-large} {
      padding: 0 rem(10px);
      font-size: rem(18px);
    }

    @media only screen and #{$viewport-x-large} {
      height: auto;
    }

    @media only screen and #{$viewport-x-large} and (display-mode: fullscreen) {
      height: 100px;
      display: flex;
      flex-direction: row;
      width: auto;
    }

    &--main-text {
      color: var(--cl-white);
      font-weight: bold;
      width: auto;
      display: inline;
      padding-top: 17%;

      @media only screen and #{$viewport-x-large} and (display-mode: fullscreen) {
        display: flex;
        padding: 0;
        align-items: center;
      }
    }

    &--bonus-text {
      color: var(--cl-yellow);
      width: auto;

      @media only screen and #{$viewport-x-large} and (display-mode: fullscreen) {
        display: flex;
        align-items: center;
      }
    }

    &__button {
      @media only screen and #{$viewport-x-large} and (display-mode: fullscreen) {
        display: flex;
        align-items: center;
      }
    }
  }

  &__game-section {
    position: relative;
    width: 80%;
    height: 0;
    padding-bottom: 51%;
    background-color: #000000;

    @media only screen and #{$viewport-x-large} and (display-mode: fullscreen) {
      width: auto;
      padding-bottom: 91vh;
    }

    .m-game-modal_loading {
      background: white;
      border-radius: rem(20px);
      display: inline-block;
      padding: rem(20px);
      margin-top: rem(20px);
    }

    .m-game-modal_game-placeholder {
      text-align: center;

      background-size: 50%;
      background-repeat: no-repeat;
      background-position: center;
    }
    iframe,
    .m-game-modal_game-placeholder {
      border: 0;
      margin: 0;
      padding: 0;

      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;

      @media only screen and #{$viewport-x-large} {
        height: 100%;
      }
    }

    &__button {
      background: url('~@/images/close.png') no-repeat;
      border: none;
      margin: rem(10px);
      width: 20px;
      height: 20px;
      display: block;
      cursor: pointer;
      z-index: 1;
      position: fixed;

      @media only screen and #{$viewport-x-large} and (display-mode: browser) {
        display: none;
      }
    }
  }
}

.m-game-modal_window {
  cursor: default;
  width: 100%;
  height: 100%;
  background: #000000;

  .m-game-modal:fullscreen & {
    width: 100%;
    height: 100%;
  }

  @media only screen and #{$viewport-x-large} {
    width: 80%;
    height: auto;
  }
}

.m-game-modal_button {
  border: none;
  margin: 0 rem(10px);
  width: 20px;
  height: 20px;
  display: block;
  cursor: pointer;

  &--fullscreen {
    background: url('~@/images/full_screen.png') no-repeat;
    border: none;
  }

  &--close {
    background: url('~@/images/close.png') no-repeat;
  }
}

.m-game-modal_button {
  border: none;
  color: #000;
  font-weight: bold;
  min-width: rem(40px);
  margin-left: rem(10px);
}

.m-game-modal_header {
  background: var(--cl-primary);
  color: white;
  display: none;
  padding: rem(15px);

  @media only screen and #{$viewport-x-large} {
    display: flex;
    align-items: center;
  }
}

.m-game-modal_name {
  height: 100%;
  margin-right: auto;
}
</style>
