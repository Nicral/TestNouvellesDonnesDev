<!-- Non opérationnel -->

<template>
  <div>
    <h2>Test</h2>

  </div>
</template>

<script>

/* Non opérationnel */

import UserRequests from "../api/UserRequests.js";


export default {
  data() {
    return {
      users: [],
      usersDatasLoading: false,
    };
  },

  /* mounted() {
    this.refresh();
  },

  methods: {

    refresh() {
      this.getDataFromApi().then((data) => {
        this.users = data.items;
      });
    },
    getDataFromApi() {
      this.usersDatasLoading = true;

      return new Promise((resolve, reject) => {
        let items = [];

        this.getUsers()
          .then((data) => {
            items = data;

            if (items !== undefined && items !== null) {
              setTimeout(() => {
                this.usersDatasLoading = false;
                resolve({
                  items,
                });
              }, 1000);
            }
          })
          .catch((error) => {
            reject(error.bodyText);

            this.usersDatasLoading = false;

            console.error(error);
          });
      });
    },
    getUsers() {
      return UserRequests.getAll()
        .then((data) => {
          return data;
        })
        .catch((error) => {
          this.noDataText =
            "Aucune donnée n'a été récupérée (problème connexion serveur)";

          console.error(error);
        });
    },
  }, */
};
</script>

<style>
</style>