<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Spendings</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 2</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-grid>
        <ion-row id="test">
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Day</ion-col>
          <ion-col id="daySpending" size="6" size-md="4" size-lg="2"><ion-text>0,00</ion-text></ion-col>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Month</ion-col>
          <ion-col id="monthSpending" size="6" size-md="4" size-lg="2">0,00</ion-col>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Year</ion-col>
          <ion-col id="yearSpending" size="6" size-md="1" size-lg="2">0,00</ion-col>
        </ion-row>
      </ion-grid>
      <ion-grid class="test">
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="person" expand="block" color="dark">
              <ion-icon :icon="person" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="airplane" expand="block" color="dark">
              <ion-icon :icon="airplane" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="car" expand="block" color="dark">
              <ion-icon :icon="car" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="analytics" expand="block" color="dark">
              <ion-icon :icon="analytics" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="bookmark" expand="block" color="dark">
              <ion-icon :icon="bookmark" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="shirt" expand="block" color="dark">
              <ion-icon :icon="shirt" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="cart" expand="block" color="dark">
              <ion-icon :icon="cart" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="help" expand="block" color="dark">
              <ion-icon :icon="help" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/transaction" class="icon" id="pizza" expand="block" color="dark">
              <ion-icon :icon="pizza" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="12">
            <ion-button id="income" expand="block" color="dark" @click="incomeAdd()">
              Income/Revenue
            </ion-button>
          </ion-col>
        </ion-row>
      </ion-grid>
    </ion-content>
  </ion-page>
</template>

<style>
.icon {
  font-size: 40px;
}

ion-button {
  --border-radius: 0;
  --border-color: rgb(103, 103, 103);
  --border-style: solid;
  --margin-width: 20px;
  height: 3.5em;
}

#income{
  font-size: 20px;
  font-weight: bold;
}

</style>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import { person, airplane, cart, car, analytics, pizza, shirt, cash, help, bookmark } from 'ionicons/icons';

export default defineComponent({
  name: 'HomePage',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  setup() {
    return {
      person,
      airplane,
      cart,
      car,
      analytics,
      pizza,
      shirt,
      cash,
      help,
      bookmark,
    }
  },
  methods: {
    incomeAdd() {
      
    },
    test(){
      console.log("hey")
      document.getElementById("daySpending").innerHTML = 55
    }
  }
});


</script>
