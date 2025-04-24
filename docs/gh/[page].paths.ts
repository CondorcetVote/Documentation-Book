import { CONDORCET_BASE_REPO_RAW, CONDORCET_BASE_REPO_TREE } from '../.vitepress/globals';

export default {
  async paths() {
    return [
      // {
      //   params: { page: 'Readme' },
      //   content: await (await fetch(CONDORCET_BASE_REPO_RAW + 'README.md')).text()
      // },
      {
        params: { page: 'VotingMethods' },
        content: (await (await fetch(CONDORCET_BASE_REPO_RAW + 'Docs/VotingMethods.md')).text())
                                    .replaceAll('Docs/api-reference/README.md', '../api-reference/Index')
                                    .replaceAll('[Presentation](README.md)', '[Presentation](' + CONDORCET_BASE_REPO_TREE + 'README.md)')
      },
      {
        params: { page: 'Changelog' },
        content: await (await fetch(CONDORCET_BASE_REPO_RAW + 'CHANGELOG.md')).text()
      }
    ]
  }
}