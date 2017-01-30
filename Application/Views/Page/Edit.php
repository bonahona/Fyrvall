<?php /** @var $this Controller*/?>

<h1>Edit page</h1>

<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->Start('Page');?>
        <?php echo $this->Form->Hidden('Id');?>
        <div class="form-group">
            <label>Navigation Title</label>
            <?php echo $this->Form->Input('NavigationTitle', array('attributes' => array('class' => 'form-control')));?>
        </div>
        <div class="form-group">
            <label>Page Title</label>
            <?php echo $this->Form->Input('PageTitle', array('attributes' => array('class' => 'form-control')));?>
        </div>
        <div class="form-group">
            <label>Sort Order</label>
            <?php echo $this->Form->Input('SortOrder', array('attributes' => array('class' => 'form-control')));?>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->Bool('ShowInMenu');?>
                    Show in menu
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->Bool('IsActive');?>
                    Is Active
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Parent Page</label>
            <?php echo $this->Form->Select('ParentPageId', $Pages, array('nullfield' => true, 'attributes' => array('class' => 'form-control')));?>
        </div>

        <?php echo $this->Form->Submit('Save', array('attributes' => array('class' => 'btn btn-md btn-primary')));?>
        <?php echo $this->Form->End();?>
    </div>
</div>