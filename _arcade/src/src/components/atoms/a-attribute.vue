<template>
  <div class="a-attribute">
    <component :is="attributeNameTag">{{
      attribute['attributeType']
    }}</component>
    <component :is="attributeValueTag">{{ displayValue }}</component>
  </div>
</template>

<script>
export default {
  name: 'a-attribute',
  data() {
    return { invalidValues: ['UNKNOWN', 'N/A', '', null] };
  },
  computed: {
    attributeNameTag() {
      return this.$props.type === 'description' ? 'dt' : 'div';
    },
    attributeValueTag() {
      return this.$props.type === 'description' ? 'dd' : 'div';
    },
    hasImproperValue() {
      return this.invalidValues.includes(this.attribute['attributeValue']);
    },
    displayValue() {
      return this.hasImproperValue ? 'N/A' : this.attribute['attributeValue'];
    },
  },
  mounted() {
    if (this.hasImproperValue) {
      this.$el.classList.add('is-unavailable');
    }
  },
  methods: {
    handleClick(e) {
      this.$emit('click', e);
    },
  },
  props: {
    attribute: {
      type: Object,
      required: true,
    },
    // used to change the semantical tags rendered by the component
    // use 'description' for dl/dt/dd and 'transparent' for divs
    type: {
      type: String,
      required: false,
      default: 'description',
    },
  },
};
</script>

<style lang="scss">
.a-attribute {
  height: rem(114px);
  font-weight: 700;
  border-radius: rem(10px);
  flex-direction: column;
  border: rem(1px) solid #d7d7d7;
  font-weight: bold;
  display: flex;
  flex-direction: column-reverse;
  justify-content: center;
  align-items: center;

  &.is-unavailable {
    opacity: 0.5;
  }

  dd {
    color: $osca-lime-green;
    font-size: rem(30px);
    text-align: center;
  }
  dt {
    margin: 0;
    color: $osca-heading-color;
    font-size: rem(17px);
  }
}
</style>
