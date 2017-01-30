<h1>Page options</h1>

<div class="row">
    <div class="col-lg-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-lg-5">Identifier</th>
                    <th class="col-lg-5">Value</th>
                    <th class="col-lg-2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($PageOptions as $pageOption):?>
                    <tr>
                        <td><?php echo $pageOption->Identifier;?></td>
                        <td><?php echo $pageOption->Value;?></td>
                        <td>
                            <a href="<?php echo '/Pageoption/Edit/' . $pageOption->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>