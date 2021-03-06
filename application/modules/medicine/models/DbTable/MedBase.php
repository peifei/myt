<?php

class Medicine_Model_DbTable_MedBase extends Zend_Db_Table_Abstract
{

    protected $_name = 'med_base';
    /**
     * 添加新的药材品种
     * @param unknown_type $postData
     */
    public function addNewMed($postData){
        $data['med_name']=$postData['medName'];
        $data['med_unit']=$postData['medUnit'];
        $data['med_price']=$postData['medPrice'];
        $this->insert($data);
    }
    /**
     * 取得药材品种列表
     * Enter description here ...
     */
    public function getMedsList($limit=null){
        if(null!=$limit){
            $res=$this->fetchAll(true,'priority desc',$limit);
        }else{
            $res=$this->fetchAll();
        }
        return $res;
    }
    /**
     * 根据id取得药材信息
     * @param unknown_type $id
     */
    public function getMedById($id){
        $res=$this->fetchRow("id ='".$id."'");
        return $res;
    }
    /**
     * 根据名字取得药材信息
     * @param unknown_type $medName
     */
    public function getMedByName($medName){
        $res=$this->fetchRow("med_name ='".$medName."'");
        return $res;
    }
    
    public function updateMed($postData){
        $data['med_name']=$postData['medName'];
        $data['med_unit']=$postData['medUnit'];
        $data['med_price']=$postData['medPrice'];
        $this->update($data,"id ='".$postData['id']."'");
    }


}

