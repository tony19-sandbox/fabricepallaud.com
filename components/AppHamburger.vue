<template>
  <div
    class="hamburger-button"
    :class="{'active': mobileMenuOpen}"
  >
    <span />
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState({
      mobileMenuOpen: state => state.mobileMenuOpen
    })
  },
  methods: {
    toggleMobileMenu () {
      this.$store.commit('SET_MOBILE_MENU', !this.mobileMenuOpen)
    }
  }
}
</script>

<style lang="scss">
$hamburger-button_width: 22px;
$hamburger-button_bar_space: 8px;
$hamburger-button_bar_thickness: 2px;

.hamburger-button {
  position: absolute;
  top: 15px;
  right: 20px;
  width: $hamburger-button_width;
  height: $hamburger-button_bar_space;
  padding-top: 11px;
  box-sizing: content-box;
  z-index: 2;
  cursor: pointer;
}

.hamburger-button span,
.hamburger-button span:before,
.hamburger-button span:after {
  height: $hamburger-button_bar_thickness;
  width: $hamburger-button_width;
  background: $white;
  position: absolute;
  display: block;
  content: "";
}

.hamburger-button span:before {
  top: -$hamburger-button_bar_space;
}

.hamburger-button span:after {
  bottom: -$hamburger-button_bar_space;
}

.hamburger-button span,
.hamburger-button span:before,
.hamburger-button span:after {
  transition: all 200ms ease-in-out;
}

.hamburger-button.active span {
  background-color: transparent;
}

.hamburger-button.active span:before,
.hamburger-button.active span:after {
  top: 0;
}

.hamburger-button.active span:before {
  transform: rotate(45deg);
}

.hamburger-button.active span:after {
  transform: rotate(-45deg);
}
</style>
