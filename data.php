<?php 
require_once "conn.php";
// header('Content-Type: application/json');
$sql = "SELECT * FROM data ORDER BY date DESC LIMIT 1";
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query); 
$data = [
    'id' => $row['id'],
    's1' => $row['s1'],
    's2' => $row['s2'],
    's3' => $row['s3'],
    'date' => $row['date']
    // 'state' => $row['state']
];
echo json_encode($data);
?>