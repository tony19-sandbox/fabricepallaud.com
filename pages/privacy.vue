<template>
  <div class="wrap wrap--front">
    <div class="container container--home">
      <h1 class="home_intro__title">
        <!-- Hi I'm <span>Fabrice</span>, Front-end Developer. -->
        Cookie policy
      </h1>

      <!-- <p class="home_intro__summary">
        <span>
          Experienced in <strong>Vue.js</strong>
        </span>
        <span>
          <b>•</b> <strong>JavaScript/ES6</strong>
        </span>
        <span>
          <b>•</b> <strong>PHP</strong>, <strong>WordPress</strong>
        </span>
      </p> -->

      <p>
        Tutu.
      </p>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  data () {
    return {
      projects: []
    }
  },
  computed: {
    ...mapState({
      baseUrl: state => state.baseUrl
    })
  },
  mounted () {
    this.$axios.$get(`${this.baseUrl}/wp-json/projects/v1/posts`)
      .then((res) => {
        this.projects = res
      })
      .catch((err) => {
        this.$toast.error(err.response)
      })
  }
}
</script>
