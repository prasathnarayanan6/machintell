<?php 

session_start();
if(!isset($_SESSION['identity']) && !isset($_SESSION['email'])){
    header('location: ./');
	  die();
}	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/mm.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
      .zoom {
  /* padding: 50px; */
  transition: transform .2s; /* Animation */
  /* width: 200px;
  height: 200px; */
  /* margin: 0 auto; */
}

.zoom:hover {
  transform: scale(1.1);
  background-color: #152238 ;
  color: white;
 /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

.tr {
  /* padding: 50px; */
  transition: transform .2s; /* Animation */
  /* width: 200px;
  height: 200px; */
  /* margin: 0 auto; */
}

.tr:hover {
    transform: scale(1.05);
    background-color:  #152238;
    color: black;
 /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
.color-elements
{
    background-color:  #152238;
}

        @font-face {
            font-family: 'myFirstFont';
        }
        body {
            background-color: #F5F7FA;
            font-family: 'myFirstFont';
        }
        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

/* Sidebar */
.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
padding: 58px 0 0; /* Height of navbar */
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
width: 240px;
z-index: 600;
}

@media (max-width: 991.98px) {
.sidebar {
width: 100%;
}
}
.sidebar .active {
border-radius: 5px;
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
position: relative;
top: 0;
height: calc(100vh - 48px);
padding-top: 0.5rem;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
@media (max-width: 1174px) {
    .fnee{
        display: flex;
        justify-content: center;
    }
  /* CSS that should be displayed if width is equal to or less than 800px goes here */
}
.fixed-logout {
  position: fixed;
  bottom: 20px;
  right: 25px;
  opacity: 0.75;
}

    </style>

</head>
<body>
    <!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark">
    <center><img src="./img/IIT_Madras_Logo.svg.png" width="30%"></img></center><br>
    <center><h6 class="text-white">Thermal Composition 4.0</h6></center>
    <div class="position-sticky bg-dark">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a onclick="window.location.href='dashboard?identity=<?php echo $_SESSION['identity']; ?>'" class="list-group-item list-group-item-action zoom bg-dark text-white">
          <i class="fas fa-tachometer-alt fa-fw me-3 mt-3"></i><span>Home</span>
        </a>
        <a href="javascript:alert('this page is currently under maintainance')" class="list-group-item list-group-item-action zoom bg-dark text-white"><i
            class="fa-solid fa-wrench fa-fw me-3 mt-3"></i><span>CNC Info</span>
        </a>
        <a onclick="window.location.href='reports'" class="list-group-item list-group-item-action zoom bg-dark text-white"><i
            class=" fas fa-search-plus fa-fw me-3 mt-3"></i><span>Reports</span>
        </a>
        <a onclick="window.location.href='graph'" class="list-group-item list-group-item-action zoom bg-dark text-white">
          <i class="fas fa-chart-line fa-fw me-3 mt-3"></i><span>Graph</span>
        </a>
        <a onclick="window.location.href='settings'" class="list-group-item list-group-item-action zoom bg-dark text-white"><i
            class="fas fa-cog fa-spin fa-fw me-3 mt-3"></i><span>Settings</span>
        </a>
      </div>
    </div>
    <center><p class="mt-5 text-white text-sm">©️ Dept. Mechanical, IIT Madras</p></center>
  </nav>
  <!-- Sidebar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="">
  <div class="container-fluid pt-2">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Dashboard</a>
                            <div class="d-flex ms-auto">
                                Welcome
                               <?php 
                                    echo $_SESSION['name']; 
                               ?> 
                            </div>
                    </div>
            </nav>  
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white"><span id="s1">NA</span>°C</h6>
                                        <span style="color:white;">Temperature 1</span>
                                </div>
                                <div class="ms-auto h1 pt-1 text-warning">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white"><span id="s2">NA</span>°C</h6>
                                        <span style="color:white;">Temperature 2</span>
                                </div>
                                <div class="ms-auto h1 pt-1 text-warning">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white"><span id="s3">NA</span>°C</h6>
                                        <span style="color:white;">Temperature 3</span>

                                </div>
                                <div class="ms-auto h1 pt-1 text-warning">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white"><span id="s4">NA</span> mm</h6>
                                        <span style="color:white;">Deflection</span>

                                </div>
                                <div class="ms-auto h1 pt-1 text-warning">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row mt-3 mb-2">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <center> <canvas id="myChart" style="width:100%;max-width:600px;max-height:400px"></canvas></center>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- <a href="logout.php" class="float"><img src="./img/logout.png" class="img-fluid" alt="logout"></a>  -->
            <div class="fixed-logout ml-auto">
                <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>                         
  </div>  
 
</main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>      
const ctx = document.getElementById('myChart');
const url = "http://localhost:81/machintell/data.php";
let s1 = [];
let s2 = [];
let s3 = [];
let date = [];
let mychart;

async function getchartdata() {
  const response = await fetch(url);
  const data = await response.json();
  s1.push(data.s1);
  s2.push(data.s2);
  s3.push(data.s3);
  date.push(data.date);

  if (mychart) {
    mychart.data.labels = date;
    mychart.data.datasets[0].data = s1;
    mychart.data.datasets[1].data = s2;
    mychart.data.datasets[2].data = s3;
    mychart.update();
  } else {
    mychart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: date,
        datasets: [
          {
            label: 'Temperature 1',
            data: s1,
            borderWidth: 1
          },
          {
            label: 'Temperature 2',
            data: s2,
            borderWidth: 1
          },{
            label: 'Temperature 3',
            data: s3,
            borderWidth: 1
          }
        ]
      },
      options: {}
    });
  }
}

setTimeout(getchartdata, 0);
setInterval(getchartdata, 10000);
            function startLiveUpdate(){
                const textViewCount1 = document.getElementById('s1');
                const textViewCount2 = document.getElementById('s2');
                const textViewCount3 = document.getElementById('s3');
                const textViewCount4 = document.getElementById('s4');
                setInterval(function() {
                  fetch(url).then(function(response){
                      return response.json();
                  }).then(function(data){
                      textViewCount1.textContent = data.s1;
                      textViewCount2.textContent = data.s2;
                      textViewCount3.textContent = data.s3;
                      textViewCount4.textContent = data.s4;
                    })
                }, 1000);
            }
              document.addEventListener('DOMContentLoaded', function (){
              startLiveUpdate();
            });
        </script>


</body>
</html>
