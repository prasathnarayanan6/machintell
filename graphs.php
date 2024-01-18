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
               <center><h5>Sensor Graph: <?php echo $id;?>(Live Graph)</h5></center><br>
               <center><h5>Temperature v Time</h5></center><br>
                <center><canvas id="myChart" style="width:100%;max-width:600px;max-height:400px"></canvas></center>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     const ctx = document.getElementById('myChart');
     const url = "https://7a88-183-82-31-174.ngrok-free.app/lam/data.php";
    <?php 
    if($id=="xy1waveguide")
    {
    ?>
            //start getchartdata
            async function getchartdata(){
               const s1 =[];
               const s2 =[];
               const s3 =[];
               const s4 = [];
               const s5 = [];
               const date = [];
                const response = await fetch(url);
                const data = await response.json();
                date.push(data.date);
                // for (let index = 0; index < data.length; index++) {
                //     s1[index] = data.s1;
                //     s2[index] = data.s2;
                //     s3[index] = data.s3;
                //     date[index] = data.date;
                // }
                // console.log(s1);
                if (mychart) {
                    mychart.data.labels.push(data.date);
                     mychart.data.datasets[0].data.push(data.<?php echo $s1; ?>);
                     mychart.data.datasets[1].data.push(data.<?php echo $s2; ?>);
                     mychart.data.datasets[2].data.push(data.<?php echo $s3; ?>);
                     mychart.data.datasets[3].data.push(data.<?php echo $s4; ?>);
                     mychart.data.datasets[4].data.push(data.<?php echo $s5; ?>);
                     mychart.update(); 
                }else{
                        mychart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: date,
                            datasets: [
                                {
                                label: 'sensor1',
                                data: s1,
                                borderWidth: 1
                            },
                        {
                            label: 'sensor2',
                            data: s2,
                            borderWidth: 1
                        },{
                            label: 'sensor3',
                            data: s3,
                            borderWidth: 1
                        },{
                            label: 'sensor4',
                            data: s4,
                            borderWidth: 1
                        },
                        {
                            label: 'sensor5',
                            data: s5,
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
            <?php 
            } 
            elseif($id=="xy2waveguide"){?>
            ///second graph
            //start getchartdata
            async function getchartdata(){
               const s1 =[];
               const s2 =[];
               const s3 =[];
               const s4 = [];
               const s5 = [];
               const date = [];
                const response = await fetch(url);
                const data = await response.json();
                date.push(data.date);
                if (mychart) {
                    mychart.data.labels.push(data.date);
                     mychart.data.datasets[0].data.push(data.<?php echo $s6; ?>);
                     mychart.data.datasets[1].data.push(data.<?php echo $s7; ?>);
                     mychart.data.datasets[2].data.push(data.<?php echo $s8; ?>);
                     mychart.data.datasets[3].data.push(data.<?php echo $s9; ?>);
                     mychart.data.datasets[4].data.push(data.<?php echo $s10; ?>);
                     mychart.update(); 
                }else{
                        mychart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: date,
                            datasets: [
                                {
                                label: 'sensor1',
                                data: s1,
                                borderWidth: 1
                            },
                        {
                            label: 'sensor2',
                            data: s2,
                            borderWidth: 1
                        },{
                            label: 'sensor3',
                            data: s3,
                            borderWidth: 1
                        },{
                            label: 'sensor4',
                            data: s4,
                            borderWidth: 1
                        },
                        {
                            label: 'sensor5',
                            data: s5,
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

            <?php } ?>
</script>

</html>

