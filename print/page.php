<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 07-Nov-17
 * Time: 2:03 PM
 */

function fees_details($conn){
    $cash="SELECT * FROM get_fees_payment_history";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){

        if ($c['payTypeID']==1){
            $payType="Cash";
        }elseif ($c['payTypeID']==2){
            $payType="Bank";
        }

        echo "
              <tr>
                  <td >{$c['payDate']}</td>
                  <td>{$c['studentID']}</td>
                  <td>{$c['payTypeID']}</td>
                  <td>{$c['fees_amount']}</td>
                  <td>Both</td>
              </tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A4</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="print/css/normalize.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="print/css/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A7 }</style>
    <style>

        .dark-row{
            background:#AEC5E8;

        }
        .light-row{

            background:#F1F3F0;
        }

        .movie-table-head{

            background: ;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-10mm">
    <!-- Write HTML just like a web page -->
    <article>This is an A4 document.</article>
    <article>

    </article>
</section>

</body>

</html>

