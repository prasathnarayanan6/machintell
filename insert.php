<?php
require_once "conn.php";
$id = $_GET['id'];
$s1 = $_GET['s1'];
$s2 = $_GET['s2'];
$s3 = $_GET['s3'];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d_H:i:s");
$mymodelname = "LinearRegression";
function runMachineLearningModel($s1, $s2, $s3, $mymodelname) {
    $pythonScriptPath = 'trail.py';
    $pythonExecutablePath = '/usr/bin/python3';

    // Prepare and execute the Python command
    $command = '"' . $pythonExecutablePath . '" ' . $pythonScriptPath . ' ' . $s1 . ' ' . $s2 . ' ' . $s3 .' '. $mymodelname;
    $output = shell_exec($command);
    return $output;
}
$final = runMachineLearningModel($s1, $s2, $s3, $mymodelname);
$sql = "INSERT INTO data(id, s1, s2, s3, deflection, model, date) VALUES('$id', '$s1', '$s2', '$s3', '$final','$mymodelname','$date')";
if($conn->query($sql)){
    echo "INSERTED SUCCESSFULL";
}
?>
