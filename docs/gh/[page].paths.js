export default {
  async paths() {
    const GITHUB_BASE_URL = 'https://raw.githubusercontent.com/julien-boudry/Condorcet/refs/heads/dev-4.8/'

    return [
      // {
      //   params: { page: 'Readme' },
      //   content: await (await fetch(GITHUB_BASE_URL + '/README.md')).text()
      // },
      {
        params: { page: 'VotingMethods' },
        content: await (await fetch(GITHUB_BASE_URL + 'Docs/VotingMethods.md')).text()
      },
      {
        params: { page: 'Changelog' },
        content: await (await fetch(GITHUB_BASE_URL + 'CHANGELOG.md')).text()
      }
    ]
  }
}