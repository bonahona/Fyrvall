<h1>Pages</h1>
<div class="row">
    <div class="col-lg-12">
        <a href="/Page/Create" class="btn btn-md btn-primary">Create new</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th class="col-lg-3">Page title</th>
                    <th class="col-lg-3">Navigation title</th>
                    <th class="col-lg-3">Parent</th>
                    <th class="col-lg-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Pages as $page):?>
                    <tr>
                        <td>
                            <a href="<?php echo $page->GetPath();?>"><?php echo $page->PageTitle;?></a></td>
                        <td><?php echo $page->NavigationTitle;?></td>
                        <td>
                            <?php if($page->ParentPage != null):?>
                                <?php echo $page->ParentPage->PageTitle;?>
                            <?php else:?>
                                <span>N/A</span>
                            <?php endif;?>
                        </td>
                        <td>
                            <a href="<?php echo '/Page/Content/' . $page->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-file"/></a>
                            <a href="<?php echo '/Page/Edit/' . $page->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-pencil"/></a>
                            <a href="<?php echo '/Page/Delete/' . $page->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-trash"/></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>