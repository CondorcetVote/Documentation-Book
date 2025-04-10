import { defineConfig } from 'vitepress'
import sidebar from './sidebar.json'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: 'Condorcet Documentation',
  description: 'Condorcet documentation book',
  themeConfig: {
    nav: [
      { text: 'Presentation', link: '/gh/Readme' },
      { text: 'Documentation Book', link: '/gh/Readme' },
      { text: 'API References', link: '/api-reference/Index' },
      { text: 'Voting Methods', link: '/gh/VotingMethods' },
      { text: 'Tests', link: 'https://github.com/julien-boudry/Condorcet/tree/master/tests' },
    ],

    sidebar: sidebar,

    socialLinks: [
      { icon: 'github', link: 'https://github.com/julien-boudry/Condorcet' }
    ]
  }
})
