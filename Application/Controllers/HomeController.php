<?php
require_once('BaseController.php');
class HomeController extends BaseController
{
    public function BeforeAction()
    {
        $this->Set('Sidebar', $this->GetSideBar());
    }

    public function Index()
    {
        $this->Title = "Index";
        return $this->View();

    }
}