export default {
  async paths() {
    return [
      // {
      //   params: { page: 'Readme' },
      //   content: await (await fetch('https://raw.githubusercontent.com/julien-boudry/Condorcet/refs/heads/master/README.md')).text()
      // },
      {
        params: { page: 'VotingMethods' },
        content: await (await fetch('https://raw.githubusercontent.com/julien-boudry/Condorcet/refs/heads/master/Docs/VotingMethods.md')).text()
      },
      {
        params: { page: 'Changelog' },
        content: await (await fetch('https://raw.githubusercontent.com/julien-boudry/Condorcet/refs/heads/master/CHANGELOG.md')).text()
      }
    ]
  }
}