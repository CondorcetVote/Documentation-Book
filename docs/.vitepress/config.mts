import { defineConfig } from 'vitepress'
import sidebar from './sidebar.json'
import { CONDORCET_BASE_REPO_WEB, CONDORCET_TARGET_VERSION, CONDORCET_BASE_REPO_TREE, CONDORCET_BASE_REPO_API_DOCS_RAW, CONDORCET_DOC_PROD_HOSTNAME } from './globals.ts'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  lang: 'en-CA',
  title: 'Condorcet',
  description: 'Condorcet PHP documentation book',

  cleanUrls: true,

  vite: {
    define: {
      CONDORCET_BASE_REPO_API_DOCS_RAW: JSON.stringify(CONDORCET_BASE_REPO_API_DOCS_RAW)
    }
  },

  sitemap: {
    hostname: CONDORCET_DOC_PROD_HOSTNAME
  },

  lastUpdated: true,

  head: [
    ['link', { rel: 'icon', type: 'image/png', href: '/favicon.png' }],
    ['meta', { name: 'og:type', content: 'website' }],
    ['meta', { name: 'og:locale', content: 'en_CA' }],
    ['meta', { name: 'og:site_name', content: 'Condorcet PHP Documentation' }],
    ['meta', { name: 'og:image', content: '/condorcet-logo-without-text.avif' }],

    ['script', { src: 'https://app.rybbit.io/api/script.js', 'data-site-id': '859', defer: '' }]
  ],

  ignoreDeadLinks: [
    /\/Docs\//,
    /\/README/,
    /\.\/Tests/,
  ],

  transformPageData(pageData) {
    const url = `${CONDORCET_DOC_PROD_HOSTNAME}/${pageData.relativePath}`
      .replace('.md', '')
      .replace(/index$/, '')
      ;

    pageData.frontmatter.head ??= [];
    pageData.frontmatter.head.push([
      'link',
      { rel: 'canonical', href: url }
    ]);
  },

  themeConfig: {
    search: { provider: 'local' },

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
    outline: [2, 4],

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
        const baseUrl = 'https://github.com/CondorcetVote/Documentation-Book/edit/master/docs/';
        if (filePath.startsWith('book/')) {
          return `${baseUrl}${filePath}`
        } else {
          return baseUrl;
        }
      }
    },

  }
})
