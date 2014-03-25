<?php

class Medrecords_ViewController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $id=$this->getRequest()->getParam('id');
        if(preg_match("/^\d+$/",$id)){
            
        }else{
            echo 'id error';
            // TODO error deal
        }
    }


}

