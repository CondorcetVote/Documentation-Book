import { CONDORCET_BASE_REPO_RAW } from '../.vitepress/globals';

export default {
  async paths() {
    const API_REFERENCE_BASE_URL = CONDORCET_BASE_REPO_RAW + 'Docs/api-reference/'

    const response = await fetch(API_REFERENCE_BASE_URL + 'README.md');
    const markdownContent = await response.text();

    // Extract links from the markdown content - capture just the filename without extension
    const linkRegex = /\[.*?\]\(\/Docs\/api-reference\/(.+?)\.md\)/g;
    const apiReferenceLinks: { pagePath: string; ghPath: string }[] = [];
    let match;

    while ((match = linkRegex.exec(markdownContent)) !== null) {
      apiReferenceLinks.push({
        pagePath: match[1].replaceAll('%20', ' '),
        ghPath: API_REFERENCE_BASE_URL + match[1] + '.md'
    }); // This now captures only the filename part without extension
    }

    // console.log(links);

    // Map links to the expected format
    const dynamicPaths = await Promise.all(
      apiReferenceLinks.map(async (link) => ({
        params: { page: link.pagePath },
        content: await (await fetch(link.ghPath)).text()
      }))
    );

    // Static path
    const staticPath = {
      params: { page: 'Index' },
      content: await (await fetch(API_REFERENCE_BASE_URL + 'README.md')).text()
    };

    const pageList = [staticPath, ...dynamicPaths].map((page) => {
      page.content = page.content.replaceAll('/Docs/api-reference/', '/api-reference/');

      return page;
    });

    return pageList;
  }
};