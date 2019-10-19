<template>
  <div v-if="showCookieNotice" class="cookie-notice">
    <div class="notice-text">
      <span>
        This site uses cookies to ensure you get the best experience and also to analyze traffic.
        To learn more about these cookies,
        see the <nuxt-link to="/privacy">cookie policy</nuxt-link>.
      </span>
    </div>
    <div class="button-notice-close button-close" aria-label="button-close" @click="closeNotice">
      <span />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Cookies from 'js-cookie'

export default {
  computed: {
    ...mapState({
      showCookieNotice: state => state.showCookieNotice
    })
  },
  methods: {
    closeNotice () {
      Cookies.set('cookie_notice_dismiss', true, { expires: 365 })
      this.$store.commit('SET_COOKIE_NOTICE_STATUS', false)
    }
  }
}
</script>

<style lang="scss">
.cookie-notice {
  transition: opacity .3s ease;
  box-shadow: 0 5px 8px rgba(17, 43, 66, 0.1);
  border-radius: 5px;
  // background-color: map-get($colors-neutral, '800');
  background-color: #ddd;
  // color: map-get($colors, 'white');
  font-size: 1rem;
  font-family: sans-serif;
  padding: 1.5rem 4rem 1.5rem 1.6rem;
  position: fixed;
  z-index: 2;
  width: 800px;
  max-width: calc(100% - 3rem);
  left: 50%;
  transform: translateX(-50%);
  bottom: 1.2rem;
  display: flex;

  @include media_600 {
    width: calc(100% - 2.4rem);
  }

  // @include breakpoint(large) {
  //   width: 60rem;
  //   max-width: calc(100% - 3.2rem);
  //   padding-top: 1.2rem;
  //   padding-bottom: 1.2rem;
  //   bottom: 1.6rem;
  // }

  a {
    // color: map-get($colors-primary, '500');
  }

}

// .button-notice-close {
//   position: absolute;
//   top: 1.9rem;
//   right: 1.7rem;
//   width: 2rem;
//   height: 2rem;
//   // color: map-get($colors-neutral, '400');

//   &:hover {
//     background-color: transparent;
//   }
// }

.button-notice-close {
  position: absolute;
  top: 1.7rem;
  right: 1.7rem;
  // width: $mobile_menu_button_width;
  // height: $mobile_menu_button_bar_space;
  width: 20px;
  height: 11px;
  padding-top: 11px;
  box-sizing: content-box;
  z-index: 2;
  cursor: pointer;

  // @include mobile {
  //   display: block;
  // }
}

.button-notice-close span,
.button-notice-close span:before,
.button-notice-close span:after {
  // height: $mobile_menu_button_bar_thickness;
  // width: $mobile_menu_button_width;
  height: 4px;
  width: 20px;
  background: $gray3;
  position: absolute;
  display: block;
  content: "";
}

.button-notice-close span:before {
  // top: -$mobile_menu_button_bar_space;
  top: -11px;
}

.button-notice-close span:after {
  // bottom: -$mobile_menu_button_bar_space;
  bottom: -11px;
}

.button-notice-close span,
.button-notice-close span:before,
.button-notice-close span:after {
  transition: all 200ms ease-in-out;
}

.button-notice-close span {
  background-color: transparent;
}

.button-notice-close span:before,
.button-notice-close span:after {
  top: 0;
}

.button-notice-close span:before {
  transform: rotate(45deg);
}

.button-notice-close span:after {
  transform: rotate(-45deg);
}
</style>
