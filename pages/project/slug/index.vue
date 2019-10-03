<template>
  <div class="wrap wrap--single">
    <div class="content">
      <header class="header_with_subtitle">
        <h1 v-html="title" />
        <div class="skills skills--single" v-html="skills" />
      </header>
      <div v-html="content" />
    </div>
  </div>
</template>

<script>

export default {
  data () {
    return {
      title: '',
      content: '',
      skills: ''
    }
  },
  mounted () {
    this.$axios.$get(`http://fabricepallaud.com/wp-json/projects/v1/post/${this.$route.params.id}`)
      .then((res) => {
        this.title = res.post_title
        this.content = res.post_content
        this.skills = res.acf.skills
      })
      .catch((err) => {
        this.$toast.error(err.response.data.message)
      })
  }
}
</script>

<style lang="scss" scoped>
</style>
