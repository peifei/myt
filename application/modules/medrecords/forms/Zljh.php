<?php

class Medrecords_Form_Zljh extends Application_Form_MyForm
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal col-sm-8');
        
        $zljh=new Zend_Form_Element_Textarea('zljh');
        $zljh->setLabel('新增治疗计划');
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
        
        $this->addElements(array($zljh,$smtBtn));
    }

    public function prepareForUpdate($id){
        $this->setAction(SITE_BASE_URL.'medrecords/index/showzljh');
        $this->setAttrib('class', 'form-horizontal col-sm-12');
        $dbMedZljh=new Medrecords_Model_DbTable_MedRecordsZljh();
        $zljh=$dbMedZljh->getZljhById($id);
        $this->getElement('zljh')->setValue($zljh['zljh']);
        $eid=new Zend_Form_Element_Hidden('id');
        $eid->removeDecorator('Label');
        $eid->setValue($id);
        $this->addElement($eid);
    }

}

