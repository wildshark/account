<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 22-Sep-17
 * Time: 6:32 AM
 */
$id=$_GET['id'];
$sql="Select * from get_printout_payment where payID='$id'";
$result=$conn->query($sql);
$r=$result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>
    <body>
        <div class="container">
            <div class="reciept">
                <div class="row" style="margin-top:10px;">
                    <div class="col-md-8">
                        <div class="col-md-3">
                            <img class="media-object img-thumbnail user-img" style="height: 160px;" alt="User Picture" src="image/logo.png"></div>
                        <div class="col-md-9 text-left">
                            <h4 class="heading">Ghana Christian University College</h4>
                            <h5 class="heading">Amrahia, near Adenta, Accra-Dodowa Road.</h5>
                            <h5 class="heading">P.O.Box AF 919, Adenta.</h5>
                            <h6 class="heading">+23324-3523456 / +23327-6984145 / +23320-8178307 / +23320-4702779</h6>
                            <h6 class="heading">admissions@ghanacu.net
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="col-md-4 control" >Date :</label>
                            <div class="col-md-8">
                                <input id="" name="name" type="text" VALUE="<?php echo $r['payDate']?>" placeholder="10-May-2017 02:05 pm" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control" >Reciept No. :</label>
                            <div class="col-md-8">
                                <input id="" name="name" type="text" value="<?php echo $r['payID']?>" placeholder="12349" class="form-control">
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
                                <input id="" name="name" type="text" <?php echo $r['studnetName']?> placeholder="Your name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control" for="">School :</label>
                            <div class="col-md-9">
                                <input id="" name="name" type="text" value="<?php echo $r['payDate']?>" placeholder="School" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-6 control" for="">Section :</label>
                            <div class="col-md-6" style="padding-left:20px;">
                                <input id="" name="name" value="<?php echo $r['semesterID']?>" type="text" placeholder="Section" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control" for="">Batch :</label>
                            <div class="col-md-9">
                                <input id="" name="name" type="text" placeholder="Batch" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control" for="name">Recieve Amount :</label>
                            <div class="col-md-9">
                                <input id="name" name="name" type="text" value="<?php echo $r['paid_amount']?>" placeholder="Amount" class="form-control">
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
                            <label class="col-sm-3 control">Bank Name :</label>
                            <div class="col-sm-9">
                                <input id="" name="name" type="text" placeholder="State Bank of India" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control" >Cheque No :</label>
                            <div class="col-sm-9">
                                <input id="" name="name" type="text" placeholder="Cheque no" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control" >Date :</label>
                            <div class="col-sm-9">
                                <input id="" name="name" type="text" placeholder="Date" class="form-control">
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
    </body>

<script src="../../template/js/jquery.min.js"></script>
<script src="../../template/js/jquery.ui.custom.js"></script>
<script src="../../template/js/bootstrap.min.js"></script>
<script src="../../template/js/bootstrap-colorpicker.js"></script>
<script src="../../template/js/bootstrap-datepicker.js"></script>
<script src="../../template/js/jquery.uniform.js"></script>
<script src="../../template/js/select2.min.js"></script>
<script src="../../template/js/maruti.js"></script>
<script src="../../template/js/maruti.tables.js"></script>
<script src="../../template/js/jquery.dataTables.min.js"></script>
<script src="../../template/js/maruti.form_common.js"></script>
</html>
