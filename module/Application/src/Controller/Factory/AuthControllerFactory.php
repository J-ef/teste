<?php

/**
 * Created by PhpStorm.
 * User: Jef
 * Date: 22/04/2017
 * Time: 15:31
 */

namespace Application\Controller\Factory;


use Interop\Container\ContainerInterface;
use Application\Controller\AuthController;
use Zend\Authentication\AuthenticationServiceInterface;

class AuthControllerFactory{

    public function __invoke(ContainerInterface $container){

        $authService = $container->get(AuthenticationServiceInterface::class);
        return new AuthController($authService);

    }

}