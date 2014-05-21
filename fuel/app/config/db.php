<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(

    'default' => array(
        'type'        => 'pdo',
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=ccst;charset=utf8;unix_socket=/var/lib/mysql/mysql.sock',
            'username'   => 'kilh',
            'password'   => 'Rlfguden82',
            'persistent' => false,
            'compress'       => false,
        ),
        'identifier'   => '`',
        'table_prefix' => '',
        'charset'      => 'utf8',
        'enable_cache' => true,
        'profiling'    => false,
    ),

    'mongo' => array(

		'default' => array(
			'hostname' => 'localhost',
			'database' => 'local',
		),

		'mongo_con_1' => array(
			'hostname' => 'localhost',
			'database' => 'ccst',
			'username' => 'kilh',
			'password' => 'Rlfguden82',
		),
	),

);
