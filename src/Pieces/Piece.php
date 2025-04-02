<?php

namespace Tharbakim\ChessPlayableMovesSolver\Pieces;

use Tharbakim\ChessPlayableMovesSolver\Board;
use Tharbakim\ChessPlayableMovesSolver\MovementMatrix;

abstract class Piece
{
	public const COLOR_WHITE = 'w';
	public const COLOR_BLACK = 'b';

	protected const PIECE_TYPE = 'INVALID';

	private string $type;

	public function __construct(
		protected string $color,
	) {
		if (!in_array($color, [self::COLOR_WHITE, self::COLOR_BLACK])) {
			throw new \InvalidArgumentException('Invalid color');
		}
		$this->type = static::PIECE_TYPE;
		$this->color = $color;
	}

	public function __toString(): string
	{
		return $this->color . $this->type;
	}

	public function getMovementMatrix(Board $board, int $column, int $row): MovementMatrix
	{
		$matrices = new MovementMatrix();
		$matrices = $this->applyMovement($matrices, $board, $column, $row);

		return $matrices;
	}

	protected abstract function applyMovement(MovementMatrix $matrices, Board $board, int $column, int $row): MovementMatrix;
}