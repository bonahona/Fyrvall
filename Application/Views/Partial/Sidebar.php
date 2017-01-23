<div class="panel panel-defaul">
    <div class="panel-heading">Packages</div>
    <ul class="list-group">
        <?php foreach($Sidebar as $section):?>
            <li class="list-group-item"><a href="<?php echo $section['Link'];?>"><?php echo $section['Title'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>