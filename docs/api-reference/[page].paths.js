export default {
  async paths() {
    return [
      {
        params: { page: 'Index' },
        content: await (await fetch('https://raw.githubusercontent.com/julien-boudry/Condorcet/refs/heads/master/Docs/ApiReferences/README.md')).text()
      },
    ]
  }
}