<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\Factory\AuthControllerFactory;
use Application\Controller\Factory\OperadorControllerFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [

            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'home-public' => [
                        'type' =>  Segment::class,
                        'options' => [
                            'route' => '[:action[/:id]]',
                            'constraints' => [
                                'action'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                                'action' => 'login'
                            ]
                        ]
                    ],

                    'auth' => [
                        'type' =>  Segment::class,
                        'options' => [
                            'route' => 'auth[/:action[/:id]]',
                            'constraints' => [
                                'action'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\AuthController::class,
                                'action' => 'login'
                            ]
                        ]
                    ]
                ]
            ],

            'app' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/app'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'dashboard' => [
                        'type' =>  Segment::class,
                        'options' => [
                            'route' => '/dashboard[/:action[/:id]]',
                            'constraints' => [
                                'action'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\DashboardController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],

                    'operador' => [
                        'type' =>  Segment::class,
                        'options' => [
                            'route' => '/operador[/:action[/:id]]',
                            'constraints' => [
                                'action'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\OperadorController::class,
                                'action' => 'index'
                            ]
                        ]
                    ]
                ]
            ],
        ]


    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\AuthController::class  => AuthControllerFactory::class,
            Controller\DashboardController::class => InvokableFactory::class,
            Controller\OperadorController::class  => OperadorControllerFactory::class
        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'               => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index'     => __DIR__ . '/../view/application/index/index.phtml',
            'application/dashboard/index' => __DIR__ . '/../view/application/dashboard/index.phtml',
            'error/404'                   => __DIR__ . '/../view/error/404.phtml',
            'error/index'                 => __DIR__ . '/../view/error/index.phtml',

        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ],

    'doctrine' =>[
        'driver' =>[
            'Auth_driver' =>[
                'class'=>AnnotationDriver::class,
                'cache'=>'array',
                'paths'=>[
                    __DIR__.'/../src/Entity'

                ]
            ],
            'orm_default'=>[
                'drivers'=>[
                    'Application\Entity'=>'Auth_driver'
                ]
            ]
        ]
    ]


];
