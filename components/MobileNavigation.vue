<template>
  <transition name="mobile-menu">
    <nav v-if="mobileMenuOpen" class="mobile-navigation">
      <ul>
        <li
          v-for="(item, i) in menu"
          :key="i"
          :class="item.icon"
        >
          <nuxt-link :to="item.url.replace(baseUrl, '')">
            {{ item.name }}
          </nuxt-link>
        </li>
      </ul>

      <social-links
        v-if="!mobileMenuOpen"
        :menu-bar="true"
      />
    </nav>
  </transition>
</template>

<script>
import { mapState } from 'vuex'
import { MainMenu } from '@/utils/structures'
import SocialLinks from '@/components/SocialLinks'

export default {
  components: {
    SocialLinks
  },
  data () {
    return {
      items: [],
      menu: MainMenu
    }
  },
  computed: {
    ...mapState({
      mobileMenuOpen: state => state.mobileMenuOpen,
      baseUrl: state => state.baseUrl
    })
  }
}
</script>

<style lang="scss" scoped>
.nav_primary_wrap,
.nav_primary {
  height: 54px;
}

.mobile-navigation {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  background-color: $brown;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  ul {
    text-align: center;

    a {
      @include mobile_menu;
    }
  }
}

.menu_portfolio {
  display: none;
}

.mobile-menu-enter-active,
.mobile-menu-active {
  transition: all 100ms ease-in 0s
}
.mobile-menu-enter,
.mobile-menu-leave-to {
  opacity: 0;
  transition: all 100ms ease-in 0s
}
</style>
