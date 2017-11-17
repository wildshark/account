<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 09-Nov-17
 * Time: 11:58 AM
 */

$date= $_SESSION['tranDate'];

$receipt="SELECT * FROM get_print_fees WHERE tranDate ='$date'";
$receipt=$conn->query($receipt);
$c=$receipt->fetch_assoc();

$id=$c['payID'];
$tranDate=$c['tranDate'];
$date=$c['payDate'];
$student=$c['studentName'];
$admission=$c['admissionNo'];
$school=$c['school'];
$session=$c['sch_session'];
$pay_type=$c['payTypeID'];
$level=$c['stud_level'];
$semester=$c['Semester'];
$ref_no=$c['refNo'];
$fees=$c['fees_amount'];
$paid=$c['paid_amount'];

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>A4 CSS page template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
        body {
            background: rgb(204,204,204);
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }
        page[size="A4"][layout="portrait"] {
            width: 29.7cm;
            height: 21cm;
        }
        page[size="A3"] {
            width: 29.7cm;
            height: 42cm;
        }
        page[size="A3"][layout="portrait"] {
            width: 42cm;
            height: 29.7cm;
        }
        page[size="A5"] {
            width: 14.8cm;
            height: 21cm;
        }
        page[size="A5"][layout="portrait"] {
            width: 21cm;
            height: 14.8cm;
        }
        page[size="A7"] {
            width: 10.5cm;
            height: 7.4cm;
        }
        @media print {
            body, page {
                margin: 0;
                box-shadow:;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <page size="A7">
        <div class="container">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <address>
                    <strong>Ghana christian university college</strong>
                    <br>
                    Amrahia On the Adenta-Dodowa Road
                    <br>
                    <abbr title="Phone">P:</abbr>+233576533307/+233 204069583
                </address>
                <strong>Receipt</strong>
                <article>
                    <div>
                        Name: <?php echo $student;?>
                    </div>
                    <div>
                        Admission: <?php echo $admission;?>
                    </div>
                    <div>
                        School: <?php echo $school;?>
                    </div>
                </article>
                <article>
                    <div>
                        Fees Cost:<?php echo $fees;?>
                    </div>
                    <div>
                        Fees Paid:<?php echo $paid;?>
                    </div>
                    <div>
                        Balance:<?php echo "0.00"?>
                    </div>
                </article>

            </div>
        </div>
    </page>
</body>
</html>


