<?php

class Pricing_ListController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $date=$this->getRequest()->getParam('date');
        if(''==$date){
            $today=new Zend_Date();
            $date=$today->toString('yyyy-MM-dd');
        }
        $this->view->date=$date;
        $dbPricing=new Pricing_Model_DbTable_Pricing();
        $pricingList=$dbPricing->getPricingListByDate($date);
        $this->view->pricingList=$pricingList;
    }


}

