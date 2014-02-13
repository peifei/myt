<?php
class Medicine_View_Helper_CalStock extends Zend_View_Helper_Abstract
{
    public function calStock($medId){
        $dbMedStockin=new Medicine_Model_DbTable_MedStockin();
        $res=$dbMedStockin->getStockinSum($medId);
        return $res['allStockin'];
    }
}
?>