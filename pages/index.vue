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
        <a class="button button--showPortfolio">
          see case studies
        </a>
      </div>

      <div class="portfolio">
        <!-- <?php
        $args = array(
          'post_type' => 'project',
          'posts_per_page' => -1
        );
        $projects = new WP_Query($args);
        while ($projects->have_posts()) : $projects->the_post();
        ?> -->
        <section
          v-for="project in projects"
          :key="project.ID"
          class="portfolio_entry square_border"
        >
          <header class="portfolio_entry__header">
            <!-- <nuxt-link :to="`/project/${project.ID}/${project.slug}`" :title="deal.title"> -->
            <nuxt-link :to="`/project/${project.ID}`">
              <h2 class="portfolio_entry_title">
                {{ project.acf.front_page_title }}
              </h2>
            </nuxt-link>
            <a class="portfolio_entry_link" href="<?php the_permalink(); ?>">
              see case study
            </a>
          </header>

          <a href="<?php the_permalink(); ?>">
            <p class="portfolio_entry__maincontent" v-html="project.acf.summary" />
          </a>

          <a href="<?php the_permalink(); ?>">
            <footer class="portfolio_entry__footer">
              <div class="skills">
                {{ project.acf.skills }}
              </div>
              <div class="time_to_read">
                {{ project.acf.reading_time }}
              </div>
            </footer>
          </a>
        </section>
        <!-- <?php
        endwhile;
        ?> -->
      </div>
    </div>
  </div>
</template>

<script>
// import Logo from '~/components/Logo.vue'

export default {
  /* eslint-disable */
  data () {
    return {
      projects: []
    }
  },
  mounted () {
    // this.tutu = this.$axios.$get('http://fabricepallaud.com/wp-json/projects/v1/post')
    // console.log(this.tutu)

    this.$axios.$get('http://fabricepallaud.com/wp-json/projects/v1/post')
      .then((res) => {
        // this.projects.push(res.data)
        // console.log(res)
        this.projects = res
        // console.log(this.projects)
      })
      .catch((err) => {
        this.$toast.error(err.response)
        // console.log(err.response)
      })
  }
}
</script>
