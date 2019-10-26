export default ({ app }) => {
  app.router.afterEach((to, from) => {
    app.store.commit('SET_MOBILE_MENU', false)
  })
}
