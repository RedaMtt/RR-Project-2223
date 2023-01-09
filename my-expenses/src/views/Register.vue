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
        <ion-label position="floating">Username</ion-label>
        <ion-input id="Username" type="username" @ionInput="validate" @ionBlur="markTouched"></ion-input>
        <ion-note slot="helper">Enter a Username</ion-note>
      </ion-item>
      <ion-item fill="solid" ref="item">
        <ion-label position="floating">Email</ion-label>
        <ion-input id="Email" type="email" @ionInput="validate" @ionBlur="markTouched"></ion-input>
        <ion-note slot="helper">Enter a valid email</ion-note>
        <ion-note slot="error">Invalid email</ion-note>
      </ion-item>
      <ion-item fill="solid" ref="items">
        <ion-label position="floating">Password</ion-label>
        <ion-input id="Password" type="password" @ionInput="valid" @ionBlur="markTouch"></ion-input>
        <ion-note slot="helper">Password length must be higher than 8</ion-note>
        <ion-note slot="error">Invalid Password have 8 or more characters</ion-note>
      </ion-item>
      <ion-button href="/loginPage" expand="" color="dark">
        <ion-text />Login<ion-text />
      </ion-button>
      <ion-button @Click="registerUser()" expand="" color="dark">
        <ion-text />Register<ion-text />
      </ion-button>
      <ion-button href="/tabs/home" expand="" color="dark">
        <ion-text />Skip<ion-text />
      </ion-button>
    </ion-content>
  </ion-page>
</template>

  
<script>
import { defineComponent } from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonInput, IonItem, IonLabel, IonNote } from '@ionic/vue';

let baseApiAddress = `https://electryshop.be/my-expenses/src/api/`;
let alertEl = document.getElementById("alert");
let opties = {
  method: "POST", // *GET, POST, PUT, DELETE, etc.
  mode: "cors", // no-cors, *cors, same-origin
  cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
  credentials: "omit", // include, *same-origin, omit
};

export default defineComponent({
  name: 'RegisterPage',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonInput, IonItem, IonLabel, IonNote },
  methods: {
    registerUser() {
      let url = baseApiAddress + "Register.php";
      opties.body = JSON.stringify({
        Username: document.getElementById("Username").value,
        Email: document.getElementById("Email").value,
        Password: document.getElementById("Password").value,
        Balance: null,
        Id: null
      });
      fetch(url, opties)
        .then(function (response) {
          return response.json();
        })
        .then(function (responseData) {
          if (responseData.status < 200 || responseData.status > 299) {
            alert("Probleem met registreren, Probeer opnieuw");
            return;
          }
          let list = responseData.data;
          if (list.length > 0) {
            alert("U bent geregistreerd");
          } else {
            alert("regsitration failed : Probeer opnieuw");
          }
        })
        .catch(function (error) {
          alertEl.innerHTML = "fout : " + error;
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
    test() {
      this.$router.push({
        name: 'HomePage'
      });
    }
  },

});
</script>