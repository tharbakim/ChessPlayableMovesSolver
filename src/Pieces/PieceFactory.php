<?php

namespace Tharbakim\ChessPlayableMovesSolver\Pieces;

use InvalidArgumentException;

class PieceFactory
{
	private const PIECE_MAP = [
		'k' => King::class,
		'q' => Queen::class,
		'r' => Rook::class,
		'b' => Bishop::class,
		'n' => Knight::class,
		' ' => Pawn::class,
	];
	public static function create(string $piece)
	{
		[$color, $piece] = str_split(str_pad($piece, 2, ' '));
		if (!array_key_exists($piece, self::PIECE_MAP)) {
			throw new InvalidArgumentException('Invalid piece type ' . $piece);
		}
		$class = self::PIECE_MAP[$piece];
		return new $class($color);
	}

	public static function createRandom()
	{
		$pieces = array_rand(array_keys(self::PIECE_MAP));
		$color = array_rand([Piece::COLOR_WHITE, Piece::COLOR_BLACK]);
		$piece = $color . $pieces;
		return self::create($piece);
	}
}