<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-button slot="start" size="small" class="backBtn" color="white" href="/tabs/Settings">
          back
        </ion-button>
        <ion-title>Change Username</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">

      <ion-item counter="true">
        <ion-label position="fixed">New Name</ion-label>
        <ion-input type="text" id="Username" clear-input maxlength="12" placeholder="Username"></ion-input>
      </ion-item>

      <ion-item counter="true">
        <ion-label position="fixed">Password</ion-label>
        <ion-input type="Password" id="Password" clear-input maxlength="120" placeholder="Password"></ion-input>
      </ion-item>

      <ion-button class="sendBtn" @click="changeName()">
        Change
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
    
  },
  setup() {
    return {

    }
  },
  methods: {
    changeName() {
      let self = this;
      let url = 'https://electryshop.be/my-expenses/src/api/UsernameUpdate.php';
    opties.body = JSON.stringify({
      Username: document.getElementById("Username").value,
      Password: document.getElementById("Password").value,
      Id: localStorage.getItem("UserId"),
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
          localStorage.setItem("UserName", document.getElementById("Username").value)
          alert("Username Changed Succesfully")
          self.$router.push({ path: '/tabs/Settings' });
        } else {
          alert("Wrong Combination, Probeer opnieuw");
        }
      })
      .catch(function (error) {
        console.log(error)
      });
    }
  }
});
</script>
