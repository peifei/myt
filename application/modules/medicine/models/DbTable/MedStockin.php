<?php

class Medicine_Model_DbTable_MedStockin extends Zend_Db_Table_Abstract
{

    protected $_name = 'med_stockin';
    
    public function addNewScockin($postdata){
        $medName=$postdata['medName'];
        $dbMedBase=new Medicine_Model_DbTable_MedBase();
        $medInfo=$dbMedBase->getMedByName($medName);
        if(isset($medInfo)){
            $data['med_id']=$medInfo->id;
        }else{
            throw new Exception('没有匹配到当前输入的药材');
        }
        $data['num']=$postdata['inNum'];
        $data['date_time']=$postdata['date'];
        $this->insert($data);
    }
    
    public function getStockinList(){
        $db=$this->_db;
        $selecter=$db->select()->from(array('a'=>$this->_name),array('num','date_time'))
                     ->joinLeft(array('b'=>'med_base'),"a.med_id=b.id",array('med_name','med_price','med_unit'));
        $res=$db->fetchAll($selecter);
        return $res;
    }
    
    public function getStockinSum($id){
        $db=$this->_db;
        $selecter=$db->select()->from($this->_name,array('sum(num) as allStockin'))->where("med_id='".$id."'");
        $res=$db->fetchRow($selecter);
        return $res;
    }


}

