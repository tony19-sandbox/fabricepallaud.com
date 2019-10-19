<template>
  <div class="app">
    <app-header />
    <nuxt />
    <app-footer />
    <!-- <cookie-notice /> -->
  </div>
</template>

<script>
// import Cookies from 'js-cookie'
import AppHeader from '@/components/AppHeader'
import AppFooter from '@/components/AppFooter'
// import CookieNotice from '@/components/CookieNotice'

export default {
  // components: {
  //   AppHeader,
  //   AppFooter,
  //   CookieNotice
  // },
  components: {
    AppHeader,
    AppFooter
  },
  mounted () {
    // const cookies = Cookies.get('cookie_notice_dismiss')
    // this.$store.commit('SET_COOKIE_NOTICE_STATUS', !cookies)
  }
}
</script>
