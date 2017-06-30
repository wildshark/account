<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 10:33 PM
 */


$id=$_GET['q'];



$data=$conn->query("SELECT * FROM fees_payment WHERE studentID='id'");

