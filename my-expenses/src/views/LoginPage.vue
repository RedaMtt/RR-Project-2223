<template>
    <ion-page>
        <ion-header>
            <ion-toolbar>
                <ion-title>Login </ion-title>
            </ion-toolbar>
        </ion-header>
        <ion-content :fullscreen="true">
            <ion-header collapse="condense">
                <ion-toolbar>
                    <ion-title size="large">Login Page</ion-title>
                </ion-toolbar>
            </ion-header>
            <ion-item fill="solid" ref="item">
                <ion-label position="floating">Email</ion-label>
                <ion-input type="email" @ionInput="validate" @ionBlur="markTouched"></ion-input>
                <ion-note slot="helper">Enter a valid email</ion-note>
                <ion-note slot="error">Invalid email</ion-note>
            </ion-item>
            <ion-item fill="solid" ref="items">
                <ion-label position="floating">Password</ion-label>
                <ion-input type="password" @ionInput="valid" @ionBlur="markTouch"></ion-input>
                <ion-note slot="helper">Password length must be higher than 8</ion-note>
                <ion-note slot="error">Invalid Password have 8 or more characters</ion-note>
            </ion-item>
            <ion-button expand="" color="dark">
              <ion-text/>Login<ion-text/>
            </ion-button>
            <ion-button expand="" color="dark">
              <ion-text/>Register<ion-text/>
            </ion-button>
            <ion-button router-link="/home" expand="" color="dark">
              <ion-text/>Skip<ion-text/>
            </ion-button>
        </ion-content>
    </ion-page>
</template>

  
<script>
import { defineComponent } from 'vue';
import HomePage from '@/views/Home.vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonInput, IonItem, IonLabel, IonNote } from '@ionic/vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: HomePage,
  },
];

export default defineComponent({
    name: 'LoginPage',
    components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonInput, IonItem, IonLabel, IonNote },
    methods: {
      validateEmail(email) {
        return email.match(/^(?=.{1,254}$)(?=.{1,64}@)[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/);
      },

      validate(ev) {
        const value = ev.target.value;

        this.$refs.item.$el.classList.remove('ion-valid');
        this.$refs.item.$el.classList.remove('ion-invalid');

        if (value === '') return;

        this.validateEmail(value)
          ? this.$refs.item.$el.classList.add('ion-valid')
          : this.$refs.item.$el.classList.add('ion-invalid');
      },

      markTouch() {
        this.$refs.item.$el.classList.add('ion-touched')
      },
      validatePassword(password) {
        return password.match(/([a-z] + [A-Z])*$/);
      },

      valid(ev) {
        const value = ev.target.value;

        this.$refs.items.$el.classList.remove('ion-valid');
        this.$refs.items.$el.classList.remove('ion-invalid');

        if (value === '') return;

        this.validateEmail(value)
          ? this.$refs.items.$el.classList.add('ion-valid')
          : this.$refs.items.$el.classList.add('ion-invalid');
      },

      markTouched() {
        this.$refs.item.$el.classList.add('ion-touched')
      },
      goToHome(){
        this.route.navigate([routes[0]]);
      }
    },

});
</script>