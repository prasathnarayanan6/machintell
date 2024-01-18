<?php
$temp1 = 10.0; 
$temp2 = 20.0; 
$temp3 = 30.0; 
$mymodelname = 'LinearRegression';
$pythonScriptPath = 'trail.py';
$pythonExecutablePath = 'C:\\Users\\prasa\\python\\python.exe'; 
$command = '"' . $pythonExecutablePath . '" ' . $pythonScriptPath . ' ' . $temp1 . ' ' . $temp2 . ' ' . $temp3 .' '. $mymodelname;
$output = shell_exec($command);
echo "Output " . $output;
?>
