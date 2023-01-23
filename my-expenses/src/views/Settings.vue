<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Settings</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-item counter="true">
        <ion-text>Privacy</ion-text>
      </ion-item>
      <ion-item>
        <ion-text>At My-expenses, we understand that your financial information is personal and private. That's why we
          take great care to ensure the security and confidentiality of your data. Our app uses industry-standard
          encryption to protect your information as it is transmitted and stored on our servers. Additionally, we have
          implemented strict access controls to prevent unauthorized access to your data.<br><br>
          We are also committed to being transparent about the data we collect and how we use it. Our app tracks your
          expenses to provide you with helpful insights and budgeting tools. The information is only used to improve
          your experience within the app and is never shared with third parties without your explicit consent.<br><br>
          We take the protection of your privacy very seriously, and we will continue to take steps to ensure that your
          data is kept safe and secure. Thank you for choosing My-expenses.</ion-text>
      </ion-item>
      <ion-item counter="true">

      </ion-item>
      <ion-item counter="true">
        <ion-text>to change Username =></ion-text>
        <ion-button href="/tabs/SettingsUpdate">Change Username</ion-button>
      </ion-item>

    </ion-content>
  </ion-page>
</template>

<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';

export default defineComponent({
  name: 'Tab3Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage },
  methods: {
    test() {
      let hey = document.getElementById("a")
      hey.innerHTML += `<ion-item>
          test
        </ion-item>`
    }
  }
});
</script>
