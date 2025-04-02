<?php

namespace Tharbakim\ChessPlayableMovesSolver;

use Countable;
use Tharbakim\ChessPlayableMovesSolver\Pieces\Piece;

class MovementMatrix implements Countable
{
	public const MOVEMENT_LEFT_KEY = 'x-';
	public const MOVEMENT_RIGHT_KEY = 'x+';
	public const MOVEMENT_UP_KEY = 'y+';
	public const MOVEMENT_DOWN_KEY = 'y-';
	public const MOVEMENT_UP_LEFT_KEY = 'x-y-';
	public const MOVEMENT_UP_RIGHT_KEY = 'x+y+';
	public const MOVEMENT_DOWN_LEFT_KEY = 'x-y+';
	public const MOVEMENT_DOWN_RIGHT_KEY = 'x+y-';

	private $matrices  = [];

	public function __construct()
	{
		$this->initializeMatrices();
	}

	public function __toString(): string
	{
		$output = '';
		foreach ($this->matrices as $key => $matrix) {
			$output .= $key . PHP_EOL;
			foreach ($matrix as $row) {
				$output .= implode(' ', $row) . PHP_EOL;
			}
		}
		return $output;
	}

	public function count(): int
	{
		return array_sum(array_map('count', $this->matrices));
	}

	private function initializeMatrices(): void
	{
		$this->matrices = [
			static::MOVEMENT_RIGHT_KEY => [],
			static::MOVEMENT_LEFT_KEY => [],
			static::MOVEMENT_UP_KEY => [],
			static::MOVEMENT_DOWN_KEY => [],
			static::MOVEMENT_UP_RIGHT_KEY => [],
			static::MOVEMENT_UP_LEFT_KEY => [],
			static::MOVEMENT_DOWN_RIGHT_KEY => [],
			static::MOVEMENT_DOWN_LEFT_KEY => [],
		];
	}

	public function setMatrix(string $key, array $matrix): void
	{
		$this->matrices[$key] = $matrix;
	}

	public function getMatrix(string $key): array
	{
		return $this->matrices[$key];
	}
}