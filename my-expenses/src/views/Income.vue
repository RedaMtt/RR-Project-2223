<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-button slot="start" size="small" class="backBtn" color="white" href="/tabs/home">
          back
        </ion-button>
        <ion-title>Income</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">

      <ion-item counter="true">
        <ion-label position="fixed">Username</ion-label>
        <ion-label position="fixed" v-model="userIds"></ion-label>
      </ion-item>

      <ion-item counter="true">
        <ion-label position="fixed">Amount</ion-label>
        <ion-input type="number" ref="amount" clear-input maxlength="12" placeholder="0.00"></ion-input>
      </ion-item>

      <ion-button class="sendBtn" @click="sendIncome()">
        Send
      </ion-button>

      <ion-button class="sendBtn" @click="test()">
        Send
      </ion-button>

    </ion-content>
  </ion-page>
</template>

<style>
.userId {
  padding-left: 8px;
  opacity: 0.5;
}

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
  name: 'incomePage',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  mounted(){
    this.userIds.value = localStorage.getItem('UserName')
  },
  setup() {
    return {

    }
  },
  methods: {
    sendIncome() {
      let self = this
      let url = baseApiAddress + "Income.php";
      opties.body = JSON.stringify({
        Id: localStorage.getItem('UserId'),
        Balance: this.$refs.amount.value
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
            alert("Income Added");
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
});
</script>
