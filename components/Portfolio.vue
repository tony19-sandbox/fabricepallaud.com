<template>
  <transition name="portfolio">
    <div class="portfolio">
      <section
        v-for="project in projects"
        :key="project.ID"
        class="portfolio_entry square_border"
      >
        <header class="portfolio_entry__header">
          <nuxt-link :to="`/project/${project.ID}/${project.post_name}`">
            <h2 class="portfolio_entry_title" v-html="project.acf.front_page_title" />
          </nuxt-link>
          <nuxt-link :to="`/project/${project.ID}/${project.post_name}`" class="portfolio_entry_link">
            see case study
          </nuxt-link>
        </header>

        <nuxt-link :to="`/project/${project.ID}/${project.post_name}`">
          <p class="portfolio_entry__maincontent" v-html="project.acf.summary" />
        </nuxt-link>

        <nuxt-link :to="`/project/${project.ID}/${project.post_name}`">
          <footer class="portfolio_entry__footer">
            <div class="skills">
              {{ project.acf.skills }}
            </div>
            <div class="time_to_read" v-html="project.acf.reading_time" />
          </footer>
        </nuxt-link>
      </section>
    </div>
  </transition>
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

<style lang="scss">
.button--showPortfolio {
  max-width: none;
  padding-left: 25px;
  padding-right: 25px;
}

.portfolio_entry {
  border: 1px solid $gray6;
  padding: 25px;
  position: relative;
  margin-bottom: 80px;
  background-color: $gray7;
  @include media_600 {
    padding: 12px;
    margin-bottom: 80px;
  }
}

.portfolio_entry:last-child {
  margin-bottom: 0;
}

.portfolio_entry__header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}

.portfolio_entry__maincontent {
  margin: 1em 0 1.5em;
  max-width: 900px;
}

.portfolio_entry__footer {
  display: flex;
  justify-content: space-between;
  @include media_768 {
    display: block;
  }
}

.portfolio_entry_title {
  margin: 0;
  @include media_768 {
    color: $red;
  }
}

.portfolio_entry_link {
  @include big_link;
  @include media_768 {
    display: none;
  }
}

.skills {
  color: $red;
  @include media_600 {
    color: $gray9;
  }
}

.time_to_read {
  font-weight: bold;
  @include media_768 {
    display: none;
  }
}

.skills,
.time_to_read {
  font-size: 0.8em;
  font-family: $lato;
}

.portfolio-enter-active,
.portfolio-leave-active {
   transition: all 200ms ease-in 0s
}

.portfolio-enter-to,
.portfolio-leave {
   max-height: 1500px;
}

.portfolio-enter,
.portfolio-leave-to {
   max-height: 0;
}
</style>
