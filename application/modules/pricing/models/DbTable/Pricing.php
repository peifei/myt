<?php

class Pricing_Model_DbTable_Pricing extends Zend_Db_Table_Abstract
{

    protected $_name = 'pricing_main';
    const SEXMAN=0;
    const SEXWOMAN=1;
    
    public function addNewPricing($data){
        echo count($data);
        $temp=$this->formateData($data);
        $db=Zend_Db_Table::getDefaultAdapter();
        $db->beginTransaction();
        try{
            $resId=$this->insert($temp['main']);
            $dbPricingMed=new Pricing_Model_DbTable_PricingMed();
            foreach ($temp['med'] as $datamed){
                $datamed['main_id']=$resId;
                $dbPricingMed->addNewPricingMed($datamed);
            }
            $db->commit();
        }catch (Exception $e){
            $db->rollBack();
            throw $e;
        }
        //var_dump($temp);
    }
    
    public function getPricingListByDate($date){
        $res=$this->fetchAll("date='".$date."'");
        return $res;
    }
    
    public function getPricingInfoById($id){
        $res=$this->fetchRow("id='".$id."'");
        return $res;
    }
    
    private function formateData($data){
        $datamain['name']=$data['name'];
        if(self::SEXMAN==$data['sex']){
            $datamain['sex']='男';
        }elseif(self::SEXWOMAN==$data['sex']){
            $datamain['sex']='女';
        }else{
            throw new Exception('性别选择有误');
        }
        $dbDocs=new Admin_Model_DbTable_Docs();
        $res=$dbDocs->getDocsInfo($data['doc']);
        if(isset($res)){
            $datamain['doc_name']=$res->name;
        }else{
            throw new Excepiton('医师选择有误');
        }
        $datamain['date']=$data['date'];
        $datamain['num']=$data['num'];
        $datamain['sum']=$data['sum'];

        $num=count($data)-6;
        $datamed=array();
        for($i=1;$i*4<=$num;$i++){
           $res=$this->formatePriceData($data,$i);
           if(is_array($res)){
               $datamed[]=$res;
           }
        }
        if(count($datamed)==0){
            throw new Exception('至少需要一项药材记录');
        }
        
        
        
        return array('main'=>$datamain,'med'=>$datamed);
        
        
        
    }
    
    private function formatePriceData($data,$i){
        $y=$data['y'.$i];
        $p=$data['p'.$i];
        $m=$data['m'.$i];
        $t=$data['t'.$i];
        if(''==$y&&''==$p&&''==$m&&''==$t){
            return null;
        }
        if(''!=$y&&''!=$p&&''!=$m&&''!=$t){
            if(is_numeric($p)&&is_numeric($m)&&is_numeric($t)){
                return array('y'=>$y,'p'=>$p,'m'=>$m,'t'=>$t);
            }else{
                throw new Exception('价格数量等必须为数字，请重新提交');
            }
        }else{
            throw new Exception('提交的 数据有空值，请重新提交');
        }
    }


}

