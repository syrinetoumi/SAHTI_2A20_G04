


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin Template by Tooplate.com</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../../asset/backoffice/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/tooplate.css">
</head>

<body id="reportsPage">
    
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                       <!-- <a class="navbar-brand" href="#">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>-->
                        <div class="logo">
                            <img src="../../asset/backoffice/img/logo.png" class="imglogo" alt="">
                       </div>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                   
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Daily Report</a>
                                        <a class="dropdown-item" href="#">Weekly Report</a>
                                        <a class="dropdown-item" href="#">Yearly Report</a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="listuseradmin.php">Liste user</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        parametre
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="../../View/backoffice/profileAdmin.php">Profile</a>
                                     
                                    </div>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="login.html">
                                       <div class="hov"> <i class="far fa-user mr-2 tm-logout-icon" id="c1"></i>
                                        <span id="log"><a href="../../View/backoffice/login.php">Deconnecter</a></span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
           
                
                <div class="tm-col tm-col-small">
                <?php
include '../../Controller/userC.php';
include '../../model/user.php';

$userController = new userC();

// Get role statistics
$roleStatistics = $userController->getRoleStatistics();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<br><br><br><br>
<body>
    <h2 class="tm-block-title">Nombre d'utilisateur</h2>

    <!-- Canvas to render the bar chart -->
    <canvas id="roleChart" width="400" height="200"></canvas>

    <script>
        // PHP data to JavaScript
        var roleData = <?php echo json_encode($roleStatistics); ?>;

        // Chart.js
        var ctx = document.getElementById('roleChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(roleData),
                datasets: [{
                    label: 'Role Percentage',
                    data: Object.values(roleData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>
</html>

    </div>
                
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2023/2024 Esprit école sup privée
                      <!--  <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>-->
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../asset/backoffice/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../../asset/backoffice/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="../../asset/backoffice/js/utils.js"></script>
    <script src="../../asset/backoffice/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="../../asset/backoffice/js/fullcalendar.min.js"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="../../asset/backoffice/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="../../asset/backoffice/js/tooplate-scripts.js"></script>
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function () {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>
</html>