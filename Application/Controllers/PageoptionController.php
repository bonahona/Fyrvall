<?php
require_once('BaseController.php');
class PageoptionController extends BaseController
{

    public function BeforeAction()
    {
        parent::BeforeAction();
        $this->Set('Sidebar', $this->GetSideBar());
    }

    public function Index()
    {
        $this->Title = 'Options';

        $pageOptions = $this->Models->PageOption->All();
        $this->Set('PageOptions', $pageOptions);

        return $this->View();
    }

    public function Edit($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageOption = $this->Models->PageOption->Find($id);
        if($pageOption == null){
            return $pageOption;
        }

        if($this->IsPost() && ! $this->Data->IsEmpty()){
            $pageOption = $this->Data->DbParse('PageOption', $this->Models->PageOption);
            $pageOption->save();

            return $this->Redirect('/Pageoption/');
        }else{
            $this->Set('PageOption', $pageOption);
            return $this->View();
        }
    }
}