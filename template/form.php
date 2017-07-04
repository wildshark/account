<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 1:14 PM
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page->header?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/css/colorpicker.css" />
    <link rel="stylesheet" href="template/css/datepicker.css" />
    <link rel="stylesheet" href="template/css/uniform.css" />
    <link rel="stylesheet" href="template/css/select2.css" />
    <link rel="stylesheet" href="template/css/maruti-style.css" />
    <link rel="stylesheet" href="template/css/maruti-media.css" class="skin-color" />
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Qua Account</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <?php include_once "top.menu.php";?>
</div>
<!--close-top-Header-menu-->
<!--left-menu-stats-sidebar-->
<div id="sidebar">
    <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <?php include_once 'master.menu.top.php'?>
</div>
<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
        <h1><?php echo $page->contenttitle;?></h1>
    </div>
    <div class="container-fluid">
        <?php include_once $page->views;?>
    </div>
</div>
<div class="row-fluid">
    <div id="footer" class="span12"><?php echo $page->copyright;?> </div>
</div>
<script src="template/js/jquery.min.js"></script>
<script src="template/js/jquery.ui.custom.js"></script>
<script src="template/js/bootstrap.min.js"></script>
<script src="template/js/bootstrap-colorpicker.js"></script>
<script src="template/js/bootstrap-datepicker.js"></script>
<script src="template/js/jquery.uniform.js"></script>
<script src="template/js/select2.min.js"></script>
<script src="template/js/maruti.js"></script>
<script src="template/js/maruti.tables.js"></script>
<script src="template/js/jquery.dataTables.min.js"></script>
<script src="template/js/maruti.form_common.js"></script>
</body>
</html>

