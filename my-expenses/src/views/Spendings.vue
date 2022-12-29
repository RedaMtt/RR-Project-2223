<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Home</ion-title>
        <ion-avatar size="small" slot="end">
          <img alt="Silhouette of a person's head" src="https://ionicframework.com/docs/img/demos/avatar.svg" />
        </ion-avatar>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Home</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-list>
        <ion-item>
          <ion-item slot="start">€10,00</ion-item>
          <ion-item slot="end">Fruit</ion-item>
        </ion-item>

        <ion-item>
          <ion-item slot="start">€100,00</ion-item>
          <ion-label>Banaanhangwagen</ion-label>
          <ion-item slot="end">Groente</ion-item>
        </ion-item>

      </ion-list>
    </ion-content>
  </ion-page>
</template>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';

export default defineComponent({
  name: 'Tab1Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage }
});



</script>