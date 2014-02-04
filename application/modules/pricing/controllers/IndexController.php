<?php

class Pricing_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form=new Pricing_Form_Pricing();
        $this->view->form=$form;
    }
    public function addAction(){
        
    }
    public function editAction(){
        
    }


}

