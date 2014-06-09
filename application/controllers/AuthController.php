<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //cria um novo formulário
        $this->view->form = new Application_Form_Login;
    }


}

