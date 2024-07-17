import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
  resolve: async name => {
    const pages = await import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`].default

    if (page.layout === undefined) {
      // Set the default layout if it's not already set
      // if (!page.default.layout) {
      page.layout = Layout
      // }
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },
  title: title => {
    // console.log(title);
    const pageTitle = title || 'Default Title';
    return `My App : ${pageTitle}`;
  },
  progress: {
    // The delay after which the progress bar will appear, in milliseconds...
    delay: 1250,

    // The color of the progress bar...
    color: 'red',

    // Whether to include the default NProgress styles...
    includeCSS: true,

    // Whether the NProgress spinner will be shown...
    showSpinner: true,
  }
})
