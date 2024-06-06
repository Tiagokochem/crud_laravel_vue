import Vue from 'vue';
import Router from 'vue-router';
import Levels from '@/views/Levels.vue';
import Developers from '@/views/Developers.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/levels',
      name: 'Levels',
      component: Levels
    },
    {
      path: '/developers',
      name: 'Developers',
      component: Developers
    },
    {
      path: '*',
      redirect: '/levels'
    }
  ]
});