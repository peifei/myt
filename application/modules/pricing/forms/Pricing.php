<?php

class Pricing_Form_Pricing extends Application_Form_MyForm
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
        $dbDocs=new Admin_Model_DbTable_Docs();
        $docList=$dbDocs->getDocsList();
        $docArr=array();
        $docArr['']='';
        foreach($docList as $docinfo){
            //var_dump($docinfo);
            $docArr[$docinfo->id]=$docinfo->name;
        }
        //var_dump($docList);
        $doc->setMultiOptions($docArr);
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
             ->addValidator('StringLength',true,array(10,10,'utf-8'));
             
        $this->addDisplayGroup(array($name,$sex,$doc,$date),'base');
        $group = $this->getDisplayGroup('base');

        $group->setDecorators(array(
           'FormElements',
           array('HtmlTag', array('tag' => 'div','id'=>'base'))
        ));
        //////////////////////////////////////////////////////////////////////
        
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
       /* $group2=new Zend_Form_DisplayGroup('disp1', new Zend_Loader_PluginLoader());
        $group2->addElements(array($y1,$p1,$m1,$t1));
        $group2->setAttribs(array('class'=>'newest'));*/
/*        $group2->setDecorators(array(
           'FormElements',
           array('HtmlTag', array('tag' => 'div', 'class' => 'myClass'))
        ));*/
        $this->addDisplayGroup(array($y1,$p1,$m1,$t1), 'disp1',array('class'=>'newest'));
        
        $group1 = $this->getDisplayGroup('disp1');

        $group1->setDecorators(array(
           'FormElements',
           array(array('c1'=>'HtmlTag'), array('tag' => 'div', 'class' => 'form-inline newest')),
           array(array('c2'=>'HtmlTag'), array('tag' => 'div', 'id'=>'pri'))
        ));
        
        $addNew=new Zend_Form_Element_Button('addNew');
        $addNew->setLabel("添加一行")->setAttribs(array('class'=>'btn btn-primary btn-sm','onclick'=>'addNewLine()'));
        $this->setInlineBtn($addNew);
        $smtBtn=new Zend_Form_Element_Button('smtBtn');
        $smtBtn->setLabel("提交")->setAttribs(array('class'=>'btn btn-primary btn-sm','onclick'=>'smtform()'));
        $this->setInlineBtn($smtBtn);
        $num=new Zend_Form_Element_Text('num');
        $num->setRequired(true)
            ->addFilter('StringTrim')
            ->addFilter('StripTags')
            ->addValidator('NotEmpty',true)
            ->addValidator('Int',true)
            ->addValidator('StringLength',true,array(1,3,'utf-8'));
        $num->setAttribs(array('class'=>'form-control input-sm','placeholder'=>'计数（默认为1）'));
        $this->setInlineDecorator($num);
        $sum=new Zend_Form_Element_Text('sum');
        $sum->setRequired(true)
            ->addFilter('StringTrim')
            ->addFilter('StripTags')
            ->addValidator('NotEmpty',true)
            ->addValidator('Float',true)
            ->addValidator('StringLength',true,array(1,9,'utf-8'));
        $sum->setAttribs(array('class'=>'form-control input-sm','placeholder'=>'合计'));
        $this->setInlineDecorator($sum);
        $this->addDisplayGroup(array($addNew,$smtBtn,$num,$sum),'pricing');
        
        $group2 = $this->getDisplayGroup('pricing');

        $group2->setDecorators(array(
           'FormElements',
           array('HtmlTag', array('tag' => 'div', 'class' => 'form-inline'))
        ));
             
        //$this->addElements(array($name,$sex,$doc,$date));
       
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

