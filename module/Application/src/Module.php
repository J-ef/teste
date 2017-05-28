<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;
error_reporting(E_ERROR);

use Application\Controller\AuthController;
use Application\Controller\Factory\AuthControllerFactory;
use Application\Controller\IndexController;
use Application\Service\Factory\AuthenticationServiceFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface ,ServiceProviderInterface ,ControllerProviderInterface {

    const VERSION = '3.0.3-dev';
/*
    public function onBootstrap(MvcEvent $e) {

        $eventManager = $e->getApplication()->getEventManager();
        $container    = $e->getApplication()->getServiceManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH,
            function (MvcEvent $e) use ($container) {
                $match = $e->getRouteMatch();
                $authService = $container->get(AuthenticationServiceInterface::class);
                $routeName   = $match->getMatchedRouteName();

                if ($authService->hasIdentity()) {
                    return;
                } elseif (strpos($routeName, 'app') !== false) {
                    $response = $e->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', '/login');
                    $response->setStatusCode(302);
                    return $response;


                }
        }, 100);
    }

*/


    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $eventManager = $application->getEventManager();

        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function($e) {
            $error = $e->getError();
            switch ($error) {
                case Application::ERROR_ROUTER_NO_MATCH:

                    var_dump($error);

                    $response = $e->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', '/login');
                    $response->setStatusCode(302);
                    return $response;
                    break;
            }
        }, 100);
    }


    public function getConfig(){
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(){

        return [
            'aliases'=>[
                AuthenticationService::class =>   AuthenticationServiceInterface::class
            ],
            'factories'=>[
                AuthenticationServiceInterface::class =>   AuthenticationServiceFactory::class
            ]
        ];

    }

    public function getControllerConfig(){

        return [
            'factories' =>[
                AuthController::class  => AuthControllerFactory::class,
            ]
        ];
    }
}
