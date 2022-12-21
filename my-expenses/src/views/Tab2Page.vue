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
        <ion-row>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Day</ion-col>
          <ion-col class="daySpending" size="6" size-md="4" size-lg="2">0,00</ion-col>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Month</ion-col>
          <ion-col class="monthSpending" size="6" size-md="4" size-lg="2">0,00</ion-col>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Year</ion-col>
          <ion-col class="yearSpending" size="3" size-md="1" size-lg="2">0,00</ion-col>
        </ion-row>
      </ion-grid>
      <ion-grid>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="person" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="airplane" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="car" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="analytics" />
            </ion-button>
          </ion-col>
          <ion-col size="">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="bookmark" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="shirt" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="cart" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="help" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button expand="block" color="dark">
              <ion-icon :icon="pizza" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="12">
            <ion-button expand="block" color="dark">
              Income/Revenue
            </ion-button>
          </ion-col>
        </ion-row>
      </ion-grid>
    </ion-content>
  </ion-page>
</template>

<style>
ion-icon {
  font-size: 64px;
}

ion-button {
  --border-radius: 0;
  --border-color: rgb(103, 103, 103);
  --border-style: solid;
  --margin-width: 20px;
}
</style>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import { person, airplane, cart, car, analytics, pizza, shirt, cash, help, bookmark } from 'ionicons/icons';

export default defineComponent({
  name: 'Tab2Page',
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
      bookmark
    }
  }
});
</script>
