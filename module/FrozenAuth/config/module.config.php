<?php
namespace FrozenAuth;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use FrozenAuth\Controller\Factory\AuthControllerFactory;
use FrozenAuth\Controller\Factory\UserControllerFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\AuthController::class => AuthControllerFactory::class,
            Controller\UserController::class => UserControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            AuthenticationService::class => Service\Factory\AuthenticationServiceFactory::class,
            Service\AuthAdapter::class => Service\Factory\AuthAdapterFactory::class,
            Service\AuthManager::class => Service\Factory\AuthManagerFactory::class,
            Service\UserManager::class => Service\Factory\UserManagerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'FrozenAuth' => [
                'type'    => Segment::class,
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/auth[/:action]',
                    'defaults' => [
                        'controller'    => Controller\AuthController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // You can place additional routes that match under the
                    // route defined above here.
                ],
            ],
            'User' => [
                'type'    => Segment::class,
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/user[/:action]',
                    'defaults' => [
                        'controller'    => Controller\UserController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // You can place additional routes that match under the
                    // route defined above here.
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'auth' => __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Model']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
    'access_filter' => [
        'options' => [
            'mode' => 'permissive'
            ],
        'controllers' => [
//            Controller\IndexController::class => [
//                // Allow anyone to visit "index" and "about" actions
//                ['actions' => ['index', 'about'], 'allow' => '*'],
//                // Allow authorized users to visit "settings" action
//                ['actions' => ['settings'], 'allow' => '@']
//            ],
            ]
        ]
];
