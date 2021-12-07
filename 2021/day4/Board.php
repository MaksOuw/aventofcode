<?php

namespace AoC\Day4;

final class Board
{
	private
		$rows,
		$completed;

	public function __construct(array $rows)
	{
		$this->rows = $rows;
		$completed = [];
	}

	public function unchecked(): array
	{
		$cells = [];
		foreach($this->rows as $row)
		{
			foreach($row as $cell)
			{
				if(! $cell->checked())
				{
					$cells[] = $cell;
				}
			}
		}

		return $cells;
	}

	public function completed(): array
	{
		return $this->completed;
	}

	public function hasNumber(int $number)
	{
		foreach($this->rows as $row)
		{
			foreach($row as $cell)
			{
				if($cell->value() === $number)
				{
					return true;
				}
			}
		}

		return false;
	}

	public function checkCell(int $number): void
	{
		foreach($this->rows as $row)
		{
			foreach($row as $cell)
			{
				if($cell->value() === $number)
				{
					$cell->check();
				}
			}
		}
	}

	public function hasACompletedLine(): bool
	{
		return $this->hasACompletedRow() || $this->hasACompletedColumn();
	}

	private function hasACompletedRow(): bool
	{
		foreach($this->rows as $row)
		{
			$i = 0;
			foreach($row as $cell)
			{
				if($cell->checked())
				{
					$i++;
				}
				if($i === 5)
				{
					$this->completed = $row;

					return true;
				}
			}
		}

		return false;
	}

	private function hasACompletedColumn(): bool
	{
		for($i = 0; $i < 6; $i++)
		{
			$column = array_column($this->rows, $i);
			$numberCompleted = 0;

			foreach($column as $cell)
			{
				if($cell->checked())
				{
					$numberCompleted++;
				}
			}

			if($numberCompleted === 5)
			{
				$this->completed = $column;

				return true;
			}
		}

		return false;
	}

	private function hasACompletedDiagonal(): bool
	{
		$diagonals = [];
		$i = 0;
		$j = 5;
		foreach($rows as $row)
		{
			$diagonals[0][] = $row[$i];
			$diagonals[1][] = $row[$j];

			$i++;
			$j--;
		}

		foreach($diagonals as $diagonal)
		{
			$numberCompleted = 0;
			foreach($diagonal as $cell)
			{
				if($cell->checked())
				{
					$numberCompleted++;
				}
				if($numberCompleted === 5)
				{
					$this->completed = $diagonal;

					return true;
				}
			}
		}

		return false;
	}
}

