<?php

class Admin_Model_DbTable_Docs extends Zend_Db_Table_Abstract
{

    protected $_name = 'docs';

    public function getDocsList(){
        $res=$this->fetchAll();
        return $res;
    }
    public function getDocsInfo($id){
        $res=$this->fetchRow("id='".$id."'");
        return $res;
    }

}

