<?php

namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;

class AuthenticationServiceFactory
{
    /**
     * @param ContainerInterface $container
     */
    function __invoke(ContainerInterface $container)
     {
         return $container ->get('doctrine.authenticationservice.orm_default');
     }

}