<?php

class Medicine_UpdateController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $id=$this->getRequest()->getParam('id');
        $form=new Medicine_Form_AddMedicine();
        $form->prepareForUpdate($id);
        $request=$this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $dbMedBase=new Medicine_Model_DbTable_MedBase();
                $dbMedBase->updateMed($form->getValues());
                $this->_helper->flashMessenger->addMessage('alert-success|药材品种更新成功');
                $this->redirect(SITE_BASE_URL.'medicine/');
            }
        }
        $this->view->form=$form;
        
    }


}

