<?php

class Admin_Form_Doc extends Application_Form_MyForm
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal col-sm-10');
        $name=new Zend_Form_Element_Text('name');
        $name->setLabel('请输入医师姓名');
        $name->setRequired(true)
             ->addFilter('StringTrim')
             ->addFilter('StripTags')
             ->addValidator('NotEmpty',true)
             ->addValidator('StringLength',true, array(1,5,'utf-8'))
             ->setAttribs(array('class'=>'form-control'));
        $this->setTextDecorator($name);
        
        $smtBtn=new Zend_Form_Element_Submit('smtBtn');
        $smtBtn->setLabel('提交');
        $smtBtn->setAttrib('class','btn btn-primary col-sm-4');
        $this->setSmtBtn($smtBtn);
        $this->addElements(array($name,$smtBtn));
    }
    
    public function prepearForUpdate($id){
        $dbDocs=new Admin_Model_DbTable_Docs();
        $docInfo=$dbDocs->getDocsInfo($id);
        if(isset($docInfo)){
            $eName=$this->getElement('name');
            $eName->setValue($docInfo->name);
        }
        $eid=new Zend_Form_Element_Hidden('id');
        $eid->setValue($id);
        $this->addElement($eid);
    }


}

