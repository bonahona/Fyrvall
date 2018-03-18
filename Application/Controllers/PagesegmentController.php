<?php
require_once('BaseController.php');
class PagesegmentController extends BaseController
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/admin', array('ref' => $this->RequestUri));
        }
    }

    public function Create($pageId = null)
    {
        if($pageId == 0 || $pageId == null){
            return $this->HttpNotFound();
        }

        $lastPageSegment = $this->Models->PageSegment->OrderBy('SortOrder')->Last();

        if($lastPageSegment == null){
            $sortOrder = 0;
        }else{
            $sortOrder = $lastPageSegment->SortOrder +1;
        }

        $pageSegment = $this->Models->PageSegment->Create(array('PageId' => $pageId, 'SortOrder' => $sortOrder));
        $pageSegment->Save();

        return $this->Redirect('/Page/Content/' . $pageId);
    }

    public function Edit($id = null)
    {
        $this->EnqueueCssFiles([
            'bootstrap-wysihtml5-0.0.2.css',
            'bootstrap.min.css',
            'dashboard.css',
            'font-awesome.css'
        ]);

        $this->EnqueueJavascript([
            'bootstrap.min.js',
            'bootstrap-wysiwyg.js',
            'editor.js'
        ]);

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

        $page = $pageSegment->Page;
        $pageSegments = $page->PageSegments->OrderBy('SortOrder');

        $currentIndex = 0;
        $previousPage = null;
        while($pageSegments[$currentIndex]->Id != $pageSegment->Id && $currentIndex < count($pageSegments)){
            $previousPage = $pageSegments[$currentIndex];
            $currentIndex ++;
        }

        if($previousPage == null || $previousPage->Id == $page->Id){
            return $this->Redirect('/Page/Content/' .$page->Id);
        }

        $tmpSortOrder = $pageSegment->SortOrder;
        $pageSegment->SortOrder = $previousPage->SortOrder;
        $previousPage->SortOrder = $tmpSortOrder;

        $pageSegment->Save();
        $previousPage->Save();

        return $this->Redirect('/Page/Content/' . $page->Id);
    }

    public function MoveDown($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Find($id);
        if($pageSegment == null){
            return $this->HttpNotFound();
        }

        $page = $pageSegment->Page;
        $pageSegments = $page->PageSegments->OrderBy('SortOrder');

        $currentIndex = count($pageSegments) -1;
        $previousPage = null;
        while($pageSegments[$currentIndex]->Id != $pageSegment->Id && $currentIndex >= 0){
            $previousPage = $pageSegments[$currentIndex];
            $currentIndex --;
        }

        if($previousPage == null || $previousPage->Id == $page->Id){
            return $this->Redirect('/Page/Content/' .$page->Id);
        }

        $tmpSortOrder = $pageSegment->SortOrder;
        $pageSegment->SortOrder = $previousPage->SortOrder;
        $previousPage->SortOrder = $tmpSortOrder;

        $pageSegment->Save();
        $previousPage->Save();

        return $this->Redirect('/Page/Content/' . $page->Id);
    }

    public function Delete($id = null)
    {
        if($id == null || $id == 0){
            return $this->HttpNotFound();
        }

        $pageSegment = $this->Models->PageSegment->Find($id);
        if($pageSegment == null){
            return $this->HttpNotFound();
        }

        $pageSegment->IsDeleted = 1;
        $pageSegment->Save();

        return $this->Redirect('/Page/Content/' . $pageSegment->PageId);
    }
}