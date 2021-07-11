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

/**
 * Class VarcharColumn.
 *
 * @see https://mariadb.com/kb/en/library/varchar/
 */
final class VarcharColumn extends StringDataType
{
    protected string $type = 'varchar';
    protected int $maxLength = 65535;
}
