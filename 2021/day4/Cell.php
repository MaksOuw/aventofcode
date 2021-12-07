<?php

namespace AoC\Day4;

final class Cell
{
	private
		$value,
		$checked;

	public function __construct(int $value)
	{
		$this->value = $value;
		$this->checked = false;
	}

	public function value(): int
	{
		return $this->value;
	}

	public function checked(): bool
	{
		return $this->checked;
	}

	public function check(): void
	{
		$this->checked = true;
	}

	public function __toString(): string
	{
		return $this->value;
	}
}

