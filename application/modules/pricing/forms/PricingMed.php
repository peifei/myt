<?php

class Pricing_Form_PricingMed extends Application_Form_MyForm
{

    public function init()
    {
        $this->setAttribs(array('class'=>'form-inline'));
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
        $this->addDisplayGroup(array($y1,$p1,$m1,$t1), 'disp1',array('class'=>'newest'));
        $addNew=new Zend_Form_Element_Button('addNew');
        $addNew->setLabel("添加一行")->setAttribs(array('class'=>'btn btn-primary btn-sm','onclick'=>'addNewLine()'));
        $this->setInlineBtn($addNew);
        $smtBtn=new Zend_Form_Element_Button('smtBtn');
        $smtBtn->setLabel("提交")->setAttribs(array('class'=>'btn btn-primary btn-sm','onclick'=>'smtform()'));
        $this->setInlineBtn($smtBtn);
        $num=new Zend_Form_Element_Text('num');
        $num->setAttribs(array('class'=>'form-control input-sm','placeholder'=>'计数（默认为1）'));
        $this->setInlineDecorator($num);
        $sum=new Zend_Form_Element_Text('sum');
        $sum->setAttribs(array('class'=>'form-control input-sm','placeholder'=>'合计'));
        $this->setInlineDecorator($sum);
        $this->addElements(array($addNew,$smtBtn,$num,$sum));
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
    
    protected function setInlineBtn($element){
        $element->setDecorators(array('viewHelper',
                                     //array('HtmlTag',array('tag'=>'div','class'=>'col-sm-offset-3 col-sm-9')),
                                     array(array('c1'=>'HtmlTag'),array('tag'=>'div','class'=>'form-group'))
                                     )
                               );
    }


}

