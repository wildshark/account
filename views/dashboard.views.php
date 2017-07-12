<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06-Jul-17
 * Time: 10:12 AM
 */

$query = "SELECT GL_date,bankDr FROM general_legder";
$result = $conn->query($query);
while($row =$result->fetch_assoc())
{
    $data_set1[] = array(intval($row['GL_date']),intval($row['bankDr']));
}

?>
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
                    <?php include_once $page->chart;?>
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
