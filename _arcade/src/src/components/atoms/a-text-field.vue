<template>
  <div class="a-text-field_wrap">
    <slot />
    <input
      type="text"
      :value="currentValue"
      @input="handleChange"
      class="a-text-field"
      placeholder="Search"
    />
  </div>
</template>

<script>
export default {
  name: 'a-text-field',
  methods: {
    getId(v) {
      return `${this._uid}-${v}`;
    },
    handleChange(e) {
      this.$emit('input', e.target.value);
    },
  },
  computed: {
    groupName() {
      return `options-${this._uid}`;
    },
  },
  props: {
    currentValue: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss">
.a-text-field_wrap {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  padding: rem(8px) rem(20px) rem(8px) rem(16px);
  width: 100%;
  border: rem(1px) solid #c8ccd9;
  border-radius: rem(4px);
  color: #6e7487;
}

.a-text-field {
  border: none;
  flex-grow: 1;
  font-size: 14px;
  margin: 0;
  padding: 0;

  &[data-focus-visible-added] {
    color: black;
    outline: none;
  }
}
</style>
