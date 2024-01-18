<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/mm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./lity/lity/dist/lity.css" />
    <script src="./lity/lity/vendor/jquery.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: 'myFirstFont';
            src: url('./Josefin_Sans/static/JosefinSans-Medium.ttf');
        }
        body{
            font-family: 'myFirstFont';
        }
    </style>
</head>
<body>
    <div class="container-fluid">
         <div class="row mt-5">
                <center><span class="h3"><span class="text-danger">THERMAL</span> <span>COMPOSITION 4.0</span></center>
                <div class="col-md-6">
                    <img src="./img/6224584.jpg" alt='image' width='100%'></img>
                    <center><span>Designed and Developed by IIT Madras</span></center>
                </div>
                <div class="col-md-6 mt-5">
                    <center><span class="h3">Analytics</span><center>
                    <center><span class="h6">Please select a Data to get your report</span><center>
                    <div class="row pt-4">
                        <div class="col-md-6 mb-5">
                            <a href="excel  ">
                            <div class="card analyticscard">
                                <div class="card-body">
                                    <span class="h1 text-dark"><i class="fas fa-file-excel" aria-hidden="true"></i></span>
                                    <div class="card-title text-dark h5">Excel</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-5">
                            <a href="pdf">
                            <div class="card analyticscard">
                                <div class="card-body">
                                    <span class="h1 text-dark"><i class="fas fa-file-pdf"></i></span>
                                    <div class="card-title text-dark h5">Pdf</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <center>
                        <div class="progress mt-5" style="height: 6px;">
                            <div class="progress-bar bg-dark" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class='mt-2'>Step 1 / Step 1</span>
                        </center>
                    </div>
                </div>
         </div>
    </div>
</body>
<script src="./lity/lity/dist/lity.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>