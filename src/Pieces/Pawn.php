<?php

namespace Tharbakim\ChessPlayableMovesSolver\Pieces;

use Tharbakim\ChessPlayableMovesSolver\Board;
use Tharbakim\ChessPlayableMovesSolver\MovementMatrix;

class Pawn extends Piece
{
	protected const PIECE_TYPE = '';

	public function __construct(string $color)
	{
		parent::__construct($color);
	}

	protected function applyMovement(MovementMatrix $matrices, Board $board, int $column, int $row): MovementMatrix
	{
		$movement = $this->getMovementDirection();
		if ($movement === MovementMatrix::MOVEMENT_UP_KEY) {
			$movement = -1;
			$direction = MovementMatrix::MOVEMENT_UP_KEY;
		} else {
			$movement = 1;
			$direction = MovementMatrix::MOVEMENT_DOWN_KEY;
		}

		if ($board->checkPositionIsEmpty($column, $row + $movement)) {
			$matrices->setMatrix($direction, [[$column, $row + $movement]]);
		}

		return $matrices;
	}

	private function getMovementDirection(): string
	{
		return $this->color === 'w' ? MovementMatrix::MOVEMENT_UP_KEY : MovementMatrix::MOVEMENT_DOWN_KEY;
	}
}
