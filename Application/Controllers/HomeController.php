<?php
require_once('BaseController.php');
class HomeController extends BaseController
{
    public function BeforeAction()
    {
        $this->SetLinks();
    }

    public function Index()
    {
        $this->Title = "Index";
        return $this->View();

    }
}