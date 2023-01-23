<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title slot="start">Transactions</ion-title>
        <ion-button color="dark" slot="end" @click="Refresh()"><ion-icon :icon="refresh" /></ion-button>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-grid>
        <ion-row>
          <ion-col class="a">
            <ion-label>Income</ion-label>
          </ion-col>
          <ion-col class="a">
            <ion-label>Spent</ion-label>
          </ion-col>
          <ion-col class="a">
            <ion-label>Balance</ion-label>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col class="a">
            <ion-label id="Income">Refresh</ion-label>
          </ion-col>
          <ion-col class="a">
            <ion-label id="Spent">Refresh</ion-label>
          </ion-col>
          <ion-col class="a">
            <ion-label id="Balance">Refresh</ion-label>
          </ion-col>
        </ion-row>
      </ion-grid>
      <ion-list id="Transactions"></ion-list>
    </ion-content>
  </ion-page>
</template>

<style>
#Transactions ion-item {
  margin-bottom: 10px;
}

.a {
  display: flex;
  justify-content: center;
  background-color: rgb(41, 41, 41);
  border: 2px rgb(26, 25, 25) solid;
}

</style>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import { refresh } from 'ionicons/icons';

let opties = {
  method: "POST", // *GET, POST, PUT, DELETE, etc.
  mode: "cors", // no-cors, *cors, same-origin
  cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
  credentials: "omit", // include, *same-origin, omit
};

export default defineComponent({
  data() {
    return {
      items: []
    };
  },
  name: 'Tab3Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  setup() {
    return {
      refresh
    }
  },
  mounted() {

    let income = document.getElementById("Income")
    let spent = document.getElementById("Spent")
    let balance = document.getElementById("Balance")
    income.innerHTML = localStorage.getItem('Income')
    spent.innerHTML = localStorage.getItem('TotalSpent')
    balance.innerHTML = localStorage.getItem('Balance')

    let url = 'https://electryshop.be/my-expenses/src/api/Transactions.php';
    opties.body = JSON.stringify({
      UserId: localStorage.getItem("UserId"),
    });
    fetch(url, opties)
      .then(function (response) {
        return response.json();
      })
      .then(function (responseData) {
        if (responseData.status < 200 || responseData.status > 299) {
          alert("Wrong Combination, Probeer opnieuw");
          return;
        }
        let list = responseData.data;
        if (list.length > 0) {
          let hey = document.getElementById("Transactions")
          for (let i = 0; i < responseData.data.length; i++) {
            hey.innerHTML += `<ion-item>` + "Amount: " + responseData.data[i].Amount + "<br>" + "Date: " + responseData.data[i].Date + "<br>" + "Comment: " + responseData.data[i].Comment + `</ion-item>`
          }
        } else {
          alert("Wrong Combination, Probeer opnieuw");
        }
      })
      .catch(function (error) {
        console.log(error)
      });


    /*fetch(url)
      .then(response => response.json())
      .then(responseData => {
        this.data = responseData;
        let hey = document.getElementById("Transactions")
        for (let i = 0; i < responseData.data.length; i++) {
          hey.innerHTML += `<ion-item>` + "Amount: " + responseData.data[i].Amount + "<br>" + "Date: " + responseData.data[i].Date + "<br>" + "Comment: " + responseData.data[i].Comment + `</ion-item>`
        }
      })
      .catch(error => {
        console.log(error);
      });*/
  },
  methods:
  {
    Refresh() {
      window.location.reload();
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
