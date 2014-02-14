<?php

class Medicine_StoreController extends Zend_Controller_Action
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
        
        $dbMedStockin=new Medicine_Model_DbTable_MedStockin();
        $stockinList=$dbMedStockin->getStockinList();
        $this->view->stockinList=$stockinList;
        
    }
    
    public function stockinAction(){
        try{
            $form=new Medicine_Form_Stockin();
            $this->view->form=$form;
            $dbMedBase=new Medicine_Model_DbTable_MedBase();
            $medAllList=$dbMedBase->getMedsList();
            $medArrs=array();
            foreach ($medAllList as $medInfo){
                $medArrs[]="\"".$medInfo->med_name."\"";
            }
            $this->view->medStr=implode(',',$medArrs);
            
            $request=$this->getRequest();
            if($request->isPost()){
                if($form->isValid($request->getPost())){
                    $dbMedScockin=new Medicine_Model_DbTable_MedStockin();
                    $dbMedScockin->addNewScockin($form->getValues());
                    $this->_helper->flashMessenger->addMessage('alert-success|库存记录登记成功');
                    $this->redirect(SITE_BASE_URL.'medicine/store/');
                }
            }
        }catch(Exception $e){
            $this->_helper->flashMessenger->addMessage('alert-danger|库存记录登记异常:'.$e->getMessage());
            $this->redirect(SITE_BASE_URL.'medicine/store/');
        }
    }


}

