<?php

namespace Application\Controller;

use Application\Service\Factory\AuthenticationServiceFactory;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController {
   /**
    * @var AuthenticationServiceFactory
    */
    private $authService;

    public function __construct(AuthenticationServiceInterface $authService){

        $this->authService = $authService;
    }

    public function indexAction(){

        return new ViewModel();
    }

    public function loginAction(){
        /*
         *
         * Criar uma rota dashboard e protege-la de acessos nao autorizados.
         * Rota dashboard, devera conter apenas funções de login, logout ou funções relacionadas a autenticação do usuario

        */

        /** @var \Zend\Http\Request $request */

        $request = $this ->getRequest();

        if($request ->isXmlHttpRequest()) {

            if ($request->isPost()) {

                  $formData = $request->getPost();
                  /*Aqui, após pegar todos os dados passados via Post, verificar uma maneira de valiadar os dados que vieram, seja um a um ou  array completo*/

                  /** @var CallbackCheckAdapter $authAdpter*/
                  $authAdpter = $this->authService->getAdapter();
                  $authAdpter->setIdentity($request->getPost('usuario'));
                  $authAdpter->setCredential($request->getPost('senha'));
                  $result = $this ->authService->authenticate();

                  if( $result->isValid()){

                      $data = new JsonModel(array(
                          'success'         => true,
                          'redirect'        => 'app/dashboard',
                          'responseMessage' => 'Login efetuado com sucesso'

                      ));

                      return $data;

                  }else{
                      $data = new JsonModel(array(
                          'success' => false,
                          'redirect' => '',
                          'responseMessage' => 'Usuario ou senha inválidos'

                      ));

                      return $data;
                  }

            }

        }

    }

    public function logoutAction(){

        $this->authService->clearIdentity();

        $data = new JsonModel(array(
            'success'  => true,
            'redirect' => '/login',
            'responseMessage' => 'Volte sempre'
        ));

        return $data;
    }

}
