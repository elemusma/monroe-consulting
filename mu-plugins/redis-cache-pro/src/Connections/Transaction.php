<?php
/**
 * Copyright © Rhubarb Tech Inc. All Rights Reserved.
 *
 * All information contained herein is, and remains the property of Rhubarb Tech Incorporated.
 * The intellectual and technical concepts contained herein are proprietary to Rhubarb Tech Incorporated and
 * are protected by trade secret or copyright law. Dissemination and modification of this information or
 * reproduction of this material is strictly forbidden unless prior written permission is obtained from
 * Rhubarb Tech Incorporated.
 *
 * You should have received a copy of the `LICENSE` with this file. If not, please visit:
 * https://objectcache.pro/license.txt
 */

declare(strict_types=1);

namespace RedisCachePro\Connections;

use RedisCachePro\Connections\Connection;

class Transaction
{
    /**
     * The string representing a pipeline transaction.
     *
     * @var string
     */
    const Pipeline = 'pipeline';

    /**
     * The string representing a multi transaction.
     *
     * @var string
     */
    const Multi = 'multi';

    /**
     * The transaction type.
     *
     * @var string
     */
    public $type;

    /**
     * The underlying connection to execute the transaction on.
     *
     * @var \RedisCachePro\Connections\Connection
     */
    public $connection = [];

    /**
     * Holds all queued commands.
     *
     * @var array
     */
    public $commands = [];

    /**
     * Creates a new transaction instance.
     *
     * @param  string  $type
     * @param  \RedisCachePro\Connections\Connection  $connection
     * @return void
     */
    public function __construct(string $type, Connection $connection)
    {
        $this->type = $type;
        $this->connection = $connection;
    }

    /**
     * Creates a new pipeline transaction.
     *
     * @param  \RedisCachePro\Connections\Connection  $connection
     * @return void
     */
    public static function pipeline(Connection $connection)
    {
        return new static(static::Pipeline, $connection);
    }

    /**
     * Creates a new multi transaction.
     *
     * @param  \RedisCachePro\Connections\Connection  $connection
     * @return void
     */
    public static function multi(Connection $connection)
    {
        return new static(static::Multi, $connection);
    }

    /**
     * Shim to execute the transaction on the underlying connection.
     *
     * @return array
     */
    public function exec()
    {
        return $this->connection->multiCommand($this);
    }

    /**
     * Memorize all method calls for later execution.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $this->commands[] = [$method, $parameters];

        return $this;
    }
}
