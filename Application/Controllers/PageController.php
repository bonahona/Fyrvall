<?php
require_once('BaseController.php');
class PageController extends BaseController
{
    public function BeforeAction()
    {
        $this->Set('Sidebar', $this->GetSideBar());
    }

    public function Index()
    {
        $this->Title = 'Pages';

        $pages = $this->Models->Page->Where(array('IsDeleted' => 0));
        $this->Set('Pages', $pages);

        return $this->View();
    }

    public function Create()
    {
        $this->Title = 'Create page';

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $page = $this->Data->Parse('Page', $this->Models->Page);
            $page->CreateDate = date('Y-m-d h:i:s');
            $page->CreatedByUserId = $this->GetCurrentUser()['Id'];

            if($this->ModelValidation->Valid()) {
                $page->Save();
                return $this->Redirect('/Page');
            }else{
                $this->Set('Page', $page);
                $pages = $this->Models->Page->Where(array('IsDeleted' => 0));
                $this->Set('Pages', $pages);
                return $this->View();
            }

        }else{
            $pages = $this->Models->Page->Where(array('IsDeleted' => '0'));
            $this->Set('Pages', $pages);

            $page = $this->Models->Page->Create();
            $this->Set('Page', $page);

            return $this->View();
        }
    }

    public function Edit($id = 0)
    {
        $this->Title = 'Edit page';
        
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $page = $this->Models->Page->Find($id);
        if($page == null){
            return $this->HttpNotFound();
        }
        
        if($this->IsPost() && !$this->Data->IsEmpty()){
            $page = $this->Data->DbParse('Page', $this->Models->Page);

            if($this->ModelValidation->Valid()){
                $page->Save();
                return $this->Redirect('/Page');
            }
        }

        $this->Set('Page', $page);
        $pages = $this->Models->Page->Where(array('IsDeleted' => 0));
        $this->Set('Pages', $pages);

        return $this->View();
    }

    public function Content($id = null)
    {
        $this->Title = 'Edit page content';

        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $page = $this->Models->Page->Find($id);
        if($page == null){
            return $this->HttpNotFound();
        }

        $this->Set('Page', $page);
        return $this->View();
    }
}