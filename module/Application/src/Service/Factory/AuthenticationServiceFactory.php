<?php
/**
 * Created by PhpStorm.
 * User: Jef
 * Date: 17/04/2017
 * Time: 22:34
 */

namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;



class AuthenticationServiceFactory{

    public function __invoke(ContainerInterface $container){

        return $container ->get('doctrine.authenticationservice.orm_default');

    }

}