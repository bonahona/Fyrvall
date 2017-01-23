<?php
class Page extends Model
{
    public $TableName = 'page';

    public function GetPath()
    {
        $rootLink = '/pages/';

        if($this->ParentPage == null){
            return $rootLink . $this->NavigationTitle;
        }
    }
}