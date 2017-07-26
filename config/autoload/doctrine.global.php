<?php


use Application\Entity\Operador;
use Doctrine\ORM\EntityManager;


return array(
    'doctrine' => array(
        'connection' =>array(
            'orm_default' => array(
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params'      => array(
                    'host'     =>'localhost',
                    'port'     =>'3306',
                    'driverOptions'=>[
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    ]

                )
            )
        ),
        'authentication' => [
            'orm_default' => array(
                'object_manager' => EntityManager::class,
                'identity_class' => Operador::class,
                'identity_property' =>'usuario',
                'credential_property' =>'senha',
                'credential_callable' => function(Operador $user, $passwordSent) {
                    return password_verify($passwordSent, $user->getSenha());
                }
            )
        ]
    )
);