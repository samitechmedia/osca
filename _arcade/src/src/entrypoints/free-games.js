import Vue from 'vue';
import App from '../components/pages/free-games.vue';
import Store from '../helpers/store';
import 'focus-visible';
import '../mixins/sass';
import '../themes/red/index.scss';

Vue.use(Store);
Vue.config.productionTip = false;

(async () => {
  new Vue({
    render: h => h(App),
    data: Store.state,
  }).$mount('#arcade-free-games');
})();
