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
          <b>•</b> <strong>JavaScript</strong>
        </span>

        <span>
          <b>•</b> <strong>PHP</strong>
        </span>

        <span>
          <b>•</b> <strong>WordPress</strong>
        </span>
      </p>

      <div class="home_intro__cta">
        <a
          @click="handleClick"
          v-ripple
          class="button button--showPortfolio"
        >
          {{ ctaCaption }}
        </a>
      </div>

      <portfolio
        v-show="isOpen"
        :projects="projects"
      />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Cookies from 'js-cookie'
import Portfolio from '@/components/Portfolio'

export default {
  components: {
    Portfolio
  },
  data () {
    return {
      projects: [],
      portfolioLocation: 0,
      isOpen: false,
      ctaCaptions: [
        'see case studies',
        'hide case studies'
      ],
      ctaCaption: ''
    }
  },
  computed: {
    ...mapState({
      baseUrl: state => state.baseUrl,
      showCaseStudies: state => state.showCaseStudies
    })
  },
  mounted () {
    this.$axios.$get(`${this.baseUrl}/wp-json/last_projects/v1/posts`)
      .then((res) => {
        this.projects = res
      })
      .catch((err) => {
        this.$toast.error(err.response)
      })

    if (this.showCaseStudies) {
      this.isOpen = true
      this.ctaCaption = this.ctaCaptions[1]
    } else {
      this.ctaCaption = this.ctaCaptions[0]
    }
  },
  methods: {
    handleClick () {
      const portfolioElement = document.querySelector('.portfolio')
      if (!this.isOpen) {
        Cookies.set('cookie_case_studies_visible', true, { expires: 365 })
        this.$store.commit('SET_CASE_STUDIES_STATUS', true)
        portfolioElement.style.display = 'block'
        this.isOpen = true
        this.ctaCaption = this.ctaCaptions[1]
      } else {
        Cookies.set('cookie_case_studies_visible', false, { expires: 365 })
        this.$store.commit('SET_CASE_STUDIES_STATUS', false)
        this.isOpen = false
        this.ctaCaption = this.ctaCaptions[0]
        portfolioElement.style.display = 'none'
        window.scrollTo(0, 0)
      }
    }
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

  .button {
    width: 210px;
  }
}
</style>
