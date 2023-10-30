<?php

include 'includes/session.php';
include "pay.php";
// check if pay_ref is not empty
if($_SERVER['REQUEST_METHOD'] !='GET') {
    die("UNSUPPORTED REQUEST METHOD");
}

$pay_ref = $_GET['pay_ref'];

$result = hdev_payment::get_pay($pay_ref);
$sql = "UPDATE `sales` SET `status`='" . $result->status . "' WHERE `transactionId` = '$pay_ref'";
$update = $conn->query($sql);
header("location: final.php?ref=$pay_ref");