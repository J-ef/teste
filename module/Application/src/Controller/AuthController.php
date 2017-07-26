<?php

namespace Application\Controller;

use Application\Service\Factory\AuthenticationServiceFactory;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{


    /**
     * @var AuthenticationServiceInterface
     */
    private $authService;



    public function loginAction(){

        /** @var \Zend\Http\Request $request */
        $request = $this ->getRequest();
        if($request ->isXmlHttpRequest()) {
            if ($request->isPost()) {
                $formData = $request->getPost();
                /*Aqui, após pegar todos os dados passados via Post, verificar uma maneira de valiadar os dados que vieram, seja um a um ou  array completo*/

                $usuario = $request->getPost('usuario');
                var_dump($usuario);
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

        return new ViewModel();

    }
}
