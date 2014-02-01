<?php

class Application_Form_MyForm extends Zend_Form
{

    protected function setTextDecorator($element){
        $element->setDecorators(array('ViewHelper',
                                      array(array('c1'=>'HtmlTag'),
                                      array('tag'=>'div','class'=>'col-sm-9')),
                                      'Errors',
                                      'Description',
                                      array('Label',array('class'=>'col-sm-3 control-label')),
                                      array('HtmlTag',array('tag'=>'div','class'=>'form-group'))
                                      )
                                );
    }
    
    protected function setSmtBtn($element){
        $element->setDecorators(array('viewHelper',
                                     array('HtmlTag',array('tag'=>'div','class'=>'col-sm-offset-3 col-sm-9')),
                                     array(array('c1'=>'HtmlTag'),array('tag'=>'div','class'=>'form-group'))
                                     )
                               );
    }


}

