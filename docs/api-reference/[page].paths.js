export default {
  async paths() {
    const GITHUB_BASE_URL = 'https://raw.githubusercontent.com/julien-boudry/Condorcet/refs/heads/dev-4.8/Docs/ApiReferences/'

    const response = await fetch(GITHUB_BASE_URL + 'README.md');
    const markdownContent = await response.text();

    // Extract links from the markdown content - capture just the filename without extension
    const linkRegex = /\[.*?\]\(\/Docs\/ApiReferences\/(.+?)\.md\)/g;
    const links = [];
    let match;

    while ((match = linkRegex.exec(markdownContent)) !== null) {
      links.push({
        pagePath: match[1].replaceAll('%20', ' '),
        ghPath: GITHUB_BASE_URL + match[1] + '.md'
    }); // This now captures only the filename part without extension
    }

    // console.log(links);

    // Map links to the expected format
    const dynamicPaths = await Promise.all(
      links.map(async (link) => ({
        params: { page: link.pagePath },
        content: await (await fetch(link.ghPath)).text()
      }))
    );

    // Static path
    const staticPath = {
      params: { page: 'Index' },
      content: await (await fetch(GITHUB_BASE_URL + 'README.md')).text()
    };

    const pageList = [staticPath, ...dynamicPaths].map((page) => {
      page.content = page.content.replaceAll('/Docs/ApiReferences/', '/api-reference/');

      return page;
    });

    return pageList;
  }
};