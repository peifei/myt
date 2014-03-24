<?php

class Medrecords_AddController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Medrecords_Form_Records();
        $this->view->form=$form;
        $request=$this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $dbMedredords=new Medrecords_Model_DbTable_MedRecords();
                $dbMedredords->addNewMedRecords($form->getValues());
            }
        }
    }


}

