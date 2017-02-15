<?php
class Page extends Model
{
    public $TableName = 'page';

    public function GetPath()
    {
        $rootLink = '/pages';

        if($this->ParentPage == null){
            return $rootLink . '/' . $this->NavigationTitle;
        }else{
            $pages = array_reverse($this->GetParentFolders($this));

            $result = $rootLink;
            foreach($pages as $page){
                $result .= '/' . $page->NavigationTitle;
            }

            return $result;
        }
    }

    private function GetParentFolders($page)
    {
        $currentPage = $page;

        $result = array();
        while($currentPage != null){
            $result[] = $currentPage;

            $currentPage = $currentPage->ParentPage;
        }

        return $result;
    }
}