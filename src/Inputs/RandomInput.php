<?php

namespace Tharbakim\ChessPlayableMovesSolver\Inputs;

class RandomInput implements InputInterface
{
	public static function getInput(): array
	{
		[$rows, $columns] = static::getBoardShape();
		$input = [];
		for ($i = 0; $i < $rows; $i++) {
			$input[] = static::generateRandomRow($columns);
		}
		return $input;
	}

	private static function getBoardShape(): array
	{
		return [random_int(2, 26), random_int(2, 26)];
	}

	private static function getRandomPiece(): string
	{
		$isEmpty = random_int(1, 2);
		if ($isEmpty === 2) {
			return '';
		}
		$pieces = ['wr', 'wn', 'wb', 'wq', 'wk', 'w', 'br', 'bn', 'bb', 'bq', 'bk', 'b'];
		return $pieces[array_rand($pieces)];
	}

	private static function generateRandomRow(int $columns): array
	{
		$row = [];
		for ($i = 1; $i <= $columns; $i++) {
			$row[chr(96 + $i)] = static::getRandomPiece();
		}
		return $row;
	}
}
