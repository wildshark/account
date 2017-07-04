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

    <div id="sidebar"><a href="u=dashboard" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
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

            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
                        <h5>Site Analytics</h5>
                        <div class="buttons"><a href="#" class="btn btn-mini btn-success">
                                <i class="icon-refresh"></i> Update stats</a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">
                            <div class="span8">
                                <div class="chart"></div>
                            </div>
                            <div class="span4">
                                <ul class="stat-boxes2">
                                    <li>
                                        <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                        <canvas width="50" height="24"></canvas>
                        </span>+10%</div>
                                        <div class="right"> <strong>15598</strong> Visits </div>
                                    </li>
                                    <li>
                                        <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
                        <canvas width="50" height="24"></canvas>
                        </span>10%</div>
                                        <div class="right"> <strong>150</strong> New Users </div>
                                    </li>
                                    <li>
                                        <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                        <canvas width="50" height="24"></canvas>
                        </span>-40%</div>
                                        <div class="right"> <strong>4560</strong> Orders</div>
                                    </li>
                                    <li>
                                        <div class="left peity_line_good"><span><span style="display: none;">12,6,9,13,14,10,17</span>
                        <canvas width="50" height="24"></canvas>
                        </span>+60%</div>
                                        <div class="right"> <strong>936</strong> Register </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

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
    </body>
</html>

