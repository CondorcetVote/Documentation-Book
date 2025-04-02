import { defineConfig } from 'vitepress'
import sidebar from './sidebar.json'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: 'Condorcet Documentation',
  description: 'Condorcet documentation book',
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: '/book/' },
      { text: 'Examples', link: '/book/markdown-examples' }
    ],

    sidebar: sidebar,

    socialLinks: [
      { icon: 'github', link: 'https://github.com/vuejs/vitepress' }
    ]
  }
})
