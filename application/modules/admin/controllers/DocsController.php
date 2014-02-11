<?php

class Admin_DocsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $dbDocs=new Admin_Model_DbTable_Docs();
        $docList=$dbDocs->getDocsList();
        $this->view->docList=$docList;
    }


}

