import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: 'Condorcet Documentation',
  description: 'Condorcet documentation book',
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: '/book/' },
      { text: 'Examples', link: '/book/markdown-examples' }
    ],

    sidebar: [
      {
        text: 'Condorcet - Presentation',
        link: '/book/GithubReadme'
      },
      {
        text: 'As Command Line Application',
        items: [
          {
            text: 'Installation',
            link: '/book/2.AsCommandLineApplication/1.Installation'
          },
          {
            text: 'Quick Examples',
            link: '/book/2.AsCommandLineApplication/2.QuickExample'
          },
          {
            text: 'Import from Election files formats',
            link: '/book/2.AsCommandLineApplication/3.ImportFromElectionFormat'
          },
          {
            text: 'Man Page',
            link: '/book/2.AsCommandLineApplication/4.ManPage'
          }
        ]
      },
      {
        text: 'As Php Library',
        items: [
          {
            text: 'Installation',
            link: '/book/3.AsPhpLibrary/1.Installation'
          },
          {
            text: 'The workflow',
            link: '/book/3.AsPhpLibrary/2.WorkFlow'
          },
          {
            text: 'Create an Election',
            link: '/book/3.AsPhpLibrary/3.CreateAnElection'
          },
          {
            text: 'Candidates',
            link: '/book/3.AsPhpLibrary/4.Candidates'
          }
        ]
      },
      {
        text: 'Votes',
        items: [
          {
            text: 'Add Votes',
            link: '/book/3.AsPhpLibrary/5.Votes/1.AddVotes'
          },
          {
            text: 'Votes Tags',
            link: '/book/3.AsPhpLibrary/5.Votes/2.VotesTags'
          },
          {
            text: 'Manage Votes',
            link: '/book/3.AsPhpLibrary/5.Votes/3.ManageVotes'
          },
          {
            text: 'Vote weight',
            link: '/book/3.AsPhpLibrary/5.Votes/4.VoteWeight'
          },
          {
            text: 'Votes Constraints',
            link: '/book/3.AsPhpLibrary/5.Votes/5.VotesConstraints'
          }
        ]
      },
      {
        text: 'Results',
        items: [
          {
            text: 'Get Winner / Loser',
            link: '/book/3.AsPhpLibrary/6.Results/1.WinnerAndLoser'
          },
          {
            text: 'Full Ranking',
            link: '/book/3.AsPhpLibrary/6.Results/2.FullRanking'
          },
          {
            text: 'Advanced Results',
            link: '/book/3.AsPhpLibrary/6.Results/3.AdvancedResults'
          },
          {
            text: 'Ranking mode - Implicit versus Explicit',
            link: '/book/3.AsPhpLibrary/6.Results/4.ImplicitOrExplicitMod'
          },
          {
            text: 'Voting Methods',
            link: '/book/3.AsPhpLibrary/6.Results/5.VotingMethods'
          },
          {
            text: 'Pairwise Stats',
            link: '/book/3.AsPhpLibrary/6.Results/6.PairwiseStats'
          },
          {
            text: 'Methods Stats',
            link: '/book/3.AsPhpLibrary/6.Results/7.MethodsStats'
          },
          {
            text: 'Vote Methods Options & Warning',
            link: '/book/3.AsPhpLibrary/6.Results/8.VoteMethodsOptionsWarnings'
          },
          {
            text: 'Proportional Methods',
            link: '/book/3.AsPhpLibrary/6.Results/9.ProportionalMethods'
          }
        ]
      },
      {
        text: 'Go Further',
        items: [
          {
            text: 'Play with Election, Candidate & Vote objects',
            link: '/book/3.AsPhpLibrary/8.GoFurther/1.PlayWithObjects'
          },
          {
            text: 'Cryptographic checksum',
            link: '/book/3.AsPhpLibrary/8.GoFurther/2.CryptographicChecksum'
          },
          {
            text: 'Timer benchmarking',
            link: '/book/3.AsPhpLibrary/8.GoFurther/3.TimerBenchMarking'
          },
          {
            text: 'Election files formats',
            link: '/book/3.AsPhpLibrary/8.GoFurther/4.ElectionFilesFormats'
          },
          {
            text: 'Get started to handle millions of votes',
            link: '/book/3.AsPhpLibrary/8.GoFurther/5.GetStartedToHandleMillionsOfVotes'
          },
          {
            text: 'Objects mutability',
            link: '/book/3.AsPhpLibrary/8.GoFurther/6.Mutability'
          },
          {
            text: 'Exceptions & Errors',
            link: '/book/3.AsPhpLibrary/8.GoFurther/7.Exceptions-Errors'
          },
          {
            text: 'Generators & Iterators',
            link: '/book/3.AsPhpLibrary/8.GoFurther/8.Generator-Iterators'
          },
          {
            text: 'Vote Randomizer',
            link: '/book/3.AsPhpLibrary/8.GoFurther/9.VoteRandomizer'
          }
        ]
      },
      {
        text: 'Extending Condorcet',
        items: [
          {
            text: 'Create a new Vote Method',
            link: '/book/3.AsPhpLibrary/9.ExtendingCondorcet/1.CreateNewVoteMethod'
          },
          {
            text: 'Extending Candidate & Vote Class',
            link: '/book/3.AsPhpLibrary/9.ExtendingCondorcet/2.ExtendingCandidateAndVotes'
          },
          {
            text: 'Create a new Votes Constraints',
            link: '/book/3.AsPhpLibrary/9.ExtendingCondorcet/3.CreateNewVoteConstraints'
          },
          {
            text: 'Write New External Handler Driver',
            link: '/book/3.AsPhpLibrary/9.ExtendingCondorcet/4.WriteNewExternalHandlerDriver'
          }
        ]
      },
      {
        text: 'Voting Methods',
        link: '/book/VotingMethods'
      },
      {
        text: 'API References',
        link: '/book/ApiReferences'
      },
      {
        text: 'Changelog',
        link: '/book/Changelog'
      }
    ],

    socialLinks: [
      { icon: 'github', link: '/bookhttps://github.com/vuejs/vitepress' }
    ]
  }
})
