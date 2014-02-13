<?php

class Admin_DocsController extends Zend_Controller_Action
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
        $dbDocs=new Admin_Model_DbTable_Docs();
        $docList=$dbDocs->getDocsList();
        $this->view->docList=$docList;
    }
    
    public function adddocAction(){
        $form=new Admin_Form_Doc();
        $this->view->form=$form;
        $request=$this->getRequest();
        if($request->isPost()){
            if($form->isValid($request->getPost())){
                try{
                    $dbDocs=new Admin_Model_DbTable_Docs();
                    $dbDocs->addNew($form->getValues());
                    $this->_helper->flashMessenger->addMessage("alert-success|医师信息添加成功");
                    $this->redirect(SITE_BASE_URL.'admin/docs/');
                }catch(Exception $e){
                    $this->view->msgType='alert-danger';
                    $this->view->fbmsg=$e;
                }
            }
        }
    }
    
    public function deleteAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $id=$this->getRequest()->getParam('id');
        $dbDocs=new Admin_Model_DbTable_Docs();
        try{
            $dbDocs->deleteDoc($id);
            $this->_helper->flashMessenger->addMessage("alert-success|医师信息删除成功");
        }catch(Exception $e){
            $this->_helper->flashMessenger->addMessage("alert-danger|".$e);
        }
        $this->redirect(SITE_BASE_URL.'admin/docs/');
    }
    
    public function updateAction(){
        $request=$this->getRequest();
        try{
            $id=$request->getParam('id');
            $form=new Admin_Form_Doc();
            $form->prepearForUpdate($id);
            
            if($request->isPost()){
                if($form->isValid($request->getPost())){
                    $dbDocs=new Admin_Model_DbTable_Docs();
                    $dbDocs->updateDoc($form->getValues());
                    $this->_helper->flashMessenger->addMessage("alert-success|医师信息更新成功");
                    $this->redirect(SITE_BASE_URL.'admin/docs/');
                }
            }
            $this->view->form=$form;
        }catch(Exception $e){
            //$this->view->msgType='alert-danger';
            //$this->view->fbmsg=$e;
        }
    }


}

