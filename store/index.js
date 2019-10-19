export const state = () => ({
  baseUrl: 'http://fabricepallaud.com/wp',
  showCookieNotice: false,
  mobileMenuOpen: false,
  portfolioOpen: false
})

export const mutations = {
  SET_COOKIE_NOTICE_STATUS (state, value) {
    state.showCookieNotice = value
  },
  SET_MOBILE_MENU (state, data) {
    state.mobileMenuOpen = data
  },
  SET_PORTFOLIO (state, data) {
    state.portfolioOpen = data
  }
}
