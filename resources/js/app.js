import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress';
import { MotionPlugin } from '@vueuse/motion';
import NProgress from 'nprogress'
import "bootstrap/dist/css/bootstrap.css";
import Layout from "./Shared/Layout";
import createStore from "../js/store/index";

createInertiaApp({
  resolve: name => {
    let page = require(`./Pages/${name}`).default;
    if (page.layout === undefined){
      page.layout = Layout
    }
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(MotionPlugin)
      .use(createStore)
      .mount(el)
  },
});

InertiaProgress.init({
  delay: 130,
  color: 'black',
  includeCSS: true,
  showSpinner: true,
})
import "bootstrap/dist/js/bootstrap.js";
