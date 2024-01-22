<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
         @font-face {
             font-family: myFirstFont;
             src: url("./css/Josefin_Sans/static/JosefinSans-Medium.ttf");
         }
        body{
            font-family: 'myFirstFont'; 
            background-color: 'gray';
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
               <center><h5>Deflection Graph</h5></center><br>
               <center><h5>Deflection v Time</h5></center><br>
                <center><canvas id="myChart" style="width:100%;max-width:600px;max-height:400px"></canvas></center>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     const ctx = document.getElementById('myChart');
     const url = "http://18.206.189.74/machintell/data.php";
            //start getchartdata
            async function getchartdata(){
               const deflection =[];
               const date = [];
                const response = await fetch(url);
                const data = await response.json();
                date.push(data.date);
                if (mychart) {
                    mychart.data.labels.push(data.date);
                     mychart.data.datasets[0].data.push(data.deflection);
                     mychart.update(); 
                }else{
                        mychart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: date,
                                datasets: [
                                {
                                    label: 'Deflection',
                                    data: deflection,
                                    borderWidth: 1
                                }
                            ]
                            },
                            options: { }
                        });
                    }
            }
            let mychart;
            setTimeout(getchartdata, 0);
            setInterval(getchartdata, 5000);
</script>

</html>

