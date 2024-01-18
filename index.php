<?php
require "conn.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./static/jquery.min.js"></script>
    <script src="./sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/mm.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./sweetalert/dist/sweetalert.min.js"></script>
    <link href="./fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @font-face {
             font-family: myFirstFont;
             src: url("./css/Josefin_Sans/static/JosefinSans-Regular.ttf");
        }


    body{
        font-family: 'myFirstFont'; 
    }
    input{
      border-top-style: hidden;
      border-right-style: groove;
      border-left-style: hidden;
      border-bottom-style: groove;
      border-right-color: grey;
    }
    .no-outline:focus {
     outline: none;
    }
    h4{
      /* Increase this as per requirement */
      padding-bottom: 5px;
      border-bottom-style: solid;
      border-bottom-width: 3.1px;
      width: fit-content;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
     background-color: white;
    }
    li {
      float: left;
      /* text-align: center; */
    }
    li a {
      display: block;
      color: black;
      text-align: center;
      padding: 16px;
      text-decoration: none;
    }
    </style>    
    <title>Login</title>
</head>
<body><br><br>  
<center><img src="./img/IIT_Madras_Logo.svg.png" width="100px"></img></center><br><br>
<center><h3>Thermal Composition 4.0</h3></center><br> 
<center><h4>Login</h4></center><br> 
<div style="display: flex; justify-content: center; align-items: center; height: 30vh;">
  <form action="" method="post">
    <input type="email" name="email" class="no-outline email" id="exampleFormControlInput1 email" placeholder="Username" size="30"><br><br>
    <input type="password" name="password" class="no-outline password" id="exampleFormControlInput1 password" placeholder="Password" size="30"><br><br><br>
    <center><button type="Submit" name="login" class="btn btn-dark" placeholder="Login">Login</button></center>
  </form>
</div><br><br>
<center> 
<p><b>© Designed and Developed by Department of Mechanical Engineering, IIT Madras</b></p>
</center>   
</body>
</html>
<?php 
// $email = $_POST['email'];
// $password = $_POST['password'];
if(isset($_POST['login'])){
    $email = $_POST['email'] ; 
    $password = $_POST['password'];
    $sanitized_userid = mysqli_real_escape_string($conn, $email);
    $sanitized_password = mysqli_real_escape_string($conn, $password);
    echo $sanitized_password;
        $password = 'Gte5RVXvuYOAW5DwzMs4DfzpC49WlU4';
        $method = 'aes-256-cbc';
        $key = substr(hash('sha256', $password, true), 0, 32);
        // echo "Password:" . $password . "\n";
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $encrypted = base64_encode(openssl_encrypt($sanitized_password, $method, $key, OPENSSL_RAW_DATA, $iv));
        // My secret message 1234
        $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);
        // echo 'plaintext=' . $plaintext . "\n";
        // echo 'cipher=' . $method . "\n";
        echo 'encrypted to: ' . $encrypted . "\n";
        echo 'decrypted to: ' . $decrypted . "\n\n";
        function generateRandomString($length = 30) {
              $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $charactersLength = strlen($characters);
              $randomString = '';
              for ($i = 0; $i < $length; $i++) {
                  $randomString .= $characters[rand(0, $charactersLength - 1)];
              }
              return $randomString;
        }
        $identityid =   generateRandomString();
        $sql = "SELECT * FROM logincred WHERE email = '" . $sanitized_userid . "' AND password = '" . $encrypted . "'";
        $result = mysqli_query($conn, $sql);
        // or die(mysqli_error($db));
        $num=mysqli_fetch_array($result);
        if($num > 0) {
          session_start();
          $_SESSION['email'] = $sanitized_userid;
          $_SESSION['password'] = $sanitized_password;
          // echo "Login Success";
          $_SESSION['name'] = $num['name'];
          $_SESSION['identity'] = $identityid;
          // echo $_SESSION['identity'];

          date_default_timezone_set('Asia/Kolkata');
          $date = date("Y-m-d_h:i:sa");
          $_SESSION['time'] = $date;
          header("Location: dashboard?identity={$identityid}");
          $sql1 = "INSERT INTO loginact(email, hash, date) VALUES('$email', '$identityid', '$date')";
          $conn->query($sql1);
        }
        else {
          echo "Wrong User id or password";
        } 
}
?>
