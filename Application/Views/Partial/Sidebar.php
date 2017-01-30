<div class="panel panel-defaul">
    <div class="panel-heading"><a href="/">Startpage</a></div>
    <ul class="list-group">
        <?php foreach($Sidebar as $section):?>
            <li class="list-group-item">
                <?php if(is_array($section)):?>
                    <a href="<?php echo $section['Link'];?>"><?php echo $section['Title'];?></a>
                <?php else:?>
                    <a href="<?php echo $section->GetPath();?>"><?php echo $section->PageTitle;?></a>
                <?php endif;?>
            </li>
        <?php endforeach;?>
    </ul>
</div>