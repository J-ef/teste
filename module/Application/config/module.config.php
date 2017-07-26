<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\AuthController;
use Application\Controller\Factory\AuthControllerFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Dashboard\Controller\DashboardController;
use Index\Controller\IndexController;

return [
   'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'index' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/:action]',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],

            /*Rota de Autenticação*/
            'auth_literal' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/auth/login',
                    'defaults' => [
                        'controller' => AuthController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'auth_segment' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/auth[/:action]',
                    'defaults' => [
                        'controller' => AuthController::class,
                        'action'     => 'login',
                    ],
                ],
            ],


            /*Rota Dashboard*/
            'app_literal' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/app/dashboard',
                    'defaults' => [
                        'controller' => DashboardController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'app_segment' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/app/dashboard[/:action]',
                    'defaults' => [
                        'controller' => DashboardController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],

       'doctrine' =>[
           'driver' =>[
               'DB_Driver' =>[
                   'class'=>AnnotationDriver::class,
                   'cache'=>'array',
                   'paths'=>[
                       __DIR__ . '/../src/Entity'

                   ]
               ],
               'orm_default'=>[
                   'drivers'=>[
                       'Application\Entity'=>'DB_Driver'
                   ]
               ]
           ]
       ],
    ]



    /*,
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/dashboard_layout.phtml',
            'index/index/index' => __DIR__ . '/../view/index/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ]*/
];
