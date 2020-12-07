<template>
  <div class="wrap">
    <div class="container">
      <h1 class="page_title">
        Case studies
      </h1>

      <p class="page_summary page_summary--about">
        All portfolio entries are listed here
      </p>

      <portfolio
        :projects="projects"
        class="open"
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

<style lang="scss">
.content.content--about {
  overflow: visible;
}

.page_header--about {
  @include media_600 {
    margin-bottom: 40px;
  }
}

.content--about {
  display: flex;
  justify-content: space-between;
  @include media_768 {
    flex-direction: column-reverse;
  }
}

.page_summary--about {
  width: 50%;
}

.about_info {
  width: 55%;
  @include media_768 {
    width: auto;
  }
}

.about_illustration {
  text-align: right;
  width: 40%;
  @include media_768 {
    width: auto;
  }
}

.about_illustration__img {
  max-width: 100%;
  height: auto;
  margin-top: -185px;
  @include media_768 {
    margin: 0 0 30px;
  }
}

.about_skills {
  margin-top: 1em;
  margin-top: 0;
}

.about_skills strong {
  background: $yellow;
  padding: 0 5px;
  margin: 0 3px;
}

.about_skills li {
  margin-bottom: 1em;
}

.oatmeal {
  position: relative;
  top: 2px;
  display: none;
}
</style>
