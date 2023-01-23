<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-button slot="start" size="small" class="backBtn" color="white" href="/tabs/home">
          back
        </ion-button>
        <ion-title>Transaction</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">

      <ion-item>
        <ion-label position="fixed">Category</ion-label>
        <ion-select interface="action-sheet" id="Category" placeholder="Select Category"></ion-select>
      </ion-item>

      <ion-item>
        <ion-label position="fixed">Pick date</ion-label>
        <ion-datetime id="date" display-format:="DD/MM/YY" presentation="date-time"></ion-datetime>
      </ion-item>

      <ion-item counter="true">
        <ion-label position="fixed">Amount</ion-label>
        <ion-input type="number" id="amount" clear-input maxlength="12" placeholder="0.00"></ion-input>
      </ion-item>

      <ion-item counter="true">
        <ion-label position="fixed">description</ion-label>
        <ion-input id="comment" clear-input maxlength="120" placeholder="Coffee from starbucks"></ion-input>
      </ion-item>

      <ion-button class="sendBtn" @click="sendTransaction()">
        Send
      </ion-button>

    </ion-content>
  </ion-page>
</template>

<style>
.backBtn {
  --color: #ffffff;
}

.sendBtn {
  --color: #ffffff;
  --background: #1E1E1E;
  --border-radius: 5px;
  --border-color: #2A2A2A;
  --border-style: solid;
  --border-width: 2px;
}
</style>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';

let baseApiAddress = `https://electryshop.be/my-expenses/src/api/`;
let opties = {
  method: "POST", // *GET, POST, PUT, DELETE, etc.
  mode: "cors", // no-cors, *cors, same-origin
  cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
  credentials: "omit" // include, *same-origin, omit
}

export default defineComponent({
  name: 'transactionPage',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  mounted() {
    let url = 'https://electryshop.be/my-expenses/src/api/Category.php';


    fetch(url)
      .then(response => response.json())
      .then(responseData => {
        this.data = responseData;
        let Category = responseData.data
        for (let i = 0; i < Category.length; i++) {
          document.getElementById("Category").innerHTML += `<ion-select-option value="${Category[i].Id}">${Category[i].Name}</ion-select-option>`
        }
      })
      .catch(error => {
        console.log(error);
      });
  },
  setup() {
    return {

    }
  },
  methods: {
    sendTransaction() {
      let self = this
      if (document.getElementById("date").value.split('T')[0] != undefined && document.getElementById("amount").value != "" && document.getElementById("Category").value != undefined) {
        let url = baseApiAddress + "TransactionAdd.php";
        opties.body = JSON.stringify({
          CategoryId: document.getElementById("Category").value,
          UserId: localStorage.getItem('UserId'),
          Amount: document.getElementById("amount").value,
          Date: document.getElementById("date").value.split('T')[0],
          Comment: document.getElementById("comment").value
        });
        fetch(url, opties)
          .then(function (response) {
            return response.json();
          })
          .then(function (responseData) {
            if (responseData.status < 200 || responseData.status > 299) {
              alert("Probleem met inloggen, Probeer opnieuw");
              return;
            }
            let list = responseData.data;
            if (list.length > 0) {
              self.$router.push({ path: '/tabs/home' });
            } else {
              alert("regsitration failed : Probeer opnieuw");
            }
          })
          .catch(function (error) {
            console.log(error);
          });

      }
    }
  }
});
</script>
