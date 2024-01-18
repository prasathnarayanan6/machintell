<?php
require_once "conn.php";
$id = $_GET['id'];
$s1 = $_GET['s1'];
$s2 = $_GET['s2'];
$s3 = $_GET['s3'];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d_H:i:s");
$sql = "INSERT INTO data(id, s1, s2, s3, date) VALUES('$id', '$s1', '$s2', '$s3', '$date')";
if($conn->query($sql)){
    echo "INSERTED SUCCESSFULL";
}
?>
