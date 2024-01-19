<?php 
$temp1 = 22.34;
$temp2 = 34.55;
$temp3 = 98.44;
$mymodelname = "LinearRegression";
function runMachineLearningModel($temp1, $temp2, $temp3, $mymodelname) {
    $pythonScriptPath = 'trail.py';
    $pythonExecutablePath = 'C:\\Users\\prasa\\python\\python.exe';

    // Prepare and execute the Python command
    $command = '"' . $pythonExecutablePath . '" ' . $pythonScriptPath . ' ' . $temp1 . ' ' . $temp2 . ' ' . $temp3 .' '. $mymodelname;
    $output = shell_exec($command);
    echo $output;
}

$final = runMachineLearningModel($temp1, $temp2, $temp3, $mymodelname);

echo $final;
?>