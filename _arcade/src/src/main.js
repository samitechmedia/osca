import Vue from 'vue';
import VueRouter from 'vue-router';
import FreeGames from './components/pages/free-games.vue';
import GameReview from './components/pages/game-review.vue';
import Dev from './dev.vue';
import Store from './helpers/store';
import 'focus-visible';
import './mixins/sass';
import './themes/red/index.scss';

Vue.use(VueRouter);
Vue.use(Store);

const routes = [
  {
    path: '/free-games',
    component: FreeGames,
  },
  {
    path: '/review',
    component: GameReview,
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

new Vue({
  render: h => h(Dev),
  router,
}).$mount('#app');
