import { createI18n } from "vue-i18n/dist/vue-i18n.cjs";

import en from "./locales/en.json"
import jp from "./locales/jp.json"

const i18n = createI18n({
    locale: import.meta.env.VITE_DEFAULT_LOCALE,
    fallbackLocale: import.meta.env.VITE_FALLBACK_LOCALE,
    legacy: false,
    globalInjection: true,
    messages: {
        en,
        jp
    }
})

export default i18n