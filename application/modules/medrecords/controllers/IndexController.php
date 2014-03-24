<?php

class Medrecords_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $db=Zend_Db_Table::getDefaultAdapter();
        $selecter=$db->select()->from('med_records');
        $request=$this->getRequest();
        $form = new Application_Form_Searchbox();
        $this->view->form=$form;
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $selecter->where("name like '%".$form->getValue('schStr')."%'");
            }
        }
        $pageAdapter=new Zend_Paginator_Adapter_DbSelect($selecter);
        $paginator = new Zend_Paginator($pageAdapter);
        $paginator->setItemCountPerPage(16);
        $page=$this->_getParam('page');
        $paginator->setCurrentPageNumber($page);
        $this->view->paginator = $paginator;
        
        
    }
    
    public function addAction(){
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

