import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress';
import "bootstrap/dist/css/bootstrap.css";
import Layout from "./Shared/Layout"

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    page.layout ??= Layout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
});

InertiaProgress.init({
  delay: 250,
  color: 'black',
  includeCSS: true,
  showSpinner: true,
})
import "bootstrap/dist/js/bootstrap.js";
