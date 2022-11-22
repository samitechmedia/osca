<template>
  <div class="a-device-rotation-info">
    <img src="@/images/rotation_icon.png" alt="" />
    <span class="a-device-rotation-info a-device-rotation-info__title"
      >Please rotate your device</span
    >
    <span class="a-device-rotation-info a-device-rotation-info__text"
      >for the best gameplay</span
    >

    <a-cta-button class="a-device-rotation-info__skip" @click="handleSkip">
      <template v-slot:text>
        <span aria-hidden="true">Continue anyway</span>
        <div class="white__inner-circle">
          <span class="fa fa-arrow-right" aria-hidden="true"></span>
        </div>
      </template>
      <template v-slot:a11y-text>
        <span class="is-accessible-text">Continue anyway</span>
      </template>
    </a-cta-button>
  </div>
</template>

<script>
import aCtaButton from '../atoms/a-cta-button.vue';

export default {
  components: {
    aCtaButton,
  },
  name: 'a-device-rotation-info',
  methods: {
    handleSkip() {
      this.$emit('skip');
    },
  },
};
</script>

<style scoped lang="scss">
.a-device-rotation-info {
  position: relative;
  color: #fff;
  font-style: rem(16px);
  font-weight: 900;
  display: flex;
  flex-direction: column;
  align-items: center;

  &__title {
    text-transform: uppercase;
    padding: rem(20px) 0 rem(10px) 0;
    font-weight: bold;
  }
}
.a-device-rotation-info__skip.a-cta-button {
  margin-top: rem(40px);
  padding: rem(10px);
  opacity: 0.8;
  font-size: rem(16px);

  .white__inner-circle {
    margin-left: rem(5px);
  }
}
</style>
