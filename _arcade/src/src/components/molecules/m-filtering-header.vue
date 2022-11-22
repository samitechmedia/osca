<template>
  <div class="m-filtering-header">
    <div class="m-filtering-header_options">
      <!-- We're using globally loaded font awesome to not duplicate icons, as they are already included on the site -->
      <div class="m-filtering-header_option search">
        <a-text-field
          :current-value="filteringOptions.name"
          @input="handleNameChange"
        >
          <svg class="icon mr-8" width="13" height="13" aria-hidden="true">
              <use xlink:href="/dist/icons/icons-core.svg#icon-search"></use>
          </svg>
        </a-text-field>
      </div>

      <div class="m-filtering-header_option sort-dropdown">
        <m-sort-dropdown
          :filtering-options="filteringOptions"
          :current-value="filteringOptions.sortby"
          @sort-change="handleSortingChange"
        />
      </div>

      <div class="m-filtering-header_option filter-trigger">
        <m-filter-slideout
          :filtering-options="filteringOptions"
          @apply-filters="handleGameTypeFilterChange"
          @reset-filters="handleReset"
        />
      </div>
    </div>
  </div>
</template>

<script>
import aTextField from '../atoms/a-text-field.vue';
import mSortDropdown from '../molecules/m-sort-dropdown.vue';
import mFilterSlideout from '../molecules/m-filter-slideout.vue';
import DataManager from '../../helpers/data-manager';

export default {
  name: 'm-filtering-header',
  components: {
    mFilterSlideout,
    mSortDropdown,
    aTextField,
  },
  data: function () {
    return {
      sortDropValue: 'Sort',
    };
  },
  computed: {
    currentGenre() {
      const genre = this.$store.state.filteringMetadata.gameTypes[
        this.filteringOptions.type
      ];
      return (genre || '').toLowerCase();
    },
  },
  props: {
    filteringOptions: {
      type: Object,
      required: true,
    },
  },
  methods: {
    clearExpandedState() {
      Array.from(
        this.$el.querySelectorAll('.a-filtering-button'),
      ).forEach((el) => el.removeAttribute('aria-expanded'));
    },
    handleGameTypeFilterChange(value) {
      this.$emit('change', { ...this.filteringOptions, type: value });
    },
    handleSortingChange(value) {
      this.$emit('change', { ...this.filteringOptions, sortby: value });
    },
    handleReset() {
      this.$emit('change', DataManager.defaultFilteringOptions);
    },
    handleNameChange(value) {
      this.$emit('change', { ...this.filteringOptions, name: value });
    },
  },
};
</script>

<style lang="scss">
.sort-dropdown {
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
  }

  .a-filtering-button[aria-expanded='true'] {
    .icon {
      transform: rotate(180deg);
    }
  }

  .a-filtering-button[aria-expanded='true'] + .a-option-group {
    display: block;
  }
}

.m-filtering-header_options {
  @media only screen and #{$viewport-medium} {
    flex-wrap: nowrap;
  }

  .a-filtering-button {
    width: 100%;
  }
}

.m-filtering-header_option {
  margin: rem(8px);
  width: 100%;
  max-width: calc(50% - 16px);

  &.search {
    max-width: 100%;
  }

  @media only screen and #{$viewport-medium} {
    &:not(.search) {
      max-width: 136px;
    }
  }

  .is-sorting,
  .is-filtering {
    min-width: 136px;
  }
}
</style>
