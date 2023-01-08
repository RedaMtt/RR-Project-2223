<template>
  <ion-page>
    <ion-tabs>
      <ion-router-outlet></ion-router-outlet>
      <ion-tab-bar slot="bottom">
        <ion-tab-button tab="Home" href="/tabs/home">
          <ion-icon :icon="home" />
          <ion-label>Home</ion-label>
        </ion-tab-button>
          
        <ion-tab-button tab="Spendings" href="/tabs/spendings">
          <ion-icon :icon="pricetags" />
          <ion-label>Spendings</ion-label>
        </ion-tab-button>
        
        <ion-tab-button tab="Transactions" href="/tabs/transactions">
          <ion-icon :icon="card" />
          <ion-label>Transactions</ion-label>
        </ion-tab-button>

        <ion-tab-button tab="Settings" href="/tabs/settings">
          <ion-icon :icon="settings" />
          <ion-label>Settings</ion-label>
        </ion-tab-button>
      </ion-tab-bar>
    </ion-tabs>
  </ion-page>
</template>

<script>
import { defineComponent } from 'vue';
import { IonTabBar, IonTabButton, IonTabs, IonLabel, IonIcon, IonPage, IonRouterOutlet } from '@ionic/vue';
import { home, pricetags, card, settings } from 'ionicons/icons';

export default defineComponent({
  name: 'TabsPage',
  components: { IonLabel, IonTabs, IonTabBar, IonTabButton, IonIcon, IonPage, IonRouterOutlet },
  setup() {
    return {
      home,
      pricetags,
      card,
      settings,
    }
  }
});
</script>
