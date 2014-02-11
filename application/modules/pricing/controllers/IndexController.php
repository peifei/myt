<?php

class Pricing_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $flashMsg=$this->_helper->flashMessenger->getMessages();
        if(isset($flashMsg[0])){
            $arrMsg=explode('|',$flashMsg[0]);
            $this->view->msgType=$arrMsg[0];
            $this->view->fbmsg=$arrMsg[1];
        }
        $dbMedBase=new Medicine_Model_DbTable_MedBase();
        $medList=$dbMedBase->getMedsList(48);
        $medAllList=$dbMedBase->getMedsList();
        $this->view->medList=$medList;
        $medArrs=array();
        foreach ($medAllList as $medInfo){
            $medArrs[]="\"".$medInfo->med_name."\"";
        }
        $this->view->medStr=implode(',',$medArrs);
        $pricingForm=new Pricing_Form_Pricing();
        $this->view->pricingForm=$pricingForm;
        $dbPricing=new Pricing_Model_DbTable_Pricing();
        $today=new Zend_Date();
        $pricingList=$dbPricing->getPricingListByDate($today->toString('yyyy-MM-dd'));
        $this->view->pricingList=$pricingList;
        $request=$this->getRequest();
        if($request->isPost()){
            if($pricingForm->isValid($request->getPost())){
                try{
                    $postData=$request->getPost();
                    var_dump($postData);
                    $postData['name']=$pricingForm->getValue('name');
                    $postData['date']=$pricingForm->getValue('date');
                    $dbPricing->addNewPricing($postData);
                    $this->redirect(SITE_BASE_URL.'pricing/index/jump');
                }catch (Exception $e){
                    $this->view->fbmsg="alert-danger|".$e->getMessage();
                }
            }
        }
        
        
    }
    public function jumpAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->flashMessenger->addMessage('alert-success|划价记录添加成功');
        $this->redirect(SITE_BASE_URL.'pricing/');
    }
    public function pricingDetailAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $id=$this->getRequest()->getParam('id');
        $dbPricingMain=new Pricing_Model_DbTable_Pricing();
        $pricingMain=$dbPricingMain->getPricingInfoById($id);
        $dbPricingMed=new Pricing_Model_DbTable_PricingMed();
        $pricingMed=$dbPricingMed->getPricingMedByMainId($pricingMain->id);
        $tmpStr="";
        foreach($pricingMed as $medInfo){
            $tmpStr.="<tr><td>".$medInfo['y']."</td><td>".$medInfo['p']."</td><td>".$medInfo['m']."</td><td>".$medInfo['t']."</td></tr>";
        }
        $str="<table class='table table-bordered table-striped'>
        	<tr><td>姓名:</td><td>".$pricingMain->name."</td><td>性别:</td><td>".$pricingMain->sex."</td></tr>
        	<tr><td>出诊医师:</td><td>".$pricingMain->doc_name."</td><td>日期:</td><td>".$pricingMain->date."</td></tr>
        	".$tmpStr."
        	<tr><td>总计数量:</td><td>".$pricingMain->num."</td><td>总计价格:</td><td>".$pricingMain->sum."</td></tr>
        </table>";
        
        echo $str;
    }
    
    public function medinfoAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $medName=$this->getRequest()->getParam('medName');
        $dbMedBase=new Medicine_Model_DbTable_MedBase();
        $medInfo=$dbMedBase->getMedByName($medName);
        echo $medInfo->med_price;
    }



}

