<template>
  <div>
    <a-filtering-button
      @click="toggleFilterSidenav"
      class="m-filtering-header_interactive is-filtering"
    >
      <svg v-if="isFilteringDefault" class="icon mr-8" width="13" height="13" aria-hidden="true">
          <use xlink:href="/dist/icons/icons-free.svg#icon-filter"></use>
      </svg>
      <span v-else class="filtering-icon mr-8">1</span>
      Filter
    </a-filtering-button>

    <div class="m-filter-slideout" :class="{ active: isFilterSidenavOpen }">
      <div class="m-filter-slideout_head">
        <b>Filters</b>
        <div class="m-filter-slideout_close" @click="toggleFilterSidenav">
          <svg class="icon" width="18" height="18" aria-hidden="true">
              <use xlink:href="/dist/icons/icons-core.svg#icon-times"></use>
          </svg>
        </div>
      </div>

      <div class="m-filter-slideout_body">
        <div class="filter_dropdowns">
          <m-filter-dropdown
            :filtering-options="filteringOptions"
            :gameTypeFilteringOptions="gameTypeFilteringOptions"
            :dropDownValue="dropDownValue"
            :changeFilter="changeFilter"
            @clear-filter="clearFilter"
            filter-name="Game Type"
          />
        </div>
        <div class="m-filter-slideout_buttons">
          <a-filtering-button
            @click="clearFilters"
            :disabled="isFilteringDefault"
            class="m-filter-slideout_button"
          >
            Clear all filters
          </a-filtering-button>

          <a-filtering-button
            @click="applyFilters"
            class="m-filter-slideout_button btn-green"
          >
            Apply
          </a-filtering-button>
        </div>
      </div>
    </div>
    <div class="m-filter-slideout_overlay" @click="toggleFilterSidenav"></div>
  </div>
</template>

<script>
import aFilteringButton from '../atoms/a-filtering-button.vue';
import mFilterDropdown from '../molecules/m-filter-dropdown.vue';

export default {
  name: 'm-filter-slideout',
  components: {
    aFilteringButton,
    mFilterDropdown,
  },
  data: function () {
    return {
      isFilterSidenavOpen: false,
      dropDownValue: 'All',
      selectedValue: 'ALL',
    };
  },
  computed: {
    gameTypeFilteringOptions() {
      const allGamesFilter = {
        value: 'ALL',
        display: 'All',
      };
      const gameTypes = this.$store.state.filteringMetadata.gameTypes;
      if (!gameTypes) {
        return [allGamesFilter];
      }
      const options = [allGamesFilter];

      Object.keys(gameTypes).forEach((gameType) => {
        options.push({ value: gameType, display: gameTypes[gameType] });
      });
      return options;
    },
    isFilteringDefault() {
      return this.filteringOptions.type.toLowerCase() === 'all';
    },
  },
  props: {
    filteringOptions: {
      type: Object,
      required: true,
    },
  },
  methods: {
    toggleFilterSidenav() {
      this.isFilterSidenavOpen = !this.isFilterSidenavOpen;
    },
    changeFilter(value) {
      const selected = this.gameTypeFilteringOptions.find(
        (opt) => opt.value === value,
      );
      this.dropDownValue = selected.display;
      this.selectedValue = selected.value;
    },
    applyFilters() {
      this.$emit('apply-filters', this.selectedValue);
    },
    clearFilters() {
      this.dropDownValue = 'All';
      this.selectedValue = 'ALL';
      this.$emit('apply-filters', this.selectedValue);
    },
    clearFilter() {
      this.dropDownValue = 'All';
      this.selectedValue = 'ALL';
      this.$emit('apply-filters', this.selectedValue);
    },
    getCloseDropdowns(cb) {
      this.closeDropdowns = cb;
    },
  },
};
</script>

<style lang="scss">
.m-filter-slideout {
  position: fixed;
  right: 0;
  z-index: 99999;
  top: 0;
  height: 100vh;
  width: 272px;
  background-color: #fff;
  transform: translateX(105%);
  transition: translate 0.2s ease;
  display: flex;
  flex-direction: column;

  @media only screen and #{$viewport-large} {
    width: 287px;
  }

  &.active {
    transform: translateX(0);
  }

  &.active + .m-filter-slideout_overlay {
    z-index: 997;
    opacity: 1;
    transition: opacity 0.2s ease;
  }

  &_head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #eaecf2;
    padding: rem(24px) rem(16px);
    font-weight: bold;
  }

  &_close {
    display: flex;
    cursor: pointer;
  }

  &_body {
    padding: 38px 16px;
    min-height: 250px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
    overflow-y: scroll;
  }

  &_buttons {
    display: flex;
    margin-right: -8px;
    margin-left: -8px;
  }

  &_button {
    min-width: 0;
    width: 100%;
    margin: 0 8px;
    padding: 8px 4px;
    border: 1px solid #434859;
    color: #434859;
    font-weight: bold;

    &.btn-green {
      background-color: #50bc01;
      color: white;
      border-color: #50bc01;
    }

    &[disabled] {
      color: #c8ccd9;
      border-color: #c8ccd9;
      cursor: initial;
    }
  }
}

.m-filter-slideout_overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  opacity: 0;
  height: 120vh;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: -1;
  transition: opacity 0.2s ease, 0.2s z-index;
}

.filtering-icon {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background-color: #305AEF;
  color: #fff;
  font-weight: 600;
  font-size: 12px;
  line-height: 16px;
}
</style>
