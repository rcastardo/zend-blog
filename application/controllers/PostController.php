<?php

class PostController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $posts = new Application_Model_Posts();
        $this->view->posts = $posts->fetchAll();
    }

    public function createAction()
    {
        $form = new Application_Form_Post();
        $post = new Application_Model_Posts();

        if ($this->_request->isPost()) {

            if ($form->isValid($this->_request->getPost())) {

                $id = $post->insert($form->getValues());

                $this->redirect('post/index');
            }
            else {
                $form->populate($form->getValues());
            }
        }
        $this->view->form = $form;
    }

    public function updateAction()
    {
        $form = new Application_Form_Post();
        $form->setAction('/post/update');
        $form->submit->setLabel('Alterar');

        $posts = new Application_Model_Posts();

        if ($this->_request->isPost()) {

            if ($form->isValid($this->_request->getPost())) {

                $values = $form->getValues();
                $posts->update($values, 'id = '.$values['id']);

                $this->redirect('post/index');
            }
            else {
                $form->populate($form->getValues());
            }
        }
        else {
            $id = $this->_getParam('id');
            $post = $posts->fetchRow("id =$id")->toArray();
            $form->populate($post);
        }
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $posts = new Application_Model_Posts();

        $id = $this->_getParam('id');
        $posts->delete("id = $id");

        $this->redirect('post/index');
    }


}









