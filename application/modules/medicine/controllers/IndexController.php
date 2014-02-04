<?php

class Medicine_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $flashMsg=$this->_helper->flashMessenger->getMessages();
        if(isset($flashMsg[0])){
            $arrMsg=explode('|',$flashMsg[0]);
            $this->view->msgType=$arrMsg[0];
            $this->view->fbmsg=$arrMsg[1];
        }
        $dbMedBase=new Medicine_Model_DbTable_MedBase();
        $medsList=$dbMedBase->getMedsList();
        $this->view->medsList=$medsList;
    }


}

