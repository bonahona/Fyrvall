<?php /** @var $this Controller*/?>

<?php if(isset($Sidebar)):?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="/">Startpage</a>
        </div>
        <ul class="list-group">
            <?php foreach($Sidebar as $page):?>
                <?php if($page->ShowInMenu == 1):?>
                    <li class="list-group-item">
                        <a href="<?php echo $page->GetPath();?>"><?php echo $page->PageTitle;?></a>
                    </li>
                    <?php foreach($page->Pages as $subPage):?>
                        <?php if($subPage->ShowInMenu == 1):?>
                            <li class="list-group-item indent-left-1">
                                <a href="<?php echo $subPage->GetPath();?>"><?php echo $subPage->PageTitle;?></a>
                            </li>
                        <?php endif;?>
                    <?php endforeach;?>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>

<?php if($this->IsLoggedIn()):?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Admin
        </div>
        <ul class="list-group">
            <?php foreach($this->GetSideBar() as $page):?>
                <li class="list-group-item">
                    <a href="<?php echo $page['Link'];?>"><?php echo $page['Title'];?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>