<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Spendings</ion-title>

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
      <ion-grid class="test">
        <ion-row class="ion-justify-content-around">
          <ion-col size="4">
            <ion-button href="/tabs/Transaction" class="icon" id="person" v-model="person" expand="block" color="dark">
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
.a {
  display: flex;
  justify-content: center;
  background-color: rgb(41, 41, 41);
  border: 2px rgb(26, 25, 25) solid;
}

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


export default defineComponent({
  name: 'HomePage',
  // eslint-disable-next-line vue/no-unused-components
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonList, IonItem, IonSelect, IonSelectOption },
  mounted() {
    let income = document.getElementById("Income")
    let spent = document.getElementById("Spent")
    let balance = document.getElementById("Balance")
    let userid = localStorage.getItem('UserId') - 1
    
    let url = 'https://electryshop.be/my-expenses/src/api/UserGet.php'
    fetch(url)
      .then(response => response.json())
      .then(responseData => {
        this.data = responseData;
        // eslint-disable-next-line no-unused-vars
        let Income = responseData.data
        let totalSpent = localStorage.getItem('TotalSpent')
        income.innerHTML = Income[userid].Balance
        spent.innerHTML = `-${totalSpent}`
        let Balance = Income[userid].Balance - totalSpent
        balance.innerHTML = Balance
        localStorage.setItem('Income', Income[userid].Balance.toFixed(2));
        localStorage.setItem('Balance', Balance.toFixed(2));
        
      });
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
  }
});


</script>
