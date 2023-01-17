<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Spendings</ion-title>

      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-grid>
        <ion-row v-model="test">
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Day</ion-col>
          <ion-col v-model="daySpending" size="6" size-md="4" size-lg="2"><ion-text>0,00</ion-text></ion-col>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Month</ion-col>
          <ion-col v-model="monthSpending" size="6" size-md="4" size-lg="2">0,00</ion-col>
          <ion-col offset="1" size="3" size-md="4" size-lg="2">Year</ion-col>
          <ion-col v-model="yearSpending" size="6" size-md="1" size-lg="2">0,00</ion-col>
          <ion-text v-model="Welcome">d</ion-text>
        </ion-row>
      </ion-grid>
      <ion-grid class="test">
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button @click="test(e)" class="icon" id="person" v-model="person" expand="block" color="dark">
              <ion-icon :icon="person" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="airplane" v-model="airplane" expand="block"
              color="dark">
              <ion-icon :icon="airplane" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="car" v-model="car" expand="block" color="dark">
              <ion-icon :icon="car" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="analytics" v-model="analytics" expand="block"
              color="dark">
              <ion-icon :icon="analytics" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="bookmark" v-model="bookmark" expand="block"
              color="dark">
              <ion-icon :icon="bookmark" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="shirt" v-model="shirt" expand="block" color="dark">
              <ion-icon :icon="shirt" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="cart" v-model="cart" expand="block" color="dark">
              <ion-icon :icon="cart" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="help" v-model="help" expand="block" color="dark">
              <ion-icon :icon="help" />
            </ion-button>
          </ion-col>
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="pizza" v-model="pizza" expand="block" color="dark">
              <ion-icon :icon="pizza" />
            </ion-button>
          </ion-col>
        </ion-row>
        <ion-row class="ion-justify-content-around">
          <ion-col size="12">
            <ion-button v-model="income" href="/tabs/Income" expand="block" color="dark">
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

#income {
  font-size: 20px;
  font-weight: bold;
}
</style>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonList, IonItem, IonSelect, IonSelectOption } from '@ionic/vue';
import { person, airplane, cart, car, analytics, pizza, shirt, cash, help, bookmark } from 'ionicons/icons';

// eslint-disable-next-line no-unused-vars
let icon = document.getElementsByClassName("icon")
console.log(icon)
/*localStorage.setItem('key', 'value');*/

export default defineComponent({
  name: 'HomePage',
  // eslint-disable-next-line vue/no-unused-components
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonList, IonItem, IonSelect, IonSelectOption },
  mount() {

  },
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
    test(e) {
      let className = e.target.className
      console.log(className)

      localStorage.setItem('Category', e.currentTarget.className);
    }
  }
});


</script>
