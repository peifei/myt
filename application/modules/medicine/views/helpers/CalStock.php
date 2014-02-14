<?php
class Medicine_View_Helper_CalStock extends Zend_View_Helper_Abstract
{
    public function calStock($medId){
        $dbMedStockin=new Medicine_Model_DbTable_MedStockin();
        $resStockin=$dbMedStockin->getStockinSum($medId);
        
        $dbPricingMed=new Pricing_Model_DbTable_PricingMed();
        $resPricingMed=$dbPricingMed->getMedSum($medId);
        
        return $resStockin['allStockin']-$resPricingMed['allPricing'];
    }
}
?>