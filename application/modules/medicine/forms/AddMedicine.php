<?php

class Medicine_Form_AddMedicine extends Application_Form_MyForm
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal col-sm-10');
        $medName=new Zend_Form_Element_Text('medName');
        $medName->setLabel('请输入药材名称');
        $medName->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('StringLength',true,array(1,20,'utf-8'))
                ->setAttrib('class', 'form-control');
        $this->setTextDecorator($medName);
        
        $medPrice=new Zend_Form_Element_Text('medPrice');
        $medPrice->setLabel('请输入价格');
        $medPrice->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty',true)
                ->addValidator('Float',true)
                ->addValidator('StringLength',true,array(1,9,'utf-8'))
                ->setAttrib('class', 'form-control');
        $this->setTextDecorator($medPrice);
                
        $medUnit=new Zend_Form_Element_Text('medUnit');
        $medUnit->setLabel('请输入计量单位');
        $medUnit->setValue('克');
        $medUnit->setRequired(true)
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('NotEmpty')
                ->addValidator('StringLength',true,array(1,5,'utf-8'))
                ->setAttrib('class', 'form-control');
        $this->setTextDecorator($medUnit);

        $smtBtn=new Zend_Form_Element_Submit('smtBtn');
        $smtBtn->setLabel('提交');
        $smtBtn->setAttrib('class','btn btn-primary col-sm-4');
        $this->setSmtBtn($smtBtn);
        
        
        $this->addElements(array($medName,$medUnit,$medPrice,$smtBtn));
    }
    
    public function prepareForUpdate($id){
        $dbMedBase=new Medicine_Model_DbTable_MedBase();
        $medBase=$dbMedBase->getMedById($id);
        $eMedName=$this->getElement('medName');
        $eMedName->setValue($medBase->med_name);
        $eMedPrice=$this->getElement('medPrice');
        $eMedPrice->setValue($medBase->med_price);
        $eMedUnit=$this->getElement('medUnit');
        $eMedUnit->setValue($medBase->med_unit);
        $id=new Zend_Form_Element_Hidden('id');
        $id->setValue($medBase->id);
        $this->addElement($id);
    }
    


}

