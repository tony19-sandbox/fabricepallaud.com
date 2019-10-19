<template>
  <div class="wrap wrap--front">
    <div class="container container--home">
      <h1 class="home_intro__title">
        Hi I'm <span>Fabrice</span>, Front-end Developer.
      </h1>

      <p class="home_intro__summary">
        <span>
          Experienced in <strong>Vue.js</strong>
        </span>
        <span>
          <b>•</b> <strong>JavaScript/ES6</strong>
        </span>
        <span>
          <b>•</b> <strong>PHP</strong>, <strong>WordPress</strong>
        </span>
      </p>

      <div class="home_intro__cta">
        <a
          v-ripple
          class="button button--showPortfolio"
          @click="$store.commit('SET_PORTFOLIO', !portfolioOpen)"
        >
          see case studies
        </a>
      </div>

      <portfolio v-show="portfolioOpen" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Portfolio from '@/components/Portfolio'

export default {
  components: {
    Portfolio
  },
  computed: {
    ...mapState({
      portfolioOpen: state => state.portfolioOpen
    })
  }
}
</script>

<style lang="scss">
.wrap.wrap--front {
  padding: 120px 0;
  @include media_600 {
    padding: 60px 0;
  }
}

.container.container--home {
  margin-top: 0;
  margin-bottom: 0;
  overflow: visible;
  padding-top: 5px;
  padding-bottom: 5px;
}

.home_intro__title {
  margin: 0;
  text-align: center;
  margin-bottom: 30px;
  @include media_600 {
    margin-bottom: 50px;
  }
}

.home_intro__title,
.home_intro__title span {
  @include home_heading;
}

.home_intro__summary {
  margin-bottom: 40px;
  text-align: center;
  @include media_600 {
    margin-bottom: 60px;
  }
}

.home_intro__summary,
.home_intro__summary b {
  font-weight: normal;
}

.home_intro__summary b {
  margin: 0 0.15em 0 0.15em;
  color: $gray2;
  @include media_600 {
    display: none;
  }
}

.home_intro__summary strong {
  color: $gray2;
  @include media_600 {
    color: $black4;
  }
}

.home_intro__summary span {
  @include home_summary;
  color: $gray4;
  @include media_600 {
    display: block;
    margin-bottom: 0.5em;
  }
}

.home_intro__title span {
  color: $red;
}

.home_intro__cta {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 60px 0 75px;
  h2 {
    margin: 0 15px 0 0;
  }
}
</style>
