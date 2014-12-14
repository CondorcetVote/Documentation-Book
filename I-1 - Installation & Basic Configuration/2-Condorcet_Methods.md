# Native Supported Condorcet Method

## Supported Condorcet Methods

* **Condorcet Basic** Give you the natural winner or looser of Condorcet, if there is one.  
*(This method is the only core method, you cannot remove it)*

* **Copeland** http://en.wikipedia.org/wiki/Copeland%27s_method

* **Kemeny-Young** http://en.wikipedia.org/wiki/Kemeny-Young_method   
*Kemeny-Young is currently limited to elections not exédant 6 candidates. For reasons of performance almost insuperable. Solutions for a populated cache precalculated data are under review to reach 7 or 8 candidates, and maybe even 9.*

* **Minimax Family** http://en.wikipedia.org/wiki/Minimax_Condorcet
    * **Minimax Winning** *(Does not satisfy the Condorcet loser criterion)*  
    * **Minimax Margin** *(Does not satisfy the Condorcet loser criterion)*
    * **Minimax Opposition**:warning: *By nature, this alternative does not meet any criterion of Condorcet.*

* **RankedPairs *(Since v0.10, EXPERIMENTAL)*** https://en.wikipedia.org/wiki/Ranked_pairs  

* **Schulze Family** http://en.wikipedia.org/wiki/Schulze_method
    * **Schulze** Schulze Winning is recommended by Markus Schulze himself. ***This is the default choice.***
    * **Schulze Margin**
    * **Schulze Ratio**


## Use a method

| Family  | Name  | String Class | Constant
| :------------: |:---------------:| :-----:|:-------:|
| natural Condorcet | Condorcet Basic | 'Condorcet_Basic' | _Condorcet\Condorcet::METHOD_BASIC_
| Copeland      | Coepland | 'Copeland' | _Condorcet\Copeland::COPELAND_
| Minimax | Minimax Winning | 'Minimax_Winning' | _Condorcet\Copeland::COPELAND_
| Minimax | Minimax Margin | 'Minimax_Margin' | _Condorcet\Copeland::COPELAND_
| Minimax | Minimax Opposition | 'Minimax_Opposition' | _Condorcet\Copeland::COPELAND_
| Ranked Pairs | Ranked Pairs | 'RankedPairs' | _Condorcet\RankedPairs::RankedPairs_
| Schulze | Schulze Winning | 'Schulze' | _Condorcet\Schulze::Schulze_
| Schulze | Schulze Margin | 'Schulze_Margin' | _Condorcet\Schulze::Schulze_
| Schulze | Schulze Ratio | 'Schulze Ratio' | _Condorcet\Schulze::Schulze_




