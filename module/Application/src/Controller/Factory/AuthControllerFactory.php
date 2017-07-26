<?php

namespace Application\Controller\Factory;

use Application\Controller\AuthController;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationServiceInterface;

class AuthControllerFactory{

    public function  __invoke(ContainerInterface $container)
    {
        $authservice = $container->get(AuthenticationServiceInterface::class);
        return new AuthController($authservice);
    }


}