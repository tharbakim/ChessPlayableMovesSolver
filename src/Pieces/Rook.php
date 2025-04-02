<?php

namespace Tharbakim\ChessPlayableMovesSolver\Pieces;

use Tharbakim\ChessPlayableMovesSolver\Board;
use Tharbakim\ChessPlayableMovesSolver\MovementMatrix;

class Rook extends Piece
{
	protected const PIECE_TYPE = 'r';

	public function __construct(string $color)
	{
		parent::__construct($color);
	}

	protected function applyMovement(MovementMatrix $matrices, Board $board, int $column, int $row): MovementMatrix
	{
		$directions = [
			MovementMatrix::MOVEMENT_UP_KEY,
			MovementMatrix::MOVEMENT_DOWN_KEY,
			MovementMatrix::MOVEMENT_LEFT_KEY,
			MovementMatrix::MOVEMENT_RIGHT_KEY,
		];

		foreach ($directions as $direction) {
			$instructions = str_split($direction);
			$validMovements = [];
			$xMovement = 0;
			$yMovement = 0;
			if ($instructions[0] === 'x') {
				if ($instructions[1] === '+') {
					$xMovement = 1;
				} else {
					$xMovement = -1;
				}
			} else {
				if ($instructions[1] === '+') {
					$yMovement = 1;
				} else {
					$yMovement = -1;
				}
			}
			while ($board->checkPositionIsEmpty($column + $xMovement, $row + $yMovement)) {
				$validMovements = [$column + $xMovement, $row + $yMovement];
				$column += $xMovement;
				$row += $yMovement;
			}
			$matrices->setMatrix($direction, $validMovements);
		}
		return $matrices;
	}
}