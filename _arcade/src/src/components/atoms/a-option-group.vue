<template>
  <div class="a-option-group">
    <div v-for="option in options" :key="option.display">
      <!-- think about font awesome -->
      <input
        type="radio"
        :name="groupName"
        :value="option.value"
        :id="getId(option.value)"
        :checked="currentValue === option.value"
        @click="handleClick"
      />
      <label :for="getId(option.value)"> {{ option.display }} </label>
    </div>
  </div>
</template>

<script>
export default {
  name: 'a-option-group',
  methods: {
    getId(v) {
      return `${this._uid}-${v}`;
    },
    handleClick(e) {
      this.$emit('change', e.target.value);
    },
  },
  computed: {
    groupName() {
      return `options-${this._uid}`;
    },
  },
  props: {
    options: {
      type: Array,
      required: true,
    },
    currentValue: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss">
.a-option-group {
  padding: rem(12px) 0;
  width: 100%;
  border: rem(1px) solid #c8ccd9;
  border-radius: rem(4px);
  font-size: rem(14px);

  [type='radio'] {
    @extend %visually-hidden;
  }

  input {
    &:checked + label {
      color: #305aef;
      font-weight: bold;
    }
  }

  label {
    display: block;
    padding: rem(4px) rem(16px);
    cursor: pointer;

    &:hover {
      color: #305aef;
    }
  }
}
</style>
