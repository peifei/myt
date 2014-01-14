<?php

class Application_Model_DbTable_MedType extends Zend_Db_Table_Abstract
{

    protected $_name = 'med_type_base';

    public function addNewType($medName){
        $this->insert(array('med_name'=>$medName));
    }
    
    public function updtaeType($medName,$id){
        $this->update(array('med_name'=>$medName),"id='".$id."'");
    }
    
    public function getMedsList(){
        $res=$this->fetchAll();
        return $res;
    }

}

