<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Transactions</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 3</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-button @click="getStudent()">test</ion-button>
      <ion-list id="Transactions"></ion-list>
    </ion-content>
  </ion-page>
</template>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';

let baseApiAddress = `https://electryshop.be/my-expenses/src/api/`;
let opties = {
  method: "POST", // *GET, POST, PUT, DELETE, etc.
  mode: "no-cors", // no-cors, *cors, same-origin
  cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
  credentials: "omit", // include, *same-origin, omit
}


export default defineComponent({
  data() {
    return {
      items: []
    };
  },
  name: 'Tab3Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  mounted() {
    console.log("works")
    /*let url = baseApiAddress + "Transactions.php";
    opties.body = JSON.stringify({
    });

    fetch(url, opties)
      .then(function (response) {
        return response.json();
      })
      .then(function (responseData) {

        let list = responseData.data;

        if (list.length > 0) {
          let hey = document.getElementById("Transactions")

          for (let i = 0; i < 8; i++) {
            hey.innerHTML += `<ion-item>test</ion-item>`
          }

          alert(hey);
        } else {
          alert("Studenten lijst kon niet opgevraagd worden");
        }

      })
      .catch(function (error) {
        console.log(error)
      });*/
  },
  methods:
  {
    getStudent() {
      let url = baseApiAddress + "Transactions.php";
      opties.body = JSON.stringify({
      });

      fetch(url, opties)
        .then(function (response) {
          console.log(response)
          return response.json();
        })
        .then(function (responseData) {

          let list = responseData.data;
          console.log(list)
          if (list.length > 0) {

            let hey = document.getElementById("Transactions")

            for (let i = 0; i < 8; i++) {
              hey.innerHTML += `<ion-item>test</ion-item>`
            }

            alert(hey);
          } else {
            alert("Studenten lijst kon niet opgevraagd worden");
          }

        })
        .catch(function (error) {
          console.log(error)
        });
    },
    test() {
      let hey = document.getElementById("Transactions")
      hey.innerHTML += `<ion-item>
          test
        </ion-item>`
    }
  }
});
</script>
