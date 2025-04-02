# Chess Playable Move Solver
This is the sourcecode for the technical challenge posted here: https://tharba.kim/technical-exam-valid-chess-moves/

It is not meant to be a functional library, but is meant to be used, tested, and modified to support learning goals alongside the content of the above post.

If you spot an error or problem with it feel free to open an issue or submit a PR.

Otherwise feel free to do with it whatever you please.


## Usage
Modifying the content of `Game.php` allows you to calculate the number of valid moves for different game states by modifying the `$input` object.

Then, run the `Game.php` file to calculate the count of valid moves:

```
>>php Game.php
Valid playable moves: 4
```