<?php /** @var $this Controller*/?>

<h1>Edit page option</h1>
<h2><?php echo $PageOption->Identifier;?></h2>

<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->Start('PageOption');?>
        <?php echo $this->Form->Hidden('Id');?>
        <div class="form-group">
            <label>Value</label>
            <?php echo $this->Form->Input('Value', array('attributes' => array('class' => 'form-control')));?>
        </div>

        <?php echo $this->Form->Submit('Save', array('attributes' => array('class' => 'btn btn-md btn-primary')));?>
        <?php echo $this->Form->End();?>
    </div>
</div>