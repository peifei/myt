<?php

class Medrecords_Model_DbTable_MedRecords extends Zend_Db_Table_Abstract
{

    protected $_name = 'med_records';

    public function addNewMedRecords($postData){
        $data=array();
        $data['name']=$postData['name'];
        $data['zs']=$postData['zs'];
        $data['xbs']=$postData['xbs'];
        $data['zyzd']=$postData['zyzd'];
        $data['zljh']=$postData['zljh'];
        $data['date']=new Zend_Db_Expr("now()");
        $this->insert($data);
    }
    
    public function getMedRecordsById($id){
        $res=$this->fetchRow("id='".$id."'");
        return $res;
    }
    
    public function updateElement($postData){
        $data[$postData['ename']]=$postData[$postData['ename']];
        $this->update($data,"id='".$postData['id']."'");
        var_dump($data);
    }
}

