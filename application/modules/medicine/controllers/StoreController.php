<?php

class Medicine_StoreController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $dbMedStockin=new Medicine_Model_DbTable_MedStockin();
        $stockinList=$dbMedStockin->getStockinList();
        $this->view->stockinList=$stockinList;
        
    }
    
    public function stockinAction(){
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
            }
        }
        
        
        
        
        
    }


}

