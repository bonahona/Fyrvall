<?php
require_once('BaseController.php');
class PagesegmentController extends BaseController
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/admin', array('ref' => $this->RequestUri));
        }

        $this->Set('Sidebar', $this->GetSideBar());
    }

    public function Create($pageId = null)
    {
        if($pageId == 0 || $pageId == null){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Create(array('PageId' => $pageId));
        $pageSegment->Save();

        return $this->Redirect('/Page/Content/' . $pageId);
    }

    public function Edit($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Find($id);
        if($pageSegment == null){
            return $this->HttpNotFound();
        }

        $this->Title = 'Edit segment content';

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $pageSegment = $this->Data->DbParse('PageSegment', $this->Models->PageSegment);
            $pageSegment->Save();

            return $this->Redirect('/Page/Content/' . $pageSegment->Page->Id);
        }else{
            $this->Set('PageSegment', $pageSegment);
            return $this->View();
        }
    }

    public function SetActive($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Find($id);
        if($pageSegment == null){
            return $this->HttpNotFound();
        }

        $pageSegment->IsActive = 1;
        $pageSegment->Save();

        return $this->Redirect('/Page/Content/' . $pageSegment->Page->Id);
    }

    public function SetInactive($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Find($id);
        if($pageSegment == null){
            return $this->HttpNotFound();
        }

        $pageSegment->IsActive = 0;
        $pageSegment->Save();

        return $this->Redirect('/Page/Content/' . $pageSegment->Page->Id);
    }

    public function MoveUp($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Find($id);
        if($pageSegment == null){
            return $this->HttpNotFound();
        }

        //$page
    }
}