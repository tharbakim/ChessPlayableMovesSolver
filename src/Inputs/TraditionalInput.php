<?php

namespace Tharbakim\ChessPlayableMovesSolver\Inputs;

class TraditionalInput implements InputInterface
{
	public static function getInput(): array
	{
		return [
			['a' => 'br', 'b' => 'bn', 'c' => 'bb', 'd' => 'bq', 'e' => 'bk', 'f' => 'bb', 'g' => 'bn', 'h' => 'br'],
			['a' => 'b', 'b' => 'b', 'c' => 'b', 'd' => 'b', 'e' => 'b', 'f' => 'b', 'g' => 'b', 'h' => 'b'],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => '', 'f' => '', 'g' => '', 'h' => ''],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => '', 'f' => '', 'g' => '', 'h' => ''],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => '', 'f' => '', 'g' => '', 'h' => ''],
			['a' => '', 'b' => '', 'c' => '', 'd' => '', 'e' => '', 'f' => '', 'g' => '', 'h' => ''],
			['a' => 'w', 'b' => 'w', 'c' => 'w', 'd' => 'w', 'e' => 'w', 'f' => 'w', 'g' => 'w', 'h' => 'w'],
			['a' => 'wr', 'b' => 'wn', 'c' => 'wb', 'd' => 'wq', 'e' => 'wk', 'f' => 'wb', 'g' => 'wn', 'h' => 'wr'],
		];
	}
}
