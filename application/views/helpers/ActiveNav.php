<?php
class Application_View_Helper_ActiveNav extends Zend_View_Helper_Abstract
{
    public function ActiveNav($mName,$cName=null,$aName=null){
        $frontCtrl=Zend_Controller_Front::getInstance();
        $moduleName=$frontCtrl->getRequest()->getModuleName();
        $controllerName=$frontCtrl->getRequest()->getControllerName();
        $actionName=$frontCtrl->getRequest()->getActionName();
        $str=' class="active"';
        if(is_null($cName)){
            $cName='index';
        }
        if(is_null($aName)){
            $aName='index';
        }
        
        if($mName==$moduleName&&$controllerName==$cName&&$actionName==$aName){
            return $str;
        }
        
    }
}
?>