<?php

class Pricing_Form_PricingBase extends Application_Form_MyForm
{

    public function init()
    {
        $name=new Zend_Form_Element_Text('name');
        $name->setRequired(true)
             ->addFilter('StringTrim')
             ->addFilter('StripTags')
             ->addValidator('NotEmpty',true)
             ->addValidator('StringLength',true,array(1,5,'utf-8'));
        $name->setAttribs(array('class'=>'form-control'));
        $name->setLabel('请输入客户姓名：');
        $sex=new Zend_Form_Element_Radio('sex');
        $sex->setRequired(true);
        $sex->setMultiOptions(array('0'=>'男','1'=>'女'));
        $sex->setSeparator('&nbsp;');
        $sex->setLabel('请选择客户性别：');
        $this->setInlineDecorator($sex);
        $doc=new Zend_Form_Element_Select('doc');
        $doc->setRequired(true);
        $doc->setMultiOptions(array('0'=>'','1'=>'医师一','2'=>'医师二','3'=>'医师三'));
        $doc->setAttribs(array('class'=>'form-control'));
        $doc->setLabel('请选择出诊医师：');
        $date=new Zend_Form_Element_Text('date');
        $date->setAttribs(array('class'=>'form-control'));
        $date->setLabel('日期：');
        $dateValue=new Zend_Date();
        $date->setValue($dateValue->toString('yyyy-MM-dd'));
        $date->setRequired(true)
             ->addFilter('StringTrim')
             ->addFilter('StripTags')
             ->addValidator('NotEmpty',true)
             ->addValidator('StringLength',true,array(10,10,'utf-8'));;
        $this->addElements(array($name,$sex,$doc,$date));
       
    }
    
    private function setInlineDecorator($element){
        $element->setDecorators(array('ViewHelper',
                                      'Errors',
                                      'Description',
                                      'Label',
                                      array('HtmlTag',array('tag'=>'div','class'=>'form-group-sex'))
                                      )
                                );
    }
    



}

