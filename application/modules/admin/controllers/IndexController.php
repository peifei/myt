<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
        $form = new Admin_Form_AdminLogin();
        $this->view->form=$form;
        $request=$this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $data=$form->getValues();
                var_dump($data);
            }
        }
    }


}



