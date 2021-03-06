<?php

class Medrecords_ViewController extends Zend_Controller_Action
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
            //获取处方信息
            $dbPricing=new Pricing_Model_DbTable_Pricing();
            $pricingList=$dbPricing->getPricingListByName($mainMed['name']);
            $this->view->pricingList=$pricingList;
        }else{
            echo 'id error';
            // TODO error deal
        }
    }


}

