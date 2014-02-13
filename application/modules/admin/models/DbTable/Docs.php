<?php

class Admin_Model_DbTable_Docs extends Zend_Db_Table_Abstract
{

    protected $_name = 'docs';

    public function addNew($postdata){
        $data['name']=$postdata['name'];
        $this->insert($data);
    }
    
    public function getDocsList(){
        $res=$this->fetchAll();
        return $res;
    }
    public function getDocsInfo($id){
        $res=$this->fetchRow("id='".$id."'");
        return $res;
    }
    
    public function deleteDoc($id){
        $this->delete("id='".$id."'");
    }
    public function updateDoc($postdata){
        $data['name']=$postdata['name'];
        $this->update($data, "id='".$postdata['id']."'");
    }

}

