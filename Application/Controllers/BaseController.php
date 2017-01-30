<?php
abstract class BaseController extends Controller
{
    protected function GetSideBar()
    {
        return $this->GetAdminSidebar();
    }

    protected function GetAdminSidebar()
    {
        $result = array();

        $result[] = array(
            'Title' => 'Pages',
            'Link' => '/Page',
            'Children' => array()
        );

        $result[] = array(
            'Title' => 'Options',
            'Link' => '/Pageoption',
            'Children' => array()
        );

        return $result;
    }
}