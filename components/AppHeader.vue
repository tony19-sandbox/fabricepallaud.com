<template>
  <div>
    <header class="banner">
      <div class="container container--header">
        <a class="header__branding" href="/">
          <img
            class="header__branding__logo"
            src="@/assets/img/logo_desktop.svg"
          >
          <div class="logo_square" />
        </a>

        <social-links />
      </div>
    </header>

    <main-menu />
  </div>
</template>

<script>
import SocialLinks from '@/components/SocialLinks'
import MainMenu from '@/components/MainMenu'

export default {
  components: {
    SocialLinks,
    MainMenu
  }
}
</script>

<style lang="scss">
.banner {
  width: 100%;
  background: url(~assets/img/header.jpg) 50% 0 repeat-x;
  @include media_600 {
    display: none;
  }
}

.container.container--nav_primary {
  overflow: visible;
}

.container.container--header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  @include media_1225 {
    box-sizing: border-box;
  }
}

.banner,
.container.container--header {
  height: 152px;
  @include media_800 {
    height: 120px;
  }
}

.header__branding {
  width: 215px;
  height: 100%;
  display: block;
  position: relative;
}

.header__branding:active {
  top: 0;
}

.header__branding:active .header__branding__logo {
  transform: translateY(calc(-50% + 1px));
}

.header__branding__logo {
  width: 100%;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  z-index: 2;
}

.logo_square {
  position: absolute;
  width: 145px;
  height: 100%;
  background: $red;
  left: 121px;
  top: 0;
}

.header_hidden {
  transform: translateY(-100%);
  -webkit-transform: translateY(-100%);
}
</style>
