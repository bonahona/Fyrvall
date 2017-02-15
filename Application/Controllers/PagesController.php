<?php
require_once('BaseController.php');
class PagesController extends BaseController
{
    public function BeforeAction()
    {
        $pageHierarchi = $this->GetRootPages();

        if($this->IsLoggedIn()){
            foreach($this->GetAdminSidebar() as $adminLink){
                $pageHierarchi->Add($adminLink);
            }
        }

        $this->Set('Sidebar', $pageHierarchi);
    }

    private function GetRootPages()
    {
        return $this->Models->Page->Where(array('IsActive' => 1, 'IsDeleted' => 0, 'ShowInMenu' => 1, 'ParentPageId' => null));
    }


    public function Index()
    {
        $this->Title = 'Fyrvall.com';

        $startId = $this->Models->PageOption->Where(array('Identifier' => 'StartPage'))->First();

        $page = $this->Models->Page->Find($startId->Value);
        $this->Set('Page', $page);
        return $this->View('Page');
    }

    public function NotFound()
    {
        $this->Title = 'Fyrvall.com - Not Found';
        return $this->View();
    }

    public function Page()
    {
        $page = $this->FindPage($this->Parameters);

        if($page == null){
            return $this->HttpNotFound();
        }

        $this->Title = 'Fyrvall.com - ' . $page->PageTitle;
        $this->Set('Page', $page);
        return $this->View();
    }

    private function FindPage($path)
    {
        if(count($path) == 0){
            return null;
        }

        $currentPage = $this->Models->Page->Where(array('NavigationTitle' => $path[0], 'IsActive' => 1, 'IsDeleted' => 0, 'ParentPageId' => null))->First();
        $remainingPath = array_slice($path, 1, count($path) -1);
        if($currentPage == null){
            return null;
        }

        foreach($remainingPath as $pathPart){
            $currentPage = $this->Models->Page->Where(array('NavigationTitle' => $pathPart, 'IsActive' => 1, 'IsDeleted' => 0, 'ParentPageId' => $currentPage->Id))->First();
            if($currentPage == null){
                return null;
            }
        }

        return $currentPage;
    }
}