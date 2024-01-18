<?php 
$config = parse_ini_file('config.ini');

$host = $config['host'];
$port = $config['port'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$conn = mysqli_connect($host . ":" . $port, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// else{
//   echo "connected";
// }

?>