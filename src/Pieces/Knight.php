<?php

namespace Tharbakim\ChessPlayableMovesSolver\Pieces;

use Tharbakim\ChessPlayableMovesSolver\Board;
use Tharbakim\ChessPlayableMovesSolver\MovementMatrix;

class Knight extends Piece
{
	protected const PIECE_TYPE = 'n';

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
			MovementMatrix::MOVEMENT_DOWN_LEFT_KEY,
			MovementMatrix::MOVEMENT_DOWN_RIGHT_KEY,
			MovementMatrix::MOVEMENT_UP_LEFT_KEY,
			MovementMatrix::MOVEMENT_UP_RIGHT_KEY,
		];

		$this->checkKnightMovement($matrices, $board, $column, $row, 2, 1, $directions[0]);
		$this->checkKnightMovement($matrices, $board, $column, $row, 2, -1, $directions[1]);
		$this->checkKnightMovement($matrices, $board, $column, $row, 1, 2, $directions[2]);
		$this->checkKnightMovement($matrices, $board, $column, $row, 1, -2, $directions[3]);
		$this->checkKnightMovement($matrices, $board, $column, $row, -2, 1, $directions[4]);
		$this->checkKnightMovement($matrices, $board, $column, $row, -2, -1, $directions[5]);
		$this->checkKnightMovement($matrices, $board, $column, $row, -1, 2, $directions[6]);
		$this->checkKnightMovement($matrices, $board, $column, $row, -1, -2, $directions[7]);
		return $matrices;
	}
	private function checkKnightMovement(MovementMatrix $matrices, Board $board, int $column, int $row, int $columnModifier, int $rowModifier, string $matrixKey): void
	{

		if ($board->checkPositionIsEmpty($column + $columnModifier, $row + $rowModifier)) {
			$validMovement = [[$column + $columnModifier, $row + $rowModifier]];
			$matrices->setMatrix($matrixKey, $validMovement);
		}
	}
}
