<?php

class Pricing_ListController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $datestart=$this->getRequest()->getParam('datestart');
        $dateend=$this->getRequest()->getParam('dateend');
        $today=new Zend_Date();
        if(''==$datestart){
            $datestart=$today->toString('yyyy-MM-dd');
        }
        if(''==$dateend){
            $dateend=$today->toString('yyyy-MM-dd');
        }
        $dbPricing=new Pricing_Model_DbTable_Pricing();
        $pricingList=$dbPricing->getPricingListByDate($datestart,$dateend);
        $this->view->pricingList=$pricingList;
        $this->view->datestart=$datestart;
        $this->view->dateend=$dateend;
    }


}

