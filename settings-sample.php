<?php
/**
 * Cim - A simple invoice manager
 *
 * @author      Sem Schilder <sem@tropical.email>
 * @copyright   (c) Sem Schilder
 * @link        https://github.com/xvilo/customer-invoice-manager
 */

$settings = [
    'database' => [
        'host' => 'localhost',
        'username' => 'database_user',
        'password' => 'P@ssw00rd',
        'database' => 'database_name',
    ],
    'redis' => [
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379
    ],
    'use-cache' => true,
    'application-dir' => __DIR__,
    'active-template' => 'start',
    'development' => false,
];
