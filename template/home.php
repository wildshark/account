<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:45 PM
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page->header;?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/css/fullcalendar.css" />
    <link rel="stylesheet" href="template/css/maruti-style.css" />
    <link rel="stylesheet" href="template/css/maruti-media.css" class="skin-color" />
</head>
    <body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.html">Que Account</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-messaages-->
    <div class="btn-group rightzero">
        <a class="top_message tip-left" title="Manage Files">
            <i class="icon-file"></i></a>
        <a class="top_message tip-bottom" title="Manage Users">
            <i class="icon-user"></i></a>
        <a class="top_message tip-bottom" title="Manage Comments">
            <i class="icon-comment"></i>
            <span class="label label-important">5</span></a>
        <a class="top_message tip-bottom" title="Manage Orders">
            <i class="icon-shopping-cart"></i></a>
    </div>
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

    <div id="sidebar">
        <a href="u=dashboard" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
        <?php include_once "master.menu.top.php";?>
    </div>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="index.html" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a>
            </div>
        </div>
        <div class="container-fluid">
            <?php include_once $page->views;?>
        </div>
    </div>
    <div class="row-fluid">
        <div id="footer" class="span12"><?php $page->copyright;?></div>
    </div>


    <script src="template/js/excanvas.min.js"></script>
    <script src="template/js/jquery.min.js"></script>
    <script src="template/js/jquery.ui.custom.js"></script>
    <script src="template/js/bootstrap.min.js"></script>
    <script src="template/js/jquery.flot.min.js"></script>
    <script src="template/js/jquery.flot.resize.min.js"></script>
    <script src="template/js/jquery.peity.min.js"></script>
    <script src="template/js/fullcalendar.min.js"></script>
    <script src="template/js/maruti.js"></script>
    <script src="template/js/maruti.dashboard.js"></script>
    <script src="template/js/maruti.chat.js"></script>
    <script src="template/js/jquery.flot.pie.min.js"></script>
    <script src="template/js/maruti.charts.js"></script>
    <script src="template/js/maruti.dashboard.js"></script>
    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();
                }
                // else, send page to designated URL
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
    </script>
    <script type="text/javascript">
        $(function () {
            var dataset1 = <?php echo json_encode($data_set1); ?>;
            $.plot($("#chart"), [dataset1]);
        });
    </script>

    </body>
</html>

