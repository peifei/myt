<?php

class Medrecords_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $flashMsg=$this->_helper->flashMessenger->getMessages();
        if(isset($flashMsg[0])){
            $arrMsg=explode('|',$flashMsg[0]);
            $this->view->msgType=$arrMsg[0];
            $this->view->fbmsg=$arrMsg[1];
        }
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
    
    public function showelementAction(){
        $this->_helper->layout()->disableLayout();
        $request=$this->getRequest();
        $id=$request->getParam('id');
        $element=$request->getParam('ename');
        $form=new Medrecords_Form_Records();
        $form->prepareForupdate($id,$element);
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                $dbMedRecords=new Medrecords_Model_DbTable_MedRecords();
                $dbMedRecords->updateElement($form->getValues());
                $this->_helper->flashMessenger->addMessage("alert-success|病例修改成功");
                $this->redirect(SITE_BASE_URL.'medrecords/view?id='.$id);
            }else{
                $this->_helper->flashMessenger->addMessage("alert-danger|你输入的数据有问题，请检查");
                $this->redirect(SITE_BASE_URL.'medrecords/view?id='.$id);
            }
        }
        $this->view->form=$form;
    }
    
    public function showzljhAction(){
        $this->_helper->layout()->disableLayout();
        $request=$this->getRequest();
        $id=$request->getParam('id');
        $form=new Medrecords_Form_Zljh();
        $form->prepareForUpdate($id);
        if($request->isPost()){
            $dbMedZljh=new Medrecords_Model_DbTable_MedRecordsZljh();
            $zljh=$dbMedZljh->getZljhById($id);
            if($form->isValid($request->getPost())){
                $dbMedZljh->updateZljh($form->getValues());
                $this->_helper->flashMessenger->addMessage("alert-success|病例修改成功");
                $this->redirect(SITE_BASE_URL.'medrecords/view?id='.$zljh['records_id']);
            }else{
                $this->_helper->flashMessenger->addMessage("alert-danger|你输入的数据有问题，请检查");
                $this->redirect(SITE_BASE_URL.'medrecords/view?id='.$zljh['records_id']);
            }
        }
        $this->view->form=$form;
    }
    
    


}

