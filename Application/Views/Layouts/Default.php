<?php /** @var $this Controller*/?>

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

    <?php if(empty($this->CssFiles)):?>
        <?php echo $this->Html->Css('bootstrap.min.css');?>
        <?php echo $this->Html->Css('dashboard.css');?>
        <?php echo $this->Html->Css('font-awesome.css');?>
    <?php else:?>
        <?php foreach($this->CssFiles as $cssFile):?>
            <?php echo $this->Html->Css($cssFile);?>
        <?php endforeach;?>
    <?php endif;?>
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
                        <?php foreach($ApplicationLinks['PublicApplications'] as $applicationLink):?>
                            <li class="navbar-brand">
                                <a href="<?php echo "http://" . $applicationLink['Url'];?>">
                                    <?php echo $applicationLink['MenuName'];?>
                                </a>
                            </li>
                        <?php endforeach;?>
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
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php echo $this->PartialView('Sidebar', array('Sidebar' => $Sidebar));?>
        </div>
        <div id="file-container" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
<?php if(empty($this->JavascriptFiles)):?>
    <?php echo $this->Html->Js('bootstrap.min.js');?>
<?php else:?>
    <?php foreach($this->JavascriptFiles as $javascriptFile):?>
        <?php echo $this->Html->Js($javascriptFile);?>
    <?php endforeach;?>
<?php endif;?>
</body>
</html>
