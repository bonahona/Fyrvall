<?php
abstract class BaseController extends Controller
{
    protected function GetSideBar()
    {
        if($this->IsLoggedIn()){
            return $this->GetAdminSidebar();
        }  else{
            return $this->GetPagesHierarchi();
        }
    }

    protected function GetAdminSidebar()
    {
        $result = array();

        $result[] = array(
            'Title' => 'Pages',
            'Link' => 'Page',
            'Children' => array()
        );

        return $result;
    }

    protected function GetPagesHierarchi()
    {
        $pages = $this->Models->Page->Where(array('IsActive' => 1, 'IsDeleted' => 0));
        $rootPages = $this->GetRootPages($pages);

        $associativeArray = array();
        foreach($pages as $page){
            $associativeArray[$page->Id] = $page;
        }

        foreach($associativeArray as $page){
            if($page->ParentPageId != null && $page->ParentPageId != 0){
                $associativeArray[$page->ParentPageId]->Pages->Add($page);
            }
        }

        return $rootPages;
    }

    protected function GetRootPages($pages)
    {
        $result = array();

        foreach($pages as $page){
            if($page->ParentPageId == null || $page->ParentPageId == 0){
                $result[$page->Id] = $page;
            }
        }

        return $result;
    }
}