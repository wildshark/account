<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08-Nov-17
 * Time: 10:36 PM
 */

$receipt="SELECT * FROM get_print_fees";
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $printout->header;?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="print/css/receipt.css">
</head>
<body>
<div class="container">
    <div class="reciept">
        <div class="row" style="margin-top:10px;">
            <div class="col-md-8">
                <div class="col-md-3">
                    <img class="media-object img-thumbnail user-img" style="height: 80px;" alt="User Picture" src="http://via.placeholder.com/80x80"></div>
                <div class="col-md-9 text-right">
                    <h4 class="heading"><?php echo $printout->title;?></h4>
                    <h5 class="heading">Address: P.O.Box AF 919, Adenta</h5>
                    <h6 class="heading">+23324-3523456 / +23327-6984145 / +23320-8178307 / +23320-4702779</h6>
                    <h6 class="heading">admissions@ghanacu.net</h6>
                </div>
            </div>
            <div class="col-md-4">

                <div class="form-group">
                    <label class="col-md-4 control" >Date :</label>
                    <div class="col-md-8">
                        <input id="" name="name" type="text" value="<?php echo $tranDate;?>" placeholder="10-May-2017 02:05 pm" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control" >Reciept No. :</label>
                    <div class="col-md-8">
                        <input id="" name="name" type="text" value="<?php echo $id;?>" placeholder="12349" class="form-control">
                    </div>
                </div>

            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3 control" for="">Student Name :</label>
                    <div class="col-md-9">
                        <input id="" name="name" type="text" value="<?php echo $student;?>" placeholder="Your name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control" for="">School :</label>
                    <div class="col-md-9">
                        <input id="" name="name" type="text" VALUE="<?php echo $school;?>" placeholder="School" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control" for="">Admission Number :</label>
                    <div class="col-md-6" style="padding-left:20px;">
                        <input id="" name="name" type="text" value="<?php echo $admission;?>" placeholder="Section" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control" for="">Session :</label>
                    <div class="col-md-9">
                        <input id="" name="name" type="text" value="<?php echo $session;?>" placeholder="Batch" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3 control" for="name">Recieve Amount :</label>
                    <div class="col-md-9">
                        <input id="name" name="name" type="text" value="<?php echo $paid;?>" placeholder="Amount" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control" for="name">Cash :</label>
                    <div class="col-md-9">
                        <input id="checkbox2" type="checkbox" checked="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control" for="name">Cheque :</label>
                    <div class="col-md-9">
                        <input id="checkbox2" type="checkbox" checked="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control">Bank Transfer :</label>
                    <div class="col-md-9">
                        <input id="checkbox2" type="checkbox" checked="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-3 control">Fees :</label>
                    <div class="col-sm-9">
                        <input id="" name="name" type="text" value="<?php echo $fees;?>" placeholder="0.00" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control" >Paid :</label>
                    <div class="col-sm-9">
                        <input id="" name="name" type="text" value="<?php echo $paid;?>" placeholder="0.00" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control" >Balance :</label>
                    <div class="col-sm-9">
                        <input id="" name="name" type="text" value="<?php echo $bal=$fees-$paid;?>" placeholder="0.00" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3 control" for="name">Recieved By :</label>
                    <div class="col-md-9">
                        <input id="name" name="name" type="text" placeholder="Authorised Person" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:80px;">
            <div class="col-md-9">
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control" for="name"><u>Authorised Signatury</u></label>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>

</html>


