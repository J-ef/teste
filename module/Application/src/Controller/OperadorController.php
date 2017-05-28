<?php

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Repository\RepositoryFactory;
use Zend\Mvc\Console\View\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;


class OperadorController extends AbstractActionController {
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var EntityRepository
     */
    private $repository;


    /**
     * OperadorController constructor.
     */
    public function __construct(EntityManager $entityManager ,EntityRepository $repository ){

        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    public function indexAction(){

            return new ViewModel();
    }


    public function loadAllAction(){

        $data = new JsonModel(array(
            'success'         => true,
            'redirect'        => $this->repository->findAll()

        ));

        return $data;
    }

    public function loadById(){


    }


    public function edit(){


    }

    public function remove(){


    }


}
