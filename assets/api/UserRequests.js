/* Non opérationnel */

import Vue from 'vue'
import VueResource from 'vue-resource'
import { EventEmitter } from 'events'
import { Promise } from 'es6-promise'

const UserRequests = new EventEmitter()
export default UserRequests

Vue.use(VueResource)

let contentType = 'application/json'

UserRequests.getAll = () => {
    return new Promise((resolve, reject) => {
      Vue.http.get('/accueil')
        .then(response => {
          resolve(response.data)
        })
        .catch(response => {
          reject(response.bodyText)
        })
    })
  }

  Vue.http.interceptors.push(function (request) {
    request.headers.set('Content-Type', contentType)
  })