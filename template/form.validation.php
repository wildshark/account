<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Nov-17
 * Time: 6:00 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Maruti Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/css/uniform.css" />
    <link rel="stylesheet" href="template/css/select2.css" />
    <link rel="stylesheet" href="template/css/maruti-style.css" />
    <link rel="stylesheet" href="template/css/maruti-media.css" class="skin-color" />
</head>
<!--body oncontextmenu="return false"-->
<body>
<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Maruti Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <?php include_once "top.menu.php";?>
</div>
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-Header-menu-->
<!--close-top-Header-menu-->
<div id="sidebar">

    <?php include_once 'master.menu.top.php'?>
</div>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#">Form elements</a>
            <a href="#" class="current">Validation</a>
        </div>
        <h1><?php echo $page->contenttitle;?></h1>

    </div>

    <div class="container-fluid">
        <div>
            <?php
            include_once "alert/alert.php";
            echo alert_box_type($alert,$msg);
            ?>
        </div>
        <?php include_once $page->views;?>
    </div>
</div> <div class="row-fluid">
    <div id="footer" class="span12"><?php echo $page->copyright;?> </div>
</div>
<script src="template/js/jquery.min.js"></script>
<script src="template/js/jquery.ui.custom.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/jquery.uniform.js"></script>
<script src="template/js/select2.min.js"></script>
<script src="template/js/jquery.validate.js"></script>
<script src="template/js/maruti.js"></script>
<script src="template/js/maruti.form_validation.js"></script>
<script src="template/js/jquery.dataTables.min.js"></script>
<script src="template/js/maruti.tables.js"></script>
</>

</html>

