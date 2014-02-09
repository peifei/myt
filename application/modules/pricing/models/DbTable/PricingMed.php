<?php

class Pricing_Model_DbTable_PricingMed extends Zend_Db_Table_Abstract
{

    protected $_name = 'pricing_med';

    public function addNewPricingMed($data){
        $this->insert($data);
    }
    
    public function getPricingMedByMainId($mainId){
        $res=$this->fetchAll("main_id='".$mainId."'");
        return $res;
    }

}

