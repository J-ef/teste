<?php
/**
 * Created by PhpStorm.
 * User: Jef
 * Date: 21/05/2017
 * Time: 20:02
 */

namespace Application\Controller\Factory;


use Application\Controller\OperadorController;
use Application\Entity\Operador;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class OperadorControllerFactory{

    public function __invoke(ContainerInterface $container){
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        $operadorRepository = $entityManager->getRepository(Operador::class);
        return new OperadorController($entityManager, $operadorRepository);
    }

}