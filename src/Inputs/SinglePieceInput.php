<?php

namespace Tharbakim\ChessPlayableMovesSolver\Inputs;

use Tharbakim\ChessPlayableMovesSolver\Pieces\Piece;
use Tharbakim\ChessPlayableMovesSolver\Pieces\PieceFactory;

class SinglePieceInput implements InputInterface
{
	public static function getInput(): array
	{
		$piece = PieceFactory::createRandom();
		return static::getInputArray($piece);
	}

	public static function getInputForPiece(string $piece): array
	{
		$piece = PieceFactory::create($piece);
		return static::getInputArray($piece);
	}

	private static function getInputArray(Piece $piece): array
	{
		return [
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => ''],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => ''],
			['a' => '', 'b' => '', 'c' => $piece, 'd' => '', 'e' => ''],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => ''],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => ''],
  		];
	}
}
