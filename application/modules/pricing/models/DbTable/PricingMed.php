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
    
    public function getMedSum($medId){
        $db=$this->_db;
        $selecter=$db->select()->from(array('a'=>$this->_name),array('sum(m) as allPricing'))
                               ->joinLeft(array('b'=>'med_base'),'a.y=b.med_name')
                               ->where("b.id='".$medId."'");
        $res=$db->fetchRow($selecter);
        return $res;
    }

}

