<?php

class Application_Form_Searchbox extends Application_Form_MyForm
{

    public function init()
    {
        $this->setAttrib('class', 'form-inline');
        $schStr=new Zend_Form_Element_Text('schStr');
        $schStr->setRequired(true)
               ->addFilter("StripTags")
               ->addFilter("StringTrim")
               ->addValidator('NotEmpty')
               ->addValidator("StringLength",true,array(1,20,'utf-8'));
        $schStr->setAttribs(array('class'=>'form-control','placeholder'=>'患者姓名'));
        $this->setInlineDecorator($schStr);
        
        $smtBtn=new Zend_Form_Element_Submit('smtBtn');
        $smtBtn->setLabel('搜索');
        $smtBtn->setAttrib('class','btn btn-primary');
        $this->setInlineBtn($smtBtn);
        
        $this->addElements(array($schStr,$smtBtn));
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
                                     array(array('c1'=>'HtmlTag'),array('tag'=>'div','class'=>'form-group'))
                                     )
                               );
    }
}

