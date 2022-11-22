<template>
  <div class="m-attribute-box">
    <a-attribute
      v-for="attribute in attributes"
      :attribute="attribute"
      :key="attribute['attributeType']"
    />
  </div>
</template>

<script>
import aAttribute from '../atoms/a-attribute.vue';
export default {
  name: 'm-attribute-box',
  components: {
    aAttribute,
  },
  computed: {
    attributes() {
      const game = this.$store.state.currentGame;
      if (
        !game ||
        !game.attributes.length ||
        !this.$store.state.filteringMetadata.providers
      ) {
        return [];
      }
      // 'Minimum Bet',
      // 'Maximum Bet',
      // 'Highest Win',
      // 'RTP',
      // 'Reels',
      // 'Paylines',

      const attributes = [
        {
          attributeType: 'Software provider',
          attributeValue: this.$store.state.filteringMetadata.providers[
            game.providerId
          ].toUpperCase(),
        },
        {
          attributeType: 'Date released',
          attributeValue: (() => {
            const date = new Date(game.releaseDate);
            const month = date.toLocaleString('default', { month: 'long' });
            const year = date.getFullYear();
            return `${month} ${year}`;
          })(),
        },
        {
          attributeType: 'Minimum Bet',
          attributeValue:
            game.attributes.find(a => a.attributeType === 'Minimum Bet')
              ?.attributeValue || 'N/A',
        },
        {
          attributeType: 'Maximum Bet',
          attributeValue:
            game.attributes.find(a => a.attributeType === 'Maximum Bet')
              ?.attributeValue || 'N/A',
        },
        {
          attributeType: 'Highest Win',
          attributeValue:
            game.attributes.find(a => a.attributeType === 'Highest Win')
              ?.attributeValue || 'N/A',
        },
        {
          attributeType: 'RTP',
          attributeValue:
            game.attributes.find(a => a.attributeType === 'RTP')
              ?.attributeValue || 'N/A',
        },
        {
          attributeType: 'Reels',
          attributeValue:
            game.attributes.find(a => a.attributeType === 'Reels')
              ?.attributeValue || 'N/A',
        },
        {
          attributeType: 'Paylines',
          attributeValue:
            game.attributes.find(a => a.attributeType === 'Paylines')
              ?.attributeValue || 'N/A',
        },
      ];

      return attributes;
    },
  },
};
</script>

<style lang="scss">
.m-attribute-box {
  $base-tile-size: 270px;
  display: grid;
  padding: rem(10px);
  min-height: rem(268px);
  border-radius: rem(10px);
  border: rem(2px) solid #d7d7d7;
  grid-template-columns: repeat(auto-fit, minmax(rem($base-tile-size), 1fr));
  grid-gap: rem(10px);
  align-items: center;
  $total-max-grid-gap-size: rem(10px * 6);
  max-width: $total-max-grid-gap-size + rem($base-tile-size * 5);
  margin: 0 auto;
  margin-bottom: rem(20px);

  * {
    font-weight: 900;
  }
}
</style>
