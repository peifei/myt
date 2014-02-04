<?php

class Pricing_Form_Pricing extends Zend_Form
{

    public function init()
    {
        $this->setAttribs(array('class'=>'form-inline'));
        $name=new Zend_Form_Element_Text('name');
        $name->setAttribs(array('class'=>'form-control','placeholder'=>'请输入顾客姓名'));
        $this->setInlineDecorator($name);
        $sex=new Zend_Form_Element_Radio('sex');
        $sex->setMultiOptions(array('0'=>'男','1'=>'女'));
        $sex->setSeparator('&nbsp;');
        $sex->setAttribs(array('class'=>'form-control'));
        $this->setInlineDecorator($sex);
        $doc=new Zend_Form_Element_Select('doc');
        $doc->setMultiOptions(array('0'=>'请选择医师','1'=>'医师一','2'=>'医师二','3'=>'医师三'));
        $doc->setAttribs(array('class'=>'form-control'));
        $this->setInlineDecorator($doc);
        $hr=new Zend_Form_Element('hr');
        $hr->setDecorators(array(array('HtmlTag',array('tag'=>'hr'))));
        $y1=new Zend_Form_Element_Text('y1');
        $y1->setAttribs(array('class'=>'form-control input-sm yy','placeholder'=>'药材名'));
        $this->setInlineDecorator($y1);
        $m1=new Zend_Form_Element_Text('m1');
        $m1->setAttribs(array('class'=>'form-control input-sm mm','placeholder'=>'剂量'));
        $this->setInlineDecorator($m1);
        $p1=new Zend_Form_Element_Text('p1');
        $p1->setAttribs(array('class'=>'form-control input-sm pp','placeholder'=>'单价'));
        $this->setInlineDecorator($p1);
        $t1=new Zend_Form_Element_Text('t1');
        $t1->setAttribs(array('class'=>'form-control input-sm tt','placeholder'=>'小计'));
        $this->setInlineDecorator($t1);
        $this->addElements(array($name,$sex,$doc,$hr));
        $this->addDisplayGroup(array($y1,$p1,$m1,$t1), 'disp1',array('class'=>'newest'));
        $sum=new Zend_Form_Element_Text('sum');
        $sum->setLabel('zj');
        $this->addElement($sum);
    }
    
    private function setInlineDecorator($element){
        $element->setDecorators(array('ViewHelper',
                                      'Errors',
                                      'Description',
                                      'Label',
                                      array('HtmlTag',array('tag'=>'div','class'=>'form-group'))
                                      )
                                );
    }


}

