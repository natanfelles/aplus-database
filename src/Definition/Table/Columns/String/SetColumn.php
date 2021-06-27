<?php declare(strict_types=1);
/*
 * This file is part of The Framework Database Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Framework\Database\Definition\Table\Columns\String;

use Framework\Database\Definition\Table\Columns\Traits\ListLength;

/**
 * Class SetColumn.
 *
 * @see https://mariadb.com/kb/en/library/set-data-type/
 */
final class SetColumn extends StringDataType
{
	use ListLength;
	protected string $type = 'set';
}
