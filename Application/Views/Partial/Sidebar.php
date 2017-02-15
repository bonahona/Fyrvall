<div class="panel panel-default">
    <div class="panel-heading">
        <a href="/">Startpage</a>
    </div>
    <ul class="list-group">
        <?php foreach($Sidebar as $page):?>
            <li class="list-group-item">
                <?php if(is_array($page)):?>
                    <a href="<?php echo $page['Link'];?>"><?php echo $page['Title'];?></a>
                <?php else:?>
                    <a href="<?php echo $page->GetPath();?>"><?php echo $page->PageTitle;?></a>
                <?php endif;?>
            </li>
            <?php if(!is_array($page)):?>
                <?php foreach($page->Pages as $subPage):?>
                    <li class="list-group-item indent-left-1">
                        <a href="<?php echo $subPage->GetPath();?>"><?php echo $subPage->PageTitle;?></a>
                    </li>
                <?php endforeach;?>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</div>
