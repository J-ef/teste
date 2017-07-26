<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\AuthController;
use Application\Controller\Factory\AuthControllerFactory;
use Application\Service\Factory\AuthenticationServiceFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;


class Module implements ConfigProviderInterface ,ServiceProviderInterface ,ControllerProviderInterface {

    const VERSION = '3.0.3-dev';

    public function getConfig(){
        return include __DIR__ . '/../config/module.config.php';
    }


    /*Funçao que detecta o caminhoa acessado e determina qual layout ultilizar*/
    public function onBootstrap(MvcEvent  $e){
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractController', 'dispatch', function($e) {
            /** @var MvcEvent $e*/
            $controller      = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');

            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
                var_dump($controllerClass);
            }
        }, 0);
    }


    public function getControllerConfig(){
        return [
            'factories' =>[
                AuthController::class  => AuthControllerFactory::class
            ]
        ];

    }


    public function getServiceConfig(){

        return [
            'aliases'=>[
                AuthenticationService::class =>   AuthenticationServiceInterface::class
            ],
            'factories'=>[
                AuthenticationServiceInterface::class => AuthenticationServiceFactory::class
            ]
        ];

    }

}
