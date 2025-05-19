import './bootstrap';

import { createApp } from 'vue';
import { createI18n } from 'vue-i18n'

import App from './components/App.vue';
import store from './store/index';
import router from './router/index';

import en from './locales/en.json'
import th from './locales/th.json'

// ดึง locale จาก Laravel ที่ส่งมาผ่าน window
const locale = window.Laravel?.locale || 'en'

const i18n = createI18n({
  legacy: false,
  locale: locale,
  fallbackLocale: 'en',
  messages: {
    en,
    th
  }
})

const app = createApp(App)

app.use(store)
app.use(router)
app.use(i18n)
app.mount('#app')


