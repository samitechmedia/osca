<template>
  <button v-if="type === 'button'" class="a-cta-button" @click="handleClick">
    <slot name="text"></slot>
    <slot name="a11y-text"></slot>
  </button>
  <a
    :href="href"
    class="a-cta-button"
    rel="nofollow noreferrer"
    target="_blank"
    v-else
  >
    <slot name="text"></slot>
    <slot name="a11y-text"></slot>
  </a>
</template>

<script>
export default {
  name: 'a-cta-button',
  methods: {
    handleClick(e) {
      this.$emit('click', e);
    },
  },
  props: {
    type: {
      type: String,
      required: false,
      default: 'button',
    },
    href: {
      type: String,
      required: false,
      default: '#',
    },
  },
};
</script>
