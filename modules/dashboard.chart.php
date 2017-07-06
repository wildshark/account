<div id="chart" class="chart"></div>
<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06-Jul-17
 * Time: 10:51 AM
 */

$connection = mysql_connect($servername, $username, $password);
$db = mysql_select_db($database,$connection);

$query = "SELECT * FROM get_chart";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))
{
    $data_set1[] = array(intval($row['GL_ID']),intval($row['outcash']));

}