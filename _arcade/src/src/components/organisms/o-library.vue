<template>
  <section
    class="o-library"
    itemscope
    itemtype="https://schema.org/MediaGallery"
  >
    <meta itemprop="name" content="Game gallery" />
    <meta
      itemprop="description"
      content="A list of free games we've found for you"
    />
    <meta itemprop="genre" :content="currentGenre + ' Games'" />

    <m-filtering-header
      @change="handleFiltering"
      :filtering-options="filteringOptions"
    />
    <m-game-list :games="games" v-if="canShowGames" />
    <p v-else>No games found for given criteria</p>
    <a-pagination
      @change="handlePagination"
      :currentPage="Number(paginationOptions.currentPage)"
      :pageCount="pageCount"
    />
    <component
      v-if="$store.state.currentModal"
      :is="$store.state.currentModal"
    />
  </section>
</template>

<script>
import mFilteringHeader from '../molecules/m-filtering-header.vue';
import aPagination from '../atoms/a-pagination.vue';
import mGameList from '../molecules/m-game-list.vue';
import DataManager from '../../helpers/data-manager';

export default {
  name: 'o-library',
  components: {
    mFilteringHeader,
    aPagination,
    mGameList,
    mGameModal: () => import('../molecules/m-game-modal.vue'),
  },
  data() {
    return {
      filteringOptions: Object.assign({}, DataManager.defaultFilteringOptions),
      paginationOptions: {
        currentPage: 1,
      },
      currentModal: null,
    };
  },
  mounted() {
    window.dispatchEvent(new Event('arcade-builded'));
  },
  computed: {
    activeModal() {
      return this.$store.state.currentModal;
    },
    displayData() {
      return this.$store.state.displayData;
    },
    games() {
      return this.displayData.results || [];
    },
    pageCount() {
      return this.displayData.pagesCount || 1;
    },
    canShowGames() {
      return this.games.length;
    },
    currentGenre() {
      const genre = this.$store.state.filteringMetadata.gameTypes[
        this.filteringOptions.type
      ];
      return genre || '';
    },
  },
  methods: {
    handleFiltering(filteringOptions) {
      this.filteringOptions = filteringOptions;
      this.paginationOptions.currentPage = 1;
      this.updateDataset();
    },
    handlePagination(paginationOptions) {
      this.paginationOptions = paginationOptions;
      this.updateDataset();
    },
    async updateDataset() {
      DataManager.pagination = this.paginationOptions;
      DataManager.filtering = this.filteringOptions;
      DataManager.updateData();
    },
  },
};
</script>

<style lang="scss">
#arcade-free-games {
  width: 100%;
}

.o-library {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  .a-pagination {
    // use proper variables
    margin-top: rem(16px);

    @media only screen and #{$viewport-medium} {
      margin-top: rem(24px);
    }
  }

  .m-game-list {
    margin-top: 0;
  }
}
</style>
