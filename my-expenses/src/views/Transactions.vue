<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title slot="start">Transactions</ion-title>
        <ion-button color="dark" slot="end" @click="fetchData()"><ion-icon :icon="refresh" /></ion-button>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 3</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-list id="Transactions"></ion-list>
    </ion-content>
  </ion-page>
</template>

<style>
#Transactions ion-item{
  margin-bottom: 10px;
}

</style>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import { refresh } from 'ionicons/icons';



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
    let url = 'https://electryshop.be/my-expenses/src/api/Transactions.php';

    fetch(url)
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
      });
  },
  methods:
  {
    fetchData() {
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
