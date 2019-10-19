export default async ({ app }) => {
  app.router.afterEach((to, from) => {
    store.commit('SET_MOBILE_MENU', false)
    store.commit('SET_PORTFOLIO', false)
  })
}
