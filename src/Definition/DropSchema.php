<?php declare(strict_types=1);
/*
 * This file is part of The Framework Database Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Framework\Database\Definition;

use Framework\Database\Statement;
use LogicException;

/**
 * Class DropSchema.
 *
 * @see https://mariadb.com/kb/en/library/drop-database/
 */
class DropSchema extends Statement
{
	/**
	 * @return $this
	 */
	public function ifExists()
	{
		$this->sql['if_exists'] = true;
		return $this;
	}

	protected function renderIfExists() : ?string
	{
		if ( ! isset($this->sql['if_exists'])) {
			return null;
		}
		return ' IF EXISTS';
	}

	/**
	 * @param string $schemaName
	 *
	 * @return $this
	 */
	public function schema(string $schemaName)
	{
		$this->sql['schema'] = $schemaName;
		return $this;
	}

	protected function renderSchema() : string
	{
		if (isset($this->sql['schema'])) {
			return ' ' . $this->database->protectIdentifier($this->sql['schema']);
		}
		throw new LogicException('SCHEMA name must be set');
	}

	public function sql() : string
	{
		$sql = 'DROP SCHEMA' . $this->renderIfExists();
		$sql .= $this->renderSchema() . \PHP_EOL;
		return $sql;
	}

	/**
	 * Runs the CREATE SCHEMA statement.
	 *
	 * @return int The number of affected rows
	 */
	public function run() : int
	{
		return $this->database->exec($this->sql());
	}
}
