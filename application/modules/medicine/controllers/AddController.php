<?php

class Medicine_AddController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Medicine_Form_AddMedicine();
        $request=$this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $this->_helper->flashMessenger->addMessage('新的药材品种添加成功');
                $this->redirect(SITE_BASE_URL.'mdeicind');
            }
        }
        $this->view->form=$form;
    }


}

