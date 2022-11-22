import Vue from 'vue';
import mAttributeBox from '../components/molecules/m-attribute-box.vue';
import mDemoView from '../components/molecules/m-demo-view.vue';
import aCtaButton from '../components/atoms/a-cta-button.vue';
import Store from '../helpers/store';
import DataManager from '../helpers/data-manager';
import 'focus-visible';
import '../mixins/sass';
import '../themes/red/index.scss';

Vue.component('m-attribute-box', mAttributeBox);
Vue.component('a-cta-button', aCtaButton);
Vue.component('m-demo-view', mDemoView);

Vue.use(Store);
Vue.config.productionTip = false;

(async () => {
  const response = await fetch('/_arcade/dist/css/game-review.css');
  const css = await response.text();
  const game = await DataManager.getGameById(window._arcade.currentGame);
  Store.setCurrentGame(game);

  document.head.insertAdjacentHTML(
    'beforeend',
    `<style data-arcade>${css}</style>`,
  );

  new Vue({
    el: '#arcade-game-review',
    data: Store.state,
  });
})();
