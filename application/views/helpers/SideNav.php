<?php
class Application_View_Helper_SideNav
{
    public function sideNav(){
        $frontCtrl=Zend_Controller_Front::getInstance();
        $moduleName=$frontCtrl->getRequest()->getModuleName();
        return $moduleName.'_sidenav.phtml';
    }
}
?>