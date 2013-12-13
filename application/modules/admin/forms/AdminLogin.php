<?php

class Admin_Form_AdminLogin extends Zend_Form
{

    public function init()
    {
        $loginName=new Zend_Form_Element_Text('loginName');
        $loginName->setRequired(true)
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim')
                  ->addValidator('NotEmpty')
                  ->addValidator('StringLength',true,array(0,10,'utf-8'));
        $loginPwd=new Zend_Form_Element_Password('lginPwd');
        $loginPwd->setRequired(true)
                 ->addFilter('StripTags')
                 ->addFilter('StringTrim')
                 ->addValidator('NotEmpty')
                 ->addValidator('StringLength',true,array(0,10,'utf-8'));
        $smtBtn=new Zend_Form_Element_Submit('smtBtn');
        $this->addElements(array($loginName,$loginPwd,$smtBtn));
    }


}

