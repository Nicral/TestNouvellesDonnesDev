/* Non opérationnel */

import Vue from 'vue'
import Router from 'vue-router'

import Accueil from '../components/Accueil'

Vue.use(Router)

export default new Router({
    
  mode: 'history',

  routes: [
    {
      path: '/accueil',
      name: 'Accueil',
      component: Accueil
    }
  ]
})