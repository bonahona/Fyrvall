<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Björn Fyrvall">
    <?php echo $this->Html->Favicon('fyrvall-favicon.png');?>

    <title><?php echo $title;?></title>

    <?php echo $this->Html->Css('bootstrap.min.css');?>
    <?php echo $this->Html->Css('dashboard.css');?>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top menu-dark-grey">
    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle navbar-brand light-grey" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Fyrvall
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="navbar-brand"><a href="/">Fyrvall</a></li>
                        <li class="navbar-brand"><a href="http://assets.fyrvall.com">Assets</a></li>
                        <li class="navbar-brand"><a href="http://manage.fyrvall.com">Manage</a></li>
                        <li class="navbar-brand"><a href="http://documentation.fyrvall.com">Documentation</a></li>
                        <li class="navbar-brand"><a href="http://share.fyrvall.com">Share</a></li>
                    </ul>
                </li>
            </ul>
            <span class="navbar-brand light-grey">|</span>
            <a class="navbar-brand light-grey" href="http://fyrvall.com">Fyrvall.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if($this->IsLoggedIn()):?>
                    <li><a class="light-grey" href="/User/Logout">Log out</a></li>
                <?php endif;?>
            </ul>
            <form method="get" action="/Search/Index" class="navbar-form navbar-right">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                    <?php if(isset($SearchQuery)):?>
                        <input type="text" name="keywords" class="form-control" placeholder="Search..."/ value="<?php echo $SearchQuery;?>">
                    <?php else:?>
                        <input type="text" name="keywords" class="form-control" placeholder="Search..."/>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php echo $this->PartialView('Sidebar', array('Sidebar' => $Sidebar));?>
        </div>
        <div id="file-container" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php if(isset($BreadCrumbs)):?>
                <?php echo $this->PartialView('Breadcrumbs', array('BreadCrumbs' => $BreadCrumbs));?>
            <?php endif;?>
            <?php echo $view;?>

            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title"></h2>
                </div>
                <div class="panel-body">
                    <?php foreach ($this->Logging->Cache->Fetch() as $logEntry):?>
                        <?php var_dump($logEntry);?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php echo $this->Html->Js('bootstrap.min.js');?>
</body>
</html>
