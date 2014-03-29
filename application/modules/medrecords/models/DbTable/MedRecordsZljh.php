<?php

class Medrecords_Model_DbTable_MedRecordsZljh extends Zend_Db_Table_Abstract
{

    protected $_name = 'med_records_zljh';

    public function addNewZljh($rid,$zljh){
        $data=array();
        $data['records_id']=$rid;
        $data['zljh']=$zljh;
        $data['date']=new Zend_Db_Expr('now()');
        $this->insert($data);
    }
    
    public function getZljhByRecordsId($rid){
        $res=$this->fetchAll("records_id='".$rid."'",'date asc');
        return $res;
    }
    public function getZljhById($id){
        $res=$this->fetchRow("id='".$id."'");
        return $res;
    }
    
    public function updateZljh($postData){
        $data['zljh']=$postData['zljh'];
        $this->update($data, "id='".$postData['id']."'");
    }
}

