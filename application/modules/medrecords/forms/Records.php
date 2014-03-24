<?php

class Medrecords_Form_Records extends Application_Form_MyForm
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal col-sm-8');
        
        $name=new Zend_Form_Element_Text('name');
        $name->setLabel('患者：');
        $name->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,20,'utf-8'))
                ->setAttribs(array('class'=>'form-control','placeholder'=>'不多于20字'));
        $this->setTextDecorator($name);
        
        $zs=new Zend_Form_Element_Textarea('zs');
        $zs->setLabel('主诉：');
        $zs->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,50,'utf-8'))
                ->setAttribs(array('class'=>'form-control','rows'=>3,'placeholder'=>'不多于50字'));
        $this->setTextDecorator($zs);
        
        $xbs=new Zend_Form_Element_Textarea('xbs');
        $xbs->setLabel('现病史：');
        $xbs->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,50,'utf-8'))
                ->setAttribs(array('class'=>'form-control','rows'=>3,'placeholder'=>'不多于50字'));
        $this->setTextDecorator($xbs);
        
        $zyzd=new Zend_Form_Element_Textarea('zyzd');
        $zyzd->setLabel('中医诊断：');
        $zyzd->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,50,'utf-8'))
                ->setAttribs(array('class'=>'form-control','rows'=>3,'placeholder'=>'不多于50字'));
        $this->setTextDecorator($zyzd);
        
        $zljh=new Zend_Form_Element_Textarea('zljh');
        $zljh->setLabel('治疗计划：');
        $zljh->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,200,'utf-8'))
                ->setAttribs(array('class'=>'form-control','rows'=>8,'placeholder'=>'不多于200字'));
        $this->setTextDecorator($zljh);
        
        $smtBtn=new Zend_Form_Element_Submit('smtBtn');
        $smtBtn->setLabel('提交');
        $smtBtn->setAttrib('class','btn btn-primary col-sm-4');
        $this->setSmtBtn($smtBtn);
        
        
        $this->addElements(array($name,$zs,$xbs,$zyzd,$zljh,$smtBtn));
    }


}

