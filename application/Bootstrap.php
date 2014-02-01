<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * 初始化模块路径
     * Enter description here ...
     */
    public function _initModulesFrontController(){
		$front=Zend_Controller_Front::getInstance();
		$front->setControllerDirectory(array(
			'default'=>'../application/controllers',
		    'admin'=>'../application/modules/admin',
		    'pricing'=>'../application/modules/pricing',
		    'medicine'=>'../application/modules/medicine'
		));
	}

}

