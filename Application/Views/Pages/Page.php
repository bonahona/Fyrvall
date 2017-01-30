<h1><?php echo $Page->PageTitle;?></h1>

<?php foreach($Page->PageSegments->Where(array('IsDeleted' => 0, 'IsActive' => 1))->OrderBy('SortOrder') as $section):?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $section->Content;?>
        </div>
    </div>
<?php endforeach;?>
