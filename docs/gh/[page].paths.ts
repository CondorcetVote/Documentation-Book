import { CONDORCET_BASE_REPO_RAW } from '../.vitepress/globals';

export default {
  async paths() {
    return [
      // {
      //   params: { page: 'Readme' },
      //   content: await (await fetch(CONDORCET_BASE_REPO_RAW + 'README.md')).text()
      // },
      {
        params: { page: 'VotingMethods' },
        content: await (await fetch(CONDORCET_BASE_REPO_RAW + 'Docs/VotingMethods.md')).text()
      },
      {
        params: { page: 'Changelog' },
        content: await (await fetch(CONDORCET_BASE_REPO_RAW + 'CHANGELOG.md')).text()
      }
    ]
  }
}