<template>
  <button class="a-filtering-button" @click="handleClick">
    <slot />
  </button>
</template>

<script>
export default {
  name: 'a-filtering-button',
  methods: {
    handleClick(ev) {
      this.$emit('click', ev);
    },
  },
};
</script>

<style lang="scss">
%focused {
  border-color: black;
  color: black;
  background: $focus-color;
  outline: none;
}

.a-filtering-button {
  background: white;
  border: rem(1px) solid #c8ccd9;
  color: #0d183d;
  font-size: rem(14px);
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: rem(8px) rem(16px);
  border-radius: rem(4px);

  @media only screen and #{$viewport-small} {
    font-size: rem(14px);
  }

  &[data-focus-visible-added] {
    @extend %focused;
  }
}

// is glitchy because of the focus visible polyfill
//
// [data-js-focus-visible] .a-filtering-button {
//   &[aria-expanded='true']:not(:focus) {
//     @extend %focused;
//     background-color: rgba($focus-color, 0.3);
//   }
// }
</style>
