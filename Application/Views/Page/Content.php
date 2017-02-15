<?php /** @var $this Controller*/?>

<h1>Edit page content</h1>

<div class="row">
    <div class="col-lg-12 margin-top">
        <a href="<?php echo '/Pagesegment/Create/' . $Page->Id;?>" class="btn btn-md btn-primary">Add segment</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-top">
        <?php foreach($Page->PageSegments->Where(array('IsDeleted' => 0))->OrderBy('SortOrder') as $pageSegment):?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-10">
                                    Segment
                                    <?php if($pageSegment->IsActive == 0):?>
                                        <span class="light-grey">[Inactive]</span>
                                    <?php endif;?>
                                </div>
                                <div class="col-lg-2">
                                    <a href="/<?php echo 'Pagesegment/MoveUp/' . $pageSegment->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-chevron-up"/></a>
                                    <a href="/<?php echo 'Pagesegment/MoveDown/' . $pageSegment->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-chevron-down"/></a>
                                    <?php if($pageSegment->IsActive):?>
                                        <a href="/<?php echo 'Pagesegment/SetInactive/' . $pageSegment->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-remove"/></a>
                                    <?php else:?>
                                        <a href="/<?php echo 'Pagesegment/SetActive/' . $pageSegment->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-ok"/></a>
                                    <?php endif;?>
                                    <a href="/<?php echo 'Pagesegment/Delete/' . $pageSegment->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-trash"/></a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $pageSegment->Content;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-l2">
                                    <div class="text-right btn-margin-right">
                                        <a href="<?php echo '/Pagesegment/Edit/' . $pageSegment->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <a href="/Page" class="btn btn-md btn-default">Back</a>
    </div>
</div>