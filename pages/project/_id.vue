<template>
  <div>
    <nuxt-child />
  </div>
</template>

<!-- <script>
export default {
  async fetch ({ store, params, redirect, error }) {
    try {
      const deal = await store.dispatch('deal/get', params.id)
      if (deal.slug !== params.slug) {
        redirect(`/project/${params.id}/${deal.slug}`)
      }
    } catch (e) {
      error({ statusCode: 404, message: 'This page could not be found' })
    }
  }
}
</script> -->
