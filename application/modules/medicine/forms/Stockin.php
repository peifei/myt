<?php

class Medicine_Form_Stockin extends Application_Form_MyForm
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setAttrib('class', 'form-horizontal col-sm-10');
        $medName=new Zend_Form_Element_Text('medName');
        $medName->setLabel('请选择药材');
        $medName->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,20,'utf-8'));
        $medName->setAttribs(array('class'=>'form-control'));
        $this->setTextDecorator($medName);
        
        $inNum=new Zend_Form_Element_Text('inNum');
        $inNum->setLabel('数据入库数量');
        $inNum->setRequired(true)
              ->addFilter('StringTrim')
              ->addFilter('StripTags')
              ->addValidator('NotEmpty',true)
              ->addValidator('StringLength',true,array(1,20,'utf-8'));
        $inNum->setAttribs(array('class'=>'form-control'));
        $this->setTextDecorator($inNum);
        
        $date=new Zend_Form_Element_Text('date');
        $date->setLabel('请选择日期');
        $date->setRequired(true)
              ->addFilter('StringTrim')
              ->addFilter('StripTags')
              ->addValidator('NotEmpty',true)
              ->addValidator('StringLength',true,array(10,10,'utf-8'));
        $date->setAttribs(array('class'=>'form-control'));
        $dateTime=new Zend_Date();
        $date->setValue($dateTime->toString('yyyy-MM-dd'));
        $this->setTextDecorator($date);
        
        $smtBtn=new Zend_Form_Element_Submit('smtBtn');
        $smtBtn->setLabel('提交')
               ->setAttribs(array('class'=>'btn btn-primary col-sm-3'));
        $this->setSmtBtn($smtBtn);
        
        $this->addElements(array($medName,$inNum,$date,$smtBtn));
        
    }
    



}

