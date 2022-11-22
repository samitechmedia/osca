<template>
  <nav
    class="a-pagination"
    v-if="pageCount > 1"
    aria-label="Free games library pagination"
  >
    <ul>
      <li>
        <button
          class="a-pagination_button a-pagination_button--nav"
          @click="handlePrevious"
          :disabled="!isPreviousAvailable"
          :aria-label="getAriaLabelForArrow(currentPage - 1)"
        >
          <svg class="icon" width="14" height="14" aria-hidden="true">
              <use xlink:href="/dist/icons/icons-core.svg#icon-angle-left"></use>
          </svg>
        </button>
      </li>
      <li v-for="index in displayedPages" :key="index">
        <button
          class="a-pagination_button"
          :class="{
            'is-active': currentPage === index,
          }"
          :data-page="index"
          @click="handlePagePick"
          :aria-current="currentPage === index"
          :aria-label="getAriaLabel(index)"
        >
          {{ index }}
        </button>
      </li>
      <li>
        <button
          class="a-pagination_button a-pagination_button--nav"
          @click="handleNext"
          :disabled="!isNextAvailable"
          :aria-label="getAriaLabelForArrow(currentPage + 1)"
        >
          <svg class="icon" width="14" height="14" aria-hidden="true">
            <use xlink:href="/dist/icons/icons-core.svg#icon-angle-right"></use>
        </svg>
        </button>
      </li>
    </ul>
  </nav>
</template>

<script>
/**
 * @see https://www.a11ymatters.com/pattern/pagination/#indicate-which-element-is-currently-active
 */
export default {
  name: 'a-pagination',
  props: {
    currentPage: {
      type: Number,
      required: false,
    },
    pageCount: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      displayedPages: [...Array(this.pagesPerVieport).keys()].map(
        (pageNo) => pageNo + 1,
      ),
    };
  },
  watch: {
    pageCount() {
      this.recalculateCurrentPages(this.currentPage);
    },
    currentViewport() {
      this.recalculateCurrentPages(this.currentPage);
    },
  },
  methods: {
    getAriaLabel(index) {
      const isActive = index === this.currentPage;
      if (!isActive) {
        return `Go to page ${index}`;
      }
      return `Current page, Page ${index}`;
    },
    getAriaLabelForArrow(index) {
      let label = '';
      if (index > this.currentPage) {
        label += `Go to next page`;
        if (!this.isNextAvailable) {
          return label;
        }
      } else {
        label += `Go to previous page`;
        if (!this.isPreviousAvailable) {
          return label;
        }
      }

      label += `(${index})`;
      return label;
    },
    handlePagePick(ev) {
      this.$emit('change', { currentPage: Number(ev.target.dataset.page) });
    },
    handlePrevious() {
      if (!this.isPreviousAvailable) {
        return;
      }

      const previousPage = this.currentPage - 1;
      this.$emit('change', { currentPage: previousPage });

      this.recalculateCurrentPages(previousPage);
    },
    handleNext() {
      if (!this.isNextAvailable) {
        return;
      }

      const nextPage = this.currentPage + 1;
      this.$emit('change', { currentPage: nextPage });
      this.recalculateCurrentPages(nextPage);
    },
    recalculateCurrentPages(currentPage) {
      const modifier = currentPage % this.pagesPerVieport === 0 ? -1 : 0;
      const currentBatch = Number.parseInt(currentPage / this.pagesPerVieport);

      this.displayedPages =
        // 0, 1, 2, 3, 4, 5...
        [...Array(this.pagesPerVieport).keys()]
          // 1, 2, 3, 4, 5, 6...
          .map((pageNo) => pageNo + 1)
          // 11, 12, 13, 14, 15, 16...
          .map(
            (pageNo) =>
              pageNo + this.pagesPerVieport * (currentBatch + modifier),
          )
          // ie. if there's only 14 pages available
          // 11, 12, 13, 14
          .filter((pageNo) => pageNo <= this.pageCount);
    },
  },
  mounted() {
    this.recalculateCurrentPages(this.currentPage);
  },
  computed: {
    isPreviousAvailable() {
      return this.currentPage > 1;
    },

    isNextAvailable() {
      return this.currentPage + 1 <= this.pageCount;
    },
    currentViewport() {
      if (this.$sass.currentViewport) {
        return this.$sass.currentViewport.name;
      }
      return 'small';
    },
    pagesPerVieport() {
      switch (this.currentViewport) {
        case 'extrasmall': {
          return 3;
        }
        case 'small': {
          return 4;
        }
        case 'medium': {
          return 4;
        }
        case 'large': {
          return 6;
        }
        default: {
          return 10;
        }
      }
    },
  },
};
</script>

<style lang="scss">
$cl-inactive: #eeeeee;
$cl-inactive-text: #555555;

$cl-active: $cl-primary;
$cl-active-text: #fff;

$cl-disabled-text: #aaaaaa;

.a-pagination {
  max-width: 100%;
  display: flex;
  margin-bottom: 10px;

  ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    max-width: 100%;
  }

  .is-modal-open & {
    display: none;
  }
}

.a-pagination_button {
  font-family: 'Open Sans', sans-serif;
  height: rem(24px);
  width: rem(24px);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: rem(14px);
  margin-right: rem(12px);
  margin-left: rem(12px);
  border: none;
  cursor: pointer;
  border-radius: 4px;

  &--nav {
    background-color: transparent;
    font-size: rem(24px);
    position: relative;

    .icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      margin-top: -1px;
    }

    &:hover:not([disabled]) {
      background-color: transparent;
    }
  }

  &[data-focus-visible-added],
  &.is-active[data-focus-visible-added] {
    outline: none;
    background: $cl-green;
    color: #fff;
  }

  &.is-active,
  &:hover:not([disabled]) {
    background: $cl-green;
    color: #fff;
  }

  &[disabled] {
    color: $cl-disabled-text;
  }
}
</style>
