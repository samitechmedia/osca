<template>
  <div class="m-sort-dropdown" :class="{ open: isOpen }">
    <a-filtering-button
      @click="toggleDropdown"
      class="m-filtering-header_interactive is-sorting"
    >
      {{ sortDropValue }}
      <svg class="icon icon--x-bold" width="8" height="8" aria-hidden="true">
          <use xlink:href="/dist/icons/icons-core.svg#icon-angle-down"></use>
      </svg>
    </a-filtering-button>
    <a-option-group
      :options="sortingOptions"
      :current-value="currentValue"
      @change="changeSorting"
    />
  </div>
</template>

<script>
import aFilteringButton from '../atoms/a-filtering-button.vue';
import aOptionGroup from '../atoms/a-option-group.vue';

export default {
  name: 'm-sort-dropdown',
  components: {
    aFilteringButton,
    aOptionGroup,
  },
  data: function() {
    return {
      sortDropValue: 'Sort',
      isOpen: false,
    };
  },
  props: {
    filteringOptions: {
      type: Object,
      required: true,
    },
    currentValue: {
      type: String,
      required: true,
    },
  },
  created() {
    let self = this;
    window.addEventListener('click', function(e) {
      if (!self.$el.contains(e.target)) {
        self.isOpen = false;
      }
    });
  },
  methods: {
    toggleDropdown() {
      this.isOpen = !this.isOpen;
    },
    changeSorting(value) {
      this.sortDropValue = this.sortingOptions.find(
        option => option.value === value,
      ).display;
      this.$emit('sort-change', value);
    },
  },
  computed: {
    sortingOptions() {
      return [
        {
          display: 'A-Z',
          value: 'alphabetically',
        },
        {
          display: 'Newest first',
          value: 'date-desc',
        },
        {
          display: 'Most popular',
          value: 'most-popular',
        },
      ];
    },
  },
};
</script>

<style lang="scss">
.m-sort-dropdown {
  position: relative;

  .a-option-group {
    display: none;
    position: absolute;
    left: 0;
    width: 100%;
    top: calc(100% + 8px);
    z-index: 10;
    background: white;
  }

  .a-filtering-button {
    justify-content: space-between;
    
    .icon {
      transition: transform 0.2s ease;
    }
  }

  &.open {
    .a-option-group {
      display: block;
    }

    .a-filtering-button {
      .icon {
        transform: rotate(180deg);
      }
    }
  }
}
</style>
