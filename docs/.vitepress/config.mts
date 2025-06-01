import { defineConfig } from 'vitepress'
import sidebar from './sidebar.json'
import { CONDORCET_BASE_REPO_WEB, CONDORCET_TARGET_VERSION, CONDORCET_BASE_REPO_TREE } from './globals.ts'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  lang: 'en-CA',
  title: 'Condorcet',
  description: 'Condorcet PHP documentation book',

  cleanUrls: true,

  sitemap: {
    hostname: 'https://docs.condorcet.io'
  },

  lastUpdated: true,

  head: [
    ['link', { rel: 'icon', type: 'image/png', href: '/favicon.png' }],
    ['meta', { name: 'og:type', content: 'website' }],
    ['meta', { name: 'og:locale', content: 'en_CA' }],
    ['meta', { name: 'og:site_name', content: 'Condorcet PHP Documentation' }],
    ['meta', { name: 'og:image', content: '/condorcet-logo-without-text.avif' }],

    ['script', {  src: 'https://app.rybbit.io/api/script.js', 'data-site-id': '859', defer: ''}]
  ],

  ignoreDeadLinks: [
    /\/Docs\//,
    /\/README/,
    /\.\/Tests/,
  ],

  themeConfig: {
    search: {provider: 'local'},

    logo: '/condorcet-logo-without-text.avif',

    nav: [
      { text: 'Presentation', link: CONDORCET_BASE_REPO_WEB + '/blob/master/README.md' },
      { text: 'Get Started', link: '/book/1.Start.md' },
      { text: 'API References', link: '/api-reference/Index' },
      { text: 'Voting Methods', link: '/gh/VotingMethods' },
      { text: 'Tests', link: CONDORCET_BASE_REPO_TREE + 'tests' },
      {
        text: CONDORCET_TARGET_VERSION,
        items: [
          { text: 'Changelog', link: '/gh/Changelog' },
          { text: 'Donations', link: 'https://github.com/sponsors/julien-boudry' },
        ]
      },
    ],

    sidebar: sidebar,
    outline: [2,4],

    footer: {
      message: 'Released under the MIT License.',
      copyright: 'Copyright © 2014-present Julien Boudry'
    },

    lastUpdated: {
      text: 'Last updated (UTC)',
      formatOptions: {
        forceLocale: true,
        dateStyle: 'long',
        timeStyle: 'medium',
        timeZone: 'UTC',
        hour12: false,
      }
    },

    socialLinks: [
      { icon: 'github', link: CONDORCET_BASE_REPO_WEB }
    ],

    editLink: {
      pattern: ({ filePath }) => {
        if (filePath.startsWith('book/')) {
          return `https://github.com/CondorcetVote/Documentation-Book/edit/master/docs/${filePath}`
        } else {
          return globalThis.CONDORCET_BASE_REPO_WEB;
        }
      }
    }
  }
})
