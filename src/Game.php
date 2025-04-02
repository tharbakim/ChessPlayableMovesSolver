<?php

use Tharbakim\ChessPlayableMovesSolver\Board;
use Tharbakim\ChessPlayableMovesSolver\Inputs\ExampleInput;
use Tharbakim\ChessPlayableMovesSolver\Pieces\PieceFactory;

require('../vendor/autoload.php');

$input = ExampleInput::getInput();

$board = new Board(sizeof($input), sizeof($input[0]));

for ($row = 0; $row < sizeof($input); $row++) {
	foreach ($input[$row] as $column => $piece) {
		if ($piece) {
			$board->placePiece($column, $row + 1, PieceFactory::create($piece));
		}
	}
}

echo 'Valid playable moves: ' . $board->getPlayableMoves() . PHP_EOL;