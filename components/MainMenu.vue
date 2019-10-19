<template>
  <div class="nav_primary_wrap">
    <nav class="nav_primary">
      <div class="container container--nav_primary">
        <ul>
          <li
            v-for="item in items"
            :key="item.ID"
            :class="item.classes[0]"
            @click="handleClick(item.title)"
          >
            <nuxt-link :to="item.url.replace('http://fabricepallaud.com', '')">
              {{ item.title }}
            </nuxt-link>
          </li>
        </ul>

        <social-links :menu-bar="true" />
        <app-hamburger
          class="app-hamburger"
          aria-label="button-menu"
          @click.native="$store.commit('SET_MOBILE_MENU', !mobileMenuOpen)"
        />
      </div>
    </nav>

    <mobile-navigation />
  </div>
</template>

<script>
import { mapState } from 'vuex'
import SocialLinks from '@/components/SocialLinks'
import AppHamburger from '@/components/AppHamburger'
import MobileNavigation from '@/components/MobileNavigation'

export default {
  components: {
    SocialLinks,
    AppHamburger,
    MobileNavigation
  },
  data () {
    return {
      items: []
    }
  },
  computed: {
    ...mapState({
      baseUrl: state => state.baseUrl,
      mobileMenuOpen: state => state.mobileMenuOpen,
      portfolioOpen: state => state.portfolioOpen
    })
  },
  mounted () {
    this.$axios.$get(`${this.baseUrl}/wp-json/menus/v1/main_menu`)
      .then((res) => {
        this.items = res
      })
      .catch((err) => {
        this.$toast.error(err.response)
      })
  },
  methods: {
    handleClick (item) {
      if (item === 'Portfolio') {
        this.$store.commit('SET_PORTFOLIO', !this.portfolioOpen)
      }
    }
  }
}
</script>

<style lang="scss">
.nav_primary_wrap,
.nav_primary {
  height: 54px;
}

.nav_primary_regular {
  position: relative;
}

.nav_primary {
  background: $brown;
  padding: 12px 0;
  height: 54px;
  box-sizing: border-box;

  @include media_600 {
    overflow: hidden;
  }

  ul {
    display: flex;
    justify-content: space-between;
  }

  li {
    padding-left: 35px;
    background-repeat: no-repeat;
    position: relative;
    font-family: 'icomoon';
    font-size: 22px;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    @include media_750 {
      padding-left: 0 !important;
      background: none !important;
    }
  }

  li:before {
    position: absolute;
    top: 3px;
    left: 0;
    @include media_750 {
      display: none;
    }
  }

  li + li {
    margin-left: 60px;
    @include media_800 {
      margin-left: 40px;
    }
    @include media_750 {
      margin-left: 35px;
    }
    @include media_600 {
      margin-left: 29px;
    }
  }

  li.menu_portfolio,
  li.menu_quote {
    float: right;
    @include media_600 {
      float: left;
    }
  }

  a {
    @include top_menu;
    color: $white;
    display: block;
  }

  .menu_home {
    @include media_960 {
      display: none;
    }
    @include media_600 {
      display: block;
      text-indent: -9999px;
      background-size: contain !important;
      width: 25px;
      height: 28px;
      background: url('~assets/img/logo_mobile.svg') 0 50% no-repeat !important;
    }
  }
}

.nav_primary .menu_home a {
  transition: none;
}

.nav_primary .menu_home:before {
  content: "\e902";
}

.nav_primary .menu_home.menu_home--sticky {
  display: block;
  text-indent: -9999px;
  background: url( '~assets/img/logo_desktop.svg' ) 0 50% no-repeat !important;
  background-size: contain !important;
  width: 150px;
  height: 30px;
  padding-left: 0;
  position: relative;
  margin-right: 43px;
}

.nav_primary .menu_home.menu_home--sticky:after {
  position: absolute;
  content: '';
  left: 85px;
  top: 50%;
  transform: translateY(-50%);
  width: 100px;
  height: 54px;
  background: $red;
  z-index: -1;

}

.nav_primary .menu_about {
  background-position: 0 1px;
  padding-left: 32px;
  @include media_960 {
    margin: 0;
  }
  @include media_600 {
    margin-left: 32px;
  }
}

.nav_primary .menu_about:before {
  content: "\e971";
}

.nav_primary .menu_contact {
  @include media_600 {
    margin-left: 0;
  }
}

.nav_primary .menu_contact:before {
  content: "\e96b";
  top: 4px;
}

.nav_primary .menu_portfolio {
  margin-left: auto;
  padding-left: 39px;
  @include media_600 {
    display: none;
  }
}

.nav_primary .menu_portfolio:before {
  content: "\e90f";
}

.nav_primary .menu_portfolio a {
  color: $yellow;
  @include media_600 {
    color: $white;
  }
  @include media_415 {
    color: $yellow;
  }
}

.nav_primary .menu_about,
.nav_primary .menu_contact {
  @include media_600 {
    display: none;
  }
}

.mobile-navigation ul a.router-link-exact-active,
.nav_primary .router-link-exact-active {
  color: $red;
}

.app-hamburger {
  @include media_600_up {
    display: none;
  }
}
</style>
