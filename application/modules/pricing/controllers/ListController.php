<?php

class Pricing_ListController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $dbPricing=new Pricing_Model_DbTable_Pricing();
        $today=new Zend_Date();
        $pricingList=$dbPricing->getPricingListByDate($today->toString('yyyy-MM-dd'));
    }


}

