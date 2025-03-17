<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css2?family=Lexend:wght@400;600&display=swap' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
      href="/css/app-wa-8fd54642150959ca86965e194f04945a.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-thin.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-light.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-thin.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-light.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-thin.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-light.css">

    <link href='https://fonts.googleapis.com/css2?family=Lexend:wght@400;600&display=swap' rel='stylesheet' type='text/css' />


    <style>
      body {
        font-family: 'Lexend', sans-serif;
        
      }

      .hover-effect {
        transition: background-color 0.3s ease;
      }

      .hover-effect:hover {
        background-color: #e0f7fa;
      }

      .hover-effect-brown {
        transition: background-color 0.3s ease;
      }

      .hover-effect-brown:hover {
        background-color: #d3c4b0;
      }

      /* Optional: Add padding inside charts */
      #pieChart,
      #barChart {
        height: 100%;
        width: 100%;
      }

      .chart-count {
        position: absolute;
        top: 40%;
        left: 40%;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        font-weight: bold;
        color: #fff;
      }

      .chart-container {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 20px;
        height: 350px;
        position: relative;
        margin-bottom: 30px;
      }

      .chart-title {
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 20px;
      }

      .chart-container {
        margin-bottom: 30px;
        /* Adds space below each chart */
      }

      /* Optionally, you can add more responsive adjustments if needed */
      @media (max-width: 768px) {

        .chart-container-left,
        .chart-container-right {
          margin-right: 0;
          margin-left: 0;
        }
      }
    </style>

  </head>

  <body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper"  style="margin-top: 100px;">
      <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">USER DASHBOARD</h4>

          </div>

        </div>

        <div class="row">
          <a href="listed-books.php">
            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="alert alert-success back-widget-set text-center hover-effect" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa-duotone fa-solid fa-books fa-5x"></i>
                <?php
                $sql = "SELECT id from tblbooks ";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $listdbooks = $query->rowCount();
                ?>
                <h2 style="font-weight: bolder;"><?php echo htmlentities($listdbooks); ?></h2>
                Books Listed
              </div>
            </div>
          </a>

          <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="alert alert-warning back-widget-set text-center hover-effect-brown" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
              <i class="fa-duotone fa-solid fa-house-person-return fa-5x"></i>
              <?php
              $rsts = 0;
              $sid = $_SESSION['stdid'];
              $sql2 = "SELECT id from tblissuedbookdetails where StudentID=:sid and (RetrunStatus=:rsts || RetrunStatus is null || RetrunStatus='')";
              $query2 = $dbh->prepare($sql2);
              $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
              $query2->bindParam(':rsts', $rsts, PDO::PARAM_STR);
              $query2->execute();
              $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
              $returnedbooks = $query2->rowCount();
              ?>

              <h2 style="font-weight: bolder;"><?php echo htmlentities($returnedbooks); ?></h2>
              Books Not Returned Yet
            </div>
          </div>

          <?php

          $ret = $dbh->prepare("SELECT id from tblissuedbookdetails where StudentID=:sid");
          $ret->bindParam(':sid', $sid, PDO::PARAM_STR);
          $ret->execute();
          $results22 = $ret->fetchAll(PDO::FETCH_OBJ);
          $totalissuedbook = $ret->rowCount();
          ?>


          <a href="issued-books.php">
            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="alert alert-success back-widget-set text-center hover-effect" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa-duotone fa-solid fa-book-user fa-5x"></i>
                <h2 style="font-weight: bolder;"><?php echo htmlentities($totalissuedbook); ?></h2>
                Total Issued Books
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 chart-container">
          <h4 class="chart-title">Books Overview</h4>
          <canvas id="horizontalBarChart"></canvas>
          <!-- <div class="chart-count"><?php echo $listdbooks; ?> Books</div> -->
        </div>

        <div class="col-md-6 col-sm-4 col-xs-6 chart-container">
          <h4 class="chart-title">Issued <span style="color: red;"> vs </span>Returned Books</h4>
          <canvas id="barChart"></canvas>
          <!-- <div class="chart-count"><?php echo $totalissuedbook; ?> Books</div> -->
        </div>


      </div>  
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

    <!-- Chart.js -->

    <script>
      // Pie Chart - Books Overview
      // var ctxPie = document.getElementById('pieChart').getContext('2d');
      // var pieChart = new Chart(ctxPie, {
      //   type: 'line',
      //   data: {
      //     labels: ['Books Listed', 'Books Not Returned Yet', 'Books Returned'],
      //     datasets: [{
      //       label: 'Books Statistics',
      //       data: [<?php echo $listdbooks; ?>, <?php echo $returnedbooks; ?>, <?php echo ($totalissuedbook - $returnedbooks); ?>],
      //       backgroundColor: ['#36a2eb', '#ffcc00', '#4caf50'],
      //       borderColor: ['#36a2eb', '#ffcc00', '#4caf50'],
      //       borderWidth: 2
      //     }]
      //   },
      //   options: {
      //     responsive: true,
      //     plugins: {
      //       legend: {
      //         position: 'top',
      //       },
      //       tooltip: {
      //         callbacks: {
      //           label: function(tooltipItem) {
      //             return tooltipItem.label + ': ' + tooltipItem.raw + ' books';
      //           }
      //         }
      //       }
      //     }
      //   }
      // });


      var ctxHorizontalBar = document.getElementById('horizontalBarChart').getContext('2d');
      var horizontalBarChart = new Chart(ctxHorizontalBar, {
        type: 'bar',
        data: {
          labels: ['Books Listed', 'Not Returned', 'Books Returned'],
          datasets: [{
            label: 'Books Statistics',
            data: [<?php echo $listdbooks; ?>, <?php echo $returnedbooks; ?>, <?php echo ($totalissuedbook - $returnedbooks); ?>],
            backgroundColor: ['#1a7741', '#799F0C', '#ACBB78'],
            borderColor: ['#1a7741', '#799F0C', '#ACBB78'],
            borderWidth: 2,
            borderRadius: 8,
            hoverBackgroundColor: ['#155d34', '#6d8107', '#6e8b50'],
            hoverBorderColor: ['#155d34', '#6d8107', '#6e8b50'],
            hoverBorderWidth: 3,
            borderSkipped: 'left',
            borderJoinStyle: 'round',
            borderWidth: 4
          }]
        },
        options: {
          responsive: true,
          indexAxis: 'y',
          scales: {
            x: {
              beginAtZero: true,
              grid: {
                color: 'rgba(0, 0, 0, 0.1)',
                borderColor: 'rgba(0, 0, 0, 0.1)',
                borderWidth: 1,
                tickColor: 'rgba(0, 0, 0, 0.1)',
              },
              ticks: {
                font: {
                  size: 14,
                  family: 'lexend',
                  weight: 'bold',
                  color: '#333'
                },
                stepSize: 10
              }
            },
            y: {
              grid: {
                color: 'rgba(0, 0, 0, 0.1)',
              },
              ticks: {
                font: {
                  size: 14,
                  family: 'lexend',
                  weight: 'bold',
                  color: '#333'
                }
              }
            }
          },
          plugins: {
            legend: {
              position: 'top',
              labels: {
                font: {
                  size: 14,
                  family: 'lexend',
                  weight: 'bold',
                  color: '#555'
                },
                padding: 20,
              }
            },
            tooltip: {
              backgroundColor: '#F7F8F8',
              titleColor: '#000',
              bodyColor: '#000',
              footerColor: '#000',
              borderColor: '#000',
              borderWidth: 2,
              displayColors: false,
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw + ' books';
                }
              }
            }
          }
        }
      });



      // Bar Chart - Issued vs Returned Books
      var ctxBar = document.getElementById('barChart').getContext('2d');
      var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
          labels: ['Issued Books', 'Returned Books'],
          datasets: [{
            label: 'Books Statistics',
            data: [<?php echo $totalissuedbook; ?>, <?php echo ($totalissuedbook - $returnedbooks); ?>],
            backgroundColor: ['#603813', '#b29f94'],
            borderColor: ['#603813', '#b29f94'],
            borderWidth: 2,
            borderRadius: 10,
            hoverBackgroundColor: ['#4e2b1f', '#9f8e7b'],
            hoverBorderColor: ['#4e2b1f', '#9f8e7b'],
            hoverBorderWidth: 3,
            borderSkipped: 'bottom',
            borderJoinStyle: 'round',
          }]
        },
        options: {
          responsive: true,
          scales: {
            x: {
              ticks: {
                font: {
                  size: 14,
                  family: 'lexend',
                  weight: 'bold',
                  color: '#333',
                }
              },
              grid: {
                color: 'rgba(0, 0, 0, 0.1)',
                borderColor: 'rgba(0, 0, 0, 0.1)',
                borderWidth: 1,
                tickColor: 'rgba(0, 0, 0, 0.1)',
              }
            },
            y: {
              beginAtZero: true,
              ticks: {
                font: {
                  size: 14,
                  family: 'lexend',
                  weight: 'bold',
                  color: '#333',
                }
              },
              grid: {
                color: 'rgba(0, 0, 0, 0.1)',
              }
            }
          },
          plugins: {
            legend: {
              position: 'top',
              labels: {
                font: {
                  size: 16,
                  family: 'lexend',
                  weight: 'bold',
                  color: '#555',
                },
                padding: 20
              }
            },
            tooltip: {
              backgroundColor: '#F7F8F8',
              titleColor: '#000',
              bodyColor: '#000',
              footerColor: '#000',
              borderColor: '#000',
              borderWidth: 2,
              displayColors: false,
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ': ' + tooltipItem.raw + ' books';
                }
              }
            }
          }
        }
      });
    </script>

  </body>

  </html>
<?php } ?>