<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Login</ion-title>
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
        <ion-input v-model="Email" type="email" @ionInput="validate" @ionBlur="markTouched"></ion-input>
        <ion-note slot="error">Invalid email</ion-note>
      </ion-item>
      <ion-item fill="solid" ref="items">
        <ion-label position="floating">Password</ion-label>
        <ion-input v-model="Password" type="password" @ionInput="valid" @ionBlur="markTouch"></ion-input>
        <ion-note class="alert" slot="error">Password length must be higher than 8</ion-note>
      </ion-item>
      <ion-button @Click="loginUsers()" expand="" color="dark">
        <ion-text />Login<ion-text />
      </ion-button>
      <ion-button href="/tabs/register" expand="" color="dark">
        <ion-text />Register<ion-text />
      </ion-button>
    </ion-content>
  </ion-page>
</template>
<!-- eslint-disable no-unused-vars -->
  
<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonInput, IonItem, IonLabel, IonNote } from '@ionic/vue';

let UserId;
let UserName;

let baseApiAddress = `https://electryshop.be/my-expenses/src/api/`;
let opties = {
  method: "POST", // *GET, POST, PUT, DELETE, etc.
  mode: "cors", // no-cors, *cors, same-origin
  cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
  credentials: "omit", // include, *same-origin, omit
};

export default defineComponent({
  name: 'LoginPage',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonInput, IonItem, IonLabel, IonNote },
  methods: {
    loginUsers() {
      let self = this
      let url = baseApiAddress + "Login.php";
      opties.body = JSON.stringify({
        Email: this.Email,
        Password: this.Password
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
            localStorage.setItem('UserId', list[0].Id);
            localStorage.setItem('UserName', list[0].Username);
            self.$router.push({ path: '/tabs/home' });
          } else {
            alert("Wrong Combination, Probeer opnieuw");
          }
        })
        .catch(function (error) {
          console.log(error)
        });
    },

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
    }
  },

});
</script>