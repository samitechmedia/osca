// get Connector class from the package
import { Connector as ArcadeConnector } from 'arcade-connector';

import debounce from 'lodash/debounce';
import Store from './store';

// create an instance of it
const connector = new ArcadeConnector();
// set the configuration data
const {
  VUE_APP_ARCADE_API_PORT,
  VUE_APP_ARCADE_CLIENT_ID,
  VUE_APP_ARCADE_CLIENT_SECRET,
  VUE_APP_ARCADE_SERVER,
  VUE_APP_ARCADE_API_PATH,
} = process.env;

connector.setConfiguration({
  ARCADE_API_PORT: VUE_APP_ARCADE_API_PORT,
  ARCADE_CLIENT_ID: VUE_APP_ARCADE_CLIENT_ID,
  ARCADE_CLIENT_SECRET: VUE_APP_ARCADE_CLIENT_SECRET,
  ARCADE_SERVER: VUE_APP_ARCADE_SERVER,
  ARCADE_API_PATH: VUE_APP_ARCADE_API_PATH,
});

const ARCADE_VALUE_MAP = new Map([
  [
    'date-desc',
    {
      sortingFields: {
        release_date: 'DESC',
      },
    },
  ],
  [
    'alphabetically',
    {
      sortingFields: {
        name: 'ASC',
      },
    },
  ],
  [
    'most-popular',
    {
      sortingFields: {
        search_volume: 'DESC',
      },
    },
  ],
]);

function adjustGameSizeToWindow() {
  if (window.innerWidth < 576) return 2 * 5;
  if (window.innerWidth >= 576 && window.innerWidth < 768) return 3 * 4;
  if (window.innerWidth >= 768 && window.innerWidth < 992) return 4 * 4;
  if (window.innerWidth >= 992) return 5 * 4;
}

class DataManager {
  PAGE_SIZE = adjustGameSizeToWindow();
  _defaultFilteringOptions = {
    type: 'ALL',
    sortby: 'most-popular',
    name: '',
  };
  _filteringOptions = {};

  _paginationOptions = {
    pageCount: null,
    currentPage: 1,
  };

  _geo = null;

  constructor() {
    Object.freeze(this._defaultFilteringOptions);
    Object.assign(this._filteringOptions, this._defaultFilteringOptions);

    this._debouncedFetch = debounce(this._fetchData.bind(this), 500);

    this.init();
  }

  async _fetchData() {
    const newData = await this._getDataToDisplay();
    Store._refreshLastUpdatedTimestamp();
    Store.setDisplayData(newData);
    Store.setTotalGamesCount(newData.rowsFound);
    Store.setLoading(false);
  }

  async init() {
    const apiCalls = [];

    // @TODO: check how to configure eslint/prettier with VSCode so they dont freak out
    if (!window._arcade || !window._arcade.countryAlpha2) {
      const response = await fetch('https://freegeoip.app/json/');
      const json = await response.json();
      this._geo = json.country_code;
    } else {
      this._geo = window._arcade.countryAlpha2;
    }

    const dataFetchPromise = this._fetchData();
    apiCalls.push(dataFetchPromise);

    const filteringMetadataPromise = connector.invokeArcadeAction(
      'GetGameFilteringMetaData',
      {
        ...this.commonOptions,
      },
    );

    filteringMetadataPromise.then(filteringMetadata => {
      Store.setFilteringMetadata(filteringMetadata);
    });

    apiCalls.push(filteringMetadataPromise);

    const gamesPromise = connector.getGames({
      ...this.commonOptions,
    });

    gamesPromise.then(games => {
      Store.setTotalGamesCount(games.rowsFound);
    });

    apiCalls.push(gamesPromise);

    await Promise.all(apiCalls);

    Store._refreshLastUpdatedTimestamp();
    Store._setInitialised(true);
  }

  get defaultFilteringOptions() {
    return this._defaultFilteringOptions;
  }

  get pagination() {
    return this._paginationOptions;
  }

  set pagination(paginationOptions) {
    this._paginationOptions = paginationOptions;
  }

  get totalGames() {
    return this._totalGamesCount;
  }

  get filtering() {
    return this._filteringOptions;
  }

  set filtering(filteringOptions) {
    this._filteringOptions = filteringOptions;
  }

  get updateData() {
    return () => {
      Store.setLoading(true);
      this._debouncedFetch();
    };
  }

  isValidGeo(geo) {
    // todo: fix arcade not to freak out when geo it does not recognise happen
    const validGeos = ['US', 'CA', 'GB', 'DE', 'NZ', 'AT'];
    return validGeos.includes(geo);
  }

  get commonOptions() {
    const sortBy = this._filteringOptions.sortby;
    const gameType = this._filteringOptions.type;

    const commonOptions = {
      pageSize: this.PAGE_SIZE,
      pageNumber: this.pagination.currentPage,
      ...(this.isValidGeo(this._geo)
        ? {
          forGeos: [this._geo],
        }
        : undefined),
      ...(sortBy ? ARCADE_VALUE_MAP.get(sortBy) : undefined),
      ...(gameType && gameType !== 'ALL'
        ? {
          gameTypes: [{name: gameType, category: null}],
        }
        : undefined),
    };

    return commonOptions;
  }

  async _getDataToDisplay() {
    const commonOptions = this.commonOptions;
    const name = this._filteringOptions.name;

    try {
      const rawResponse = await connector.invokeArcadeAction('GetGamesByConditions', {
        attributes: [],
        gameArchived: false,
        ids: [],
        includeFlash: false,
        includeGamesWithNoLinks: false,
        includeGamesWithoutWorkingLinks: false,
        name: name,
        providerArchived: false,
        providerIds: [],
        gameTypes: [],
        ...commonOptions,
      });
      return rawResponse;

    } catch (error) {
      console.error('Could not recieve games data');
      return {};
    }
  }

  getGameById(id) {
    return connector.getGameById({ id });
  }
}

const instance = new DataManager();
export default instance;
