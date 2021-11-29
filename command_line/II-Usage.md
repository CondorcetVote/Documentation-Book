### Command Line - Some Quick Examples

_See your installation method upside for main call. Below from the official docker image with command condorcet._

#### A simple and short election
```shell
condorcet election --candidates="A;B;C" --votes="A>B ; myTag1||C=B>A ; A>C ; B>C;A" -lr Schulze Borda Minimax
+-----------+- Registered Vote List --+-----------+
| Vote Num. | Vote      | Vote Weight | Vote Tags |
+-----------+-----------+-------------+-----------+
| 1         | A > B > C | 1           |           |
| 2         | B = C > A | 1           | myTag1    |
| 3         | A > C > B | 1           |           |
| 4         | B > C > A | 1           |           |
| 5         | A > B = C | 1           |           |
+-----------+-----------+-------------+-----------+

Condorcet Natural Winner & Loser
--------------------------------
+------ Natural Condorcet -------+
| Type               | Candidate |
+--------------------+-----------+
| * Condorcet Winner | A         |
| # Condorcet Loser  | C         |
+--------------------+-----------+

Results per Methods
-------------------
+-- Results: Schulze Winning ---+
|       Rank       | Candidates |
+------------------+------------+
|        1         | A*         |
|        2         | B          |
|        3         | C#         |
+------------------+------------+
+----- Results: BordaCount -----+
|       Rank       | Candidates |
+------------------+------------+
|        1         | A*         |
|        2         | B          |
|        3         | C#         |
+------------------+------------+
+-- Results: Minimax Winning ---+
|       Rank       | Candidates |
+------------------+------------+
|        1         | A*         |
|        2         | B,C        |
+------------------+------------+

 [OK] Success
```

#### From Files / With Stats
You can print stats. And load candidates or votes from file. See [Condorcet Manual](https://github.com/julien-boudry/Condorcet/wiki) for more  details.

```shell
condorcet election --stats --candidates /path/to/myCandidates.text --votes /path/to/myVotes.txt 

Results per Methods
-------------------
+---- Results: Kemeny–Young ----+
|       Rank       | Candidates |
+------------------+------------+
|        1         | A*         |
|        2         | B          |
|        3         | C#         |
+------------------+------------+
+---------- Stats: Kemeny–Young -----------+
| Stats                                    |
+------------------------------------------+
| bestScore: 11                            |
| rankingScore:                            |
|     -                                    |
|         1: A                             |
|         2: B                             |
|         3: C                             |
|         score: 11                        |
|     -                                    |
|         1: A                             |
|         2: C                             |
|         3: B                             |
|         score: 9                         |
|     -                                    |
|         1: B                             |
|         2: A                             |
|         3: C                             |
|         score: 9                         |
|     -                                    |
|         1: B                             |
|         2: C                             |
|         3: A                             |
|         score: 7                         |
|     -                                    |
|         1: C                             |
|         2: A                             |
|         3: B                             |
|         score: 7                         |
|     -                                    |
|         1: C                             |
|         2: B                             |
|         3: A                             |
|         score: 5                         |
|                                          |
+------------------------------------------+

 [OK] Success
```

#### Votes Weight / Implicit Ranking Mode / No-Tie constraint
```shell
condorcet election --candidates="A;B;C" --votes="A>B ^10 ; B>A ; B>A" -lr --allows-votes-weight
+-----------+- Registered Vote List --+-----------+
| Vote Num. | Vote      | Vote Weight | Vote Tags |
+-----------+-----------+-------------+-----------+
| 1         | A > B > C | 10          |           |
| 2         | B > A > C | 1           |           |
| 3         | B > A > C | 1           |           |
+-----------+-----------+-------------+-----------+

Condorcet Natural Winner & Loser
--------------------------------
+------ Natural Condorcet -------+
| Type               | Candidate |
+--------------------+-----------+
| * Condorcet Winner | A         |
| # Condorcet Loser  | C         |
+--------------------+-----------+
```

```shell
condorcet election --candidates="A;B;C" --votes="A>B>C ; B>A ; A" -lr -i --deactivate-implicit-ranking
+-----------+- Registered Vote List --+-----------+
| Vote Num. | Vote      | Vote Weight | Vote Tags |
+-----------+-----------+-------------+-----------+
| 1         | A > B > C | 1           |           |
| 2         | B > A     | 1           |           |
| 3         | A         | 1           |           |
+-----------+-----------+-------------+-----------+

Condorcet Natural Winner & Loser
--------------------------------
+------ Natural Condorcet -------+
| Type               | Candidate |
+--------------------+-----------+
| * Condorcet Winner | NULL      |
| # Condorcet Loser  | C         |
+--------------------+-----------+
```

```shell
condorcet election --candidates="A;B;C" --votes="A>B ; B>C=A ; C=B>A ; B" -lr --no-tie
+-----------+- Registered Vote List --+-----------+
| Vote Num. | Vote      | Vote Weight | Vote Tags |
+-----------+-----------+-------------+-----------+
| 1         | A > B > C | 1           |           |
+-----------+-----------+-------------+-----------+

Condorcet Natural Winner & Loser
--------------------------------
+------ Natural Condorcet -------+
| Type               | Candidate |
+--------------------+-----------+
| * Condorcet Winner | A         |
| # Condorcet Loser  | C         |
+--------------------+-----------+
```