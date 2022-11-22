<template>
  <div>
    <div class="m-filter-dropdown-title">
      <span class="m-filter-dropdown-title_text">{{ filterName }}</span>
      <button
        class="m-filter-dropdown-title_btn"
        :class="{ hidden: isClearBtnDisabled }"
        @click="clearFilter"
      >
        clear
      </button>
    </div>
    <div class="m-filter-dropdown" :class="{ open: isOpen }">
      <a-filtering-button @click="toggleDropdown" class="a-filtering-button">
        {{ dropDownValue }}
        <span class="fa fa-angle-down" aria-hidden="true"></span>
      </a-filtering-button>
      <a-option-group
        :options="gameTypeFilteringOptions"
        :current-value="filteringOptions.type"
        @change="selectFilter"
      />
    </div>
  </div>
</template>

<script>
import aFilteringButton from '../atoms/a-filtering-button.vue';
import aOptionGroup from '../atoms/a-option-group.vue';

export default {
  name: 'm-filter-dropdown',
  components: {
    aFilteringButton,
    aOptionGroup,
  },
  data() {
    return {
      isOpen: false,
    };
  },
  props: {
    filteringOptions: {
      type: Object,
      required: true,
    },
    gameTypeFilteringOptions: {
      type: Array,
      required: true,
    },
    filterName: {
      type: String,
      required: true,
    },
    dropDownValue: {
      type: String,
      required: true,
    },
    changeFilter: {
      type: Function,
      required: true,
    },
  },
  created() {
    let self = this;
    window.addEventListener('click', function (e) {
      if (!self.$el.contains(e.target)) {
        self.isOpen = false;
      }
    });
  },
  methods: {
    toggleDropdown() {
      this.isOpen = !this.isOpen;
    },
    clearFilter() {
      this.$emit('clear-filter');
    },
    selectFilter(value) {
      this.changeFilter(value);
      this.isOpen = false;
    },
  },
  computed: {
    isClearBtnDisabled() {
      return this.filteringOptions.type.toLowerCase() === 'all';
    },
  },
};
</script>

<style lang="scss">
.m-filter-dropdown {
  position: relative;

  .a-option-group {
    display: none;
    width: 100%;
    margin: 8px 0;
    z-index: 10;
    background: white;
    max-height: 239px;
    overflow-y: auto;
  }

  .a-filtering-button {
    justify-content: space-between;

    .fa {
      transition: transform 0.2s ease;
    }
  }

  &.open {
    .a-option-group {
      display: block;
    }

    .a-filtering-button {
      .fa {
        transform: rotate(180deg);
      }
    }
  }
}

.m-filter-dropdown-title {
  display: flex;
  justify-content: space-between;
  font-weight: bold;
  font-size: 12px;
  line-height: 16px;

  &_text {
    margin-bottom: 8px;
  }

  &_btn {
    background: none;
    border: none;
    color: #305aef;
    cursor: pointer;
    margin-bottom: 4px;
    font-weight: bold;

    &.hidden {
      display: none;
    }
  }
}
</style>
