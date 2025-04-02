<?php

namespace Tharbakim\ChessPlayableMovesSolver\Inputs;

class ExampleInput implements InputInterface
{
	public static function getInput(): array
	{
		return [
			['a' => 'b', 'b' => 'b'],
			['a' => '', 'b' => ''],
			['a' => 'w', 'b' => 'w']
  		];
	}
}
