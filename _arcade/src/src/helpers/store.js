import Vue from 'vue';

class Store {
  fVm = null;
  fState = {};
  constructor() {
    this.fState = {
      displayData: {},
      filteringMetadata: {},
      lastUpdated: Date.now(),
      totalGamesCount: null,
      currentModal: null,
      currentGame: null,
      loading: true,
      initialised: false,
    };

    this.vm = new Vue({
      data: {
        $$state: this.fState,
      },
    });
  }

  get state() {
    return this.fState;
  }

  _setInitialised(newData) {
    this.fState.initialised = newData;
  }

  setDisplayData(newData) {
    this.fState.displayData = newData;
  }

  setFilteringMetadata(newData) {
    this.fState.filteringMetadata = newData;
  }

  setTotalGamesCount(newData) {
    this.fState.totalGamesCount = newData;
  }

  setCurrentGame(newData) {
    this.fState.currentGame = newData;
  }

  openModal(newData) {
    this.closeModal();
    this.fState.currentModal = newData;
  }

  closeModal() {
    this.fState.currentModal = null;
  }

  setLoading(state) {
    this.fState.loading = state;
  }

  _refreshLastUpdatedTimestamp() {
    this.fState.lastUpdated = Date.now();
  }

  install(Vue) {
    Object.defineProperty(Vue.prototype, '$store', {
      get: () => {
        return {
          state: this.state,
          actions: {
            openModal: this.openModal.bind(this),
            closeModal: this.closeModal.bind(this),
            setCurrentGame: this.setCurrentGame.bind(this),
          },
        };
      },
    });
  }
}
const store = new Store();
export default store;
