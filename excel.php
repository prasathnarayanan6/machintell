<?php 
require_once "conn.php";
$sql = "SELECT * FROM data";
$result = $conn->query($sql);
if($result->num_rows>0)
{
    $data = array();
    while ($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
    $csvFileName = 'output.csv';
    $csvFilePath = 'C:/Users/Public/data/' . $csvFileName; 
    $csvFile = fopen($csvFilePath, 'w');
    fputcsv($csvFile, array_keys($data[0]));
    foreach ($data as $row) {
        fputcsv($csvFile, $row);
    }
    fclose($csvFile);
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=' . $csvFileName);
    header('Pragma: no-cache');
    readfile($csvFilePath);
    exit();
}
else
{
    echo "Data not found";
}
?>