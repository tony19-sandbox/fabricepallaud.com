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
          @click="handleClick"
        >
          {{ ctaCaption }}
        </a>
      </div>

      <portfolio
        :projects="projects"
        :class="{ open : isOpen }"
      />
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
  data () {
    return {
      projects: [],
      portfolioLocation: 0,
      isOpen: true,
      ctaCaptions: [
        'see case studies',
        'hide case studies'
      ],
      ctaCaption: ''
    }
  },
  computed: {
    ...mapState({
      baseUrl: state => state.baseUrl
    })
  },
  mounted () {
    this.portfolioLocation = window.scrollY + document.querySelector('.portfolio').getBoundingClientRect().top - 30
    this.isOpen = false
    this.ctaCaption = this.ctaCaptions[0]

    this.$axios.$get(`${this.baseUrl}/wp-json/last_projects/v1/posts`)
      .then((res) => {
        this.projects = res
      })
      .catch((err) => {
        this.$toast.error(err.response)
      })
  },
  methods: {
    handleClick () {
      const portfolioElement = document.querySelector('.portfolio')
      if (!this.isOpen) {
        portfolioElement.style.display = 'block'
        this.isOpen = true
        this.ctaCaption = this.ctaCaptions[1]
        window.scrollTo({
          top: this.portfolioLocation,
          left: 0,
          behavior: 'smooth'
        })
      } else {
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
  h2 {
    margin: 0 15px 0 0;
  }
}
</style>
