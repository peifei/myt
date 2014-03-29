<?php

class Medrecords_AddtreatmentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $id=$this->getRequest()->getParam('id');
        if(preg_match("/^\d+$/",$id)){
            //获取主病例信息
            $dbMedRecords=new Medrecords_Model_DbTable_MedRecords();
            $mainMed=$dbMedRecords->getMedRecordsById($id);
            $this->view->mainMed=$mainMed;
            //获取资料计划信息
            $dbMedRecordsZljh=new Medrecords_Model_DbTable_MedRecordsZljh();
            $zljhs=$dbMedRecordsZljh->getZljhByRecordsId($id);
            $this->view->zljhs=$zljhs;
            //定义新计划表单
            $form=new Medrecords_Form_Zljh();
            $this->view->form=$form;
            $request=$this->getRequest();
            if($request->isPost()){
                if($form->isValid($request->getPost())){
                    $dbMedRecordsZljh->addNewZljh($id, $form->getValue('zljh'));
                    $this->redirect(SITE_BASE_URL.'medrecords/addtreatment/jump?id='.$id);
                }
            }
        }else{
            echo 'id error';
            // TODO error deal
        }
    }
    
    public function jumpAction(){
        $id=$this->getRequest()->getParam('id');
        $this->redirect(SITE_BASE_URL.'medrecords/addtreatment?id='.$id);
    }


}

