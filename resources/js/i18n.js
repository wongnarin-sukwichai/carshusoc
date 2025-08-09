// resources/js/i18n.js
import { createI18n } from "vue-i18n";
import en from "./locales/en.json";
import th from "./locales/th.json";

const saved = localStorage.getItem("locale");
const locale = saved || window.Laravel?.locale || "en";

export const i18n = createI18n({
    legacy: false,
    locale,
    fallbackLocale: "en",
    messages: { en, th }
});