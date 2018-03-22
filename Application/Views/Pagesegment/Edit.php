<?php /** @var $this Controller*/?>

<h1>Edit page</h1>

<div class="row">
    <div class="col-lg-8">
        <?php echo $this->Form->Start('PageSegment');?>
        <?php echo $this->Form->Hidden('Id');?>
        <div class="form-group">
            <?php echo $this->Form->Area('Content', array('attributes' => array('class' => 'form-control summernote', 'rows' => '30')));?>
        </div>
        <?php echo $this->Form->Submit('Save', array('attributes' => array('class' => 'btn btn-md btn-primary')));?>
        <?php echo $this->Form->End();?>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo '/Page/Content/' . $PageSegment->Page->Id;?>" class="btn btn-md btn-default margin-top">Back</a>
    </div>
</div>