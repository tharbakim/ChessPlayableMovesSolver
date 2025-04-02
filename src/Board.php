<?php

namespace Tharbakim\ChessPlayableMovesSolver;

use Tharbakim\ChessPlayableMovesSolver\Pieces\Piece;

class Board
{
	private array $state = [];

	public function __construct(int $rows, int $columns)
	{
		$this->state = array_fill(0, $rows, array_fill(0, $columns, null));
	}

	public function __toString(): string
	{
		$board = '';
		foreach ($this->state as $index => $row) {
			$rowLabel = sizeof($this->state) - $index;
			$board .= "$rowLabel| ";
			foreach ($row as $cell) {
				$board .= str_pad($cell ?? '--', 3);
			}
			$board = rtrim($board);
			$board .= PHP_EOL . PHP_EOL;
		}
		$columnCount = sizeof($this->state[0]);
		$board = substr($board, 0, -1);
		$board .= '_  ' . str_repeat('_  ', $columnCount) . PHP_EOL;
		$board .= ' | ' . implode('  ', range('a', chr(96 + $columnCount))) . PHP_EOL;
		return $board;
	}

	public function getPlayableMoves(string $pieceFilter = Piece::class): int
	{
		$playableMoves = 0;
		foreach ($this->state as $row => $columns) {
			foreach ($columns as $column => $piece) {
				if (is_a($piece, $pieceFilter)) {
					$playableMoves += count($piece->getMovementMatrix($this, $column, $row));
				}
			}
		}
		return $playableMoves;
	}

	public function getPiece(string $column, int $row): ?Piece
	{
		return $this->state[$row -1][$this->alphaToNum($column)] ?? null;
	}

	public function placePiece(string $column, int $row, Piece $piece): void
	{
		$this->state[$row -1][$this->alphaToNum($column)] = $piece;
	}

	public function checkPositionIsEmpty(int $column, int $row): bool
	{
		if (array_key_exists($row, $this->state) === false) {
			return false;
		}
		
		if (array_key_exists($column, $this->state[$row]) === false) {
			return false;
		}
		$output = !is_a($this->state[$row][$column], Piece::class);
		return $output;
	}

	private function alphaToNum(string $char): int
	{
		return ord(strtolower($char)) - 97;
	}
}
