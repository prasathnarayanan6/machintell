<?php
// Replace 'path/to/python' with the path to your Python executable
// Replace 'C:\xampp\htdocs\machintell\trial.py' with the path to your Python script
// Replace 'LinearRegression.pkl' with the actual model filename
// Replace 'param1 param2 param3' with the parameters you want to pass

$pythonExecutable = 'path/to/python';
$pythonScriptPath = 'C:\xampp\htdocs\machintell\trial.py';
$modelFilename = 'LinearRegression.pkl';
$params = '1 2 3';

// Enclose paths with double quotes
$command = '"' . $pythonExecutable . '" "' . $pythonScriptPath . '" ' . $modelFilename . ' ' . $params;

$output = shell_exec($command);

// Output the result
echo "Output: " . $output;
?>
