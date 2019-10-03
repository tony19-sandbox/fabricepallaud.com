<template>
  <header class="banner">
    <div class="container container--header">
      <a class="header__branding" href="/">
        <img
          class="header__branding__logo"
          src="@/assets/img/logo_desktop.svg"
        >
        <div class="logo_square" />
      </a>
      <ul class="social_links">
        <li>
          <a class="linkedin" href="https://www.linkedin.com/in/fabrice-pallaud-b8b4ba24/" />
        </li>
        <li>
          <a class="github" href="https://github.com/fabricepallaud" />
        </li>
      </ul>
    </div>
  </header>
</template>

<!-- <script>
  import { mapState, mapGetters } from 'vuex'
  import { HeaderMenu } from '../utils/structures'
  import AppHamburger from '@/components/AppHamburger'

  export default {
    components: {
      MobileNavigation
    },
    data () {
      return {
        menu: HeaderMenu,
        showSearch: false
      }
    },
    computed: {
      ...mapState({
        mobileMenuOpen: state => state.mobileMenuOpen,
        showMainBanner: state => state.config.showMainBanner
      }),
      ...mapGetters({
        isLoggedIn: 'auth/isLoggedIn',
        userAvatar: 'auth/userAvatar'
      }),
      accountLink () {
        return this.$device.isMobile ? '/account' : '/account/gegevens'
      }
    },
    methods: {
      triggerLogin () {
        this.$store.commit('modal/COMPONENT', 'AppOnboarding')
        this.$store.commit('modal/OPEN', true)
      }
    }
  }
</script>

<style lang="scss">
  .app-header {
    position: relative;
    height: 6.4rem;
  }

  .app-header-content {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    height: 6.4rem;
    padding: 1.2rem;
    z-index: 99;

    @include breakpoint(large) {
      padding: 1.2rem 3.2rem;
    }

  }

  .header-logo-container {
    position: relative;
    flex: 1;

    .site-logo-link {
      display: inline-block;
      margin-right: 2.4rem;
      outline: none;
      cursor: pointer;
    }

    .svg-inline-logo {
      height: 2.4rem;
      width: 9rem;

      svg {
        width: auto;
      }
    }
  }
</style> -->
