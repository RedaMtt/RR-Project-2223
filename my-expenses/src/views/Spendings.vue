<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title slot="start">Home</ion-title>
        <ion-button color="dark" slot="end" @click="Refresh()"><ion-icon :icon="refresh"/></ion-button>
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
      <canvas id="myChart"></canvas>
      <ion-title id="TotalSpent"></ion-title>
    </ion-content>
  </ion-page>
</template>

<style>
#TotalSpent {
  display: flex;
  justify-content: center;
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
import { Chart } from 'chart.js/auto';
import { refresh } from 'ionicons/icons';

let opties = {
  method: "POST", // *GET, POST, PUT, DELETE, etc.
  mode: "cors", // no-cors, *cors, same-origin
  cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
  credentials: "omit" // include, *same-origin, omit
}

let ctx;
let CategoryAmount = [];
let CategoryName = [];
let TotalSpent = 0.00;

export default defineComponent({
  name: 'Tab1Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  setup() {
    return {
      refresh
    }
  },
  mounted() {



    let url = 'https://electryshop.be/my-expenses/src/api/SpendingGet.php'

    // eslint-disable-next-line no-unused-vars
    let self = this
    opties.body = JSON.stringify({
      UserId: localStorage.getItem("UserId")
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
          let Category = responseData.data

          for (let i = 0; i < Category.length; i++) {
            CategoryAmount.push(
              Category[i].TotalAmount
            );
            CategoryName.push(
              Category[i].Name
            );
            TotalSpent += Category[i].TotalAmount
          }
          let income = document.getElementById("Income")
          let spent = document.getElementById("Spent")
          let balance = document.getElementById("Balance")
          income.innerHTML = localStorage.getItem('Income')
          spent.innerHTML = localStorage.getItem('TotalSpent')
          balance.innerHTML = localStorage.getItem('Balance')
          localStorage.setItem('TotalSpent', TotalSpent.toFixed(2));
          document.getElementById("TotalSpent").innerHTML = `Total Spent: ${TotalSpent.toFixed(2)}`
          ctx = document.getElementById('myChart');
          new Chart(ctx, {
            type: 'pie',
            data: {
              labels: CategoryName,
              datasets: [{
                label: '# Spent in Total per Category',
                data: CategoryAmount,
                borderWidth: 2,
                backgroundColor: [
                  "rgba(181, 127, 76, 0.5)",
                  "rgba(241, 250, 91, 0.5)",
                  "rgba(244, 32, 70, 0.5)",
                  "rgba(122, 224, 176, 0.5)",
                  "rgba(35, 4, 136, 0.5)",
                  "rgba(198, 217, 186, 0.5)",
                  "rgba(187, 174, 235, 0.5)",
                  "rgba(29, 177, 248, 0.5)",
                  "rgba(228, 189, 189, 0.5)",
                  "rgba(102, 247, 210, 0.5",
                ],
                borderColor: [
                  "rgba(181, 127, 76, 1)",
                  "rgba(241, 250, 91, 1)",
                  "rgba(244, 32, 70, 1)",
                  "rgba(122, 224, 176, 1)",
                  "rgba(35, 4, 136, 1)",
                  "rgba(198, 217, 186, 1)",
                  "rgba(187, 174, 235, 1)",
                  "rgba(29, 177, 248, 1)",
                  "rgba(228, 189, 189, 1)",
                  "rgba(102, 247, 210, 1",
                ]
              }]
            },
            options: {
              legend: {
                position: 'bottom',
              },
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        } else {
          alert("Wrong Combination, Probeer opnieuw");
        }
      })
      .catch(function (error) {
        console.log(error)
      });

    fetch(url)
      .then(response => response.json())
      .then(responseData => {
        this.data = responseData;

      })
      .catch(error => {
        console.log(error);
      });


  },
  methods: {
    Refresh() {
      window.location.reload();
    }
  }
});



</script>