<?php
class Application_View_Helper_SideNav extends Zend_View_Helper_Abstract
{
    public function sideNav(){
        $frontCtrl=Zend_Controller_Front::getInstance();
        $moduleName=$frontCtrl->getRequest()->getModuleName();
        return $moduleName.'_sidenav.phtml';
    }
}
?>