<template>
  <div id="app">
    <h2>Liste des infos de la base de données</h2>

    <p>
      Il y a trois tables dans la base de données : "Client", "Message" et "Photo". La table client dispose d'une liaison OneToOne avec les deux autres tables afin de lier une photo et un message à un client.<br><br>
      je m'excuse pour le front très "inexistant" en terme de mise en page.
    </p>
    <br>
    - - - - - - - - - - - - - - - - - - - - - - - - - -
    <br>
    <ul id="task-list">
       <li v-for="client in clients" :key="client.id">
         <h3>Client numéro : {{ client[0] }}</h3>
         <p>{{ client[1] + ' ' + client[2] }}</p>
        <img alt="" :src='`../images/`+client[3]'>
        <p>{{ client[4] }}</p>
       </li>
     </ul>
  </div>
</template>

<script>
/*export default {

  name: "App",

  data: () => ({}),
};*/

import UserRequests from "./api/UserRequests.js";

export default {
  data() {
    return {
      clients: [],
    };
  },

  mounted() {
    let el = document.querySelector("div[data-clients]");
    let myclients = el.dataset.clients.split(";");
    for (let key in myclients) {
      myclients[key] = myclients[key].split('?');
    }

    this.clients.push.apply(this.clients, myclients);
  },

  methods: {
    /*refresh() {
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
      console.log("test2");
      return UserRequests.getAll()
        .then((data) => {
          console.log(data);
          return data;
        })
        .catch((error) => {
          this.noDataText =
            "Aucune donnée n'a été récupérée (problème connexion serveur)";

          console.error(error);
        });
    },*/
  },
};
</script>

<style>

</style>