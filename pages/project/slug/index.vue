<template>
  <div class="wrap wrap--single">
    <div class="content container">
      <header class="header_with_subtitle">
        <a
          @click="goToPreviousView"
          class="back"
          href="#"
        >
          Go back
        </a>

        <h1 v-html="title" />
      </header>

      <div v-html="content" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  data () {
    return {
      title: '',
      content: '',
      skills: ''
    }
  },
  computed: {
    ...mapState({
      baseUrl: state => state.baseUrl
    })
  },
  mounted () {
    this.$axios.$get(`${this.baseUrl}/wp-json/project/v1/post/${this.$route.params.id}`)
      .then((res) => {
        this.title = res.post_title
        this.content = res.post_content
      })
      .catch((err) => {
        this.$toast.error(err)
      })
  },
  methods: {
    goToPreviousView () {
      this.$router.go(-1)
    }
  }
}
</script>

<style lang="scss">
.wrap--single {
  .skills--single {
    @include small_text;
  }

  li {
    img {
      margin-bottom: 1em;
    }
  }

  p, div {
    a {
      color: $red;
      border-color: $red;
    }

    img {
      max-width: 100%;
      height: auto;
    }
  }
}

.wrap--single .container {
  max-width: $content_width_small;
  @include media_600 {
    max-width: none;
  }
}

.wrap--single ul + h3,
.wrap--single p + h3 {
  margin-top: 3em;
  @include media_600 {
    margin-top: 2em;
  }
}

.picture {
  display: flex;
  justify-content: center;
  background: $gray1;
  border: 1px solid $gray5;
  border-width: 1px 0 1px 0;
  padding: 40px 0 30px;
  margin: 2em 0 4em;

  @include media_1400 {
    padding-left: $content_margin_mobile;
    padding-right: $content_margin_mobile;
    flex-wrap: wrap;
  }

  @include media_600 {
    justify-content: space-between;
    margin-bottom: 2.5em;
    padding-bottom: 0;
  }
}

.container + .picture {
  margin-top: -0.25em;
}

.picture li {
  padding: 0 25px;

  @include legend;

  @include media_1300 {
    margin-bottom: 30px;
  }

  @include media_768 {
    max-width: 161px;
  }

  @include media_600 {
    padding: 0;
    width: 50%;
  }
}

.picture li:before {
  display: none;
}

.wrap--single img {
  display: block;
  height: auto;
  margin: 0 auto 3em;

  @include media_600 {
    margin-bottom: 1.5em;
  }
}

pre {
  border-radius: 0;
  max-width: $content_width_small;
  margin: 2em auto 4em !important;

  @include media_1200 {
    padding-left: $content_margin_mobile;
    padding-right: $content_margin_mobile;
  }

  @include media_600 {
    margin: 2em auto 2em !important;
  }
}

code[class*="language-"] span,
pre[class*="language-"] span {
  @include code;
}

code[class*="language-"],
pre[class*="language-"] {
  @include media_600 {
    line-height: 1.2 !important;
  }
}

pre[class*="language-"] {
  @include media_600 {
    padding-top: 0 !important;
  }
}

.overflow {
  overflow: hidden;
  margin-top: 1.5em;
}

.jseditor {
  width: 150px;
  float: left;

  @include media_960 {
    width: auto;
    float: none;
  }
}

.jseditor_text {
  width: 710px;
  float: right;

  @include media_960 {
    width: auto;
    float: none;
  }
}

.jseditor img {
  @include media_960 {
    margin-left: 0;
    margin-right: 0;
  }
}

.jseditor_text p {
  @include media_960 {
    padding-left: 0;
    padding-right: 0;
  }
}

.no_scrollbar {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
</style>
