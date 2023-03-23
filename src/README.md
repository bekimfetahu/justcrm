## SSO with JustCRM

**Installation**

``composer require justcrm/crm``

**Vue component**

Usage:
``<CrmLogin>Login with JustCRM</CrmLogin>``

CrmLogin.vue

Create a Vue component and add call it in front end. No other setup required
```<script setup>
import {ref, onMounted} from 'vue'
import axios from "axios";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const ssoAccess = ref('')

const login = () => {
   getSsoAccess().then((res)=>{
     window.open(ssoAccess.value, '', "width=800,height=436");
   })
}

onMounted(() => {
  window.addEventListener("message", function (event) {

    if (event.data.connected === true && event.data.connectionToken) {
      loginBackend(event.data.connectionToken)
    }
  });
})


const loginBackend = (justcrm_token) => {

  axios.get(route('justcrm.token', justcrm_token))
      .then((res) => {
        console.log(res)
        // location.reload();
      }).catch((err) => {
    console.log(err)
  })
}

async function getSsoAccess() {
  await axios.get(route('justcrm.sso_access'))
      .then((res) => {
        ssoAccess.value = res.data + '?r=' + encodeURIComponent(window.location.href)
      }).catch((err) => {
      })
}

</script>

<template>
  <SecondaryButton @click.prevent="login" v-if="!$page.props.auth.user && route().has('justcrm.sso_access')">
    <slot/>
  </SecondaryButton>
</template>


```
Add to .env
```
JUSTCRM_URL="https://compassionate-archimedes.88-208-212-203.plesk.page"
JUSTCRM_CLIENT_ID=""
JUSTCRM_CLIENT_SECRET=""
JUSTCRM_CUSTOMER_ID=""```
