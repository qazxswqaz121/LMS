<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else { ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css2?family=Lexend:wght@400;600&display=swap' rel='stylesheet' type='text/css' />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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

      .hover-effect-blue {
        transition: background-color 0.3s ease;
      }

      .hover-effect-blue:hover {
        background-color: #99c7d3;
      }

      .chart-container {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 20px;
        height: auto;
        position: relative;
        margin-bottom: 30px;
        margin-top: 10px;
      }

      .chart-title {
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 20px;
      }
    </style>

  </head>

  <body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">ADMIN DASHBOARD</h4>

          </div>

        </div>

        <div class="row">
          <a href="manage-books.php">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="alert alert-success back-widget-set text-center hover-effect" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa-duotone fa-solid fa-book-open-cover fa-5x"></i>
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



          <a href="manage-issued-books.php">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="alert alert-warning back-widget-set text-center hover-effect-brown" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa-duotone fa-solid fa-house-person-return fa-5x"></i>
                <?php
                $sql2 = "SELECT id from tblissuedbookdetails where (RetrunStatus='' || RetrunStatus is null)";
                $query2 = $dbh->prepare($sql2);
                $query2->execute();
                $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                $returnedbooks = $query2->rowCount();
                ?>

                <h2 style="font-weight: bolder;"><?php echo htmlentities($returnedbooks); ?></h2>
                Books Not Returned Yet
              </div>
            </div>
          </a>

          <a href="reg-students.php">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="alert alert-success back-widget-set text-center hover-effect" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa-duotone fa-solid fa-users-medical fa-5x"></i>
                <?php
                $sql3 = "SELECT id from tblstudents ";
                $query3 = $dbh->prepare($sql3);
                $query3->execute();
                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                $regstds = $query3->rowCount();
                ?>
                <h2 style="font-weight: bolder;"><?php echo htmlentities($regstds); ?></h2>
                Registered Users
              </div>
            </div>
          </a>


          <a href="manage-authors.php">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="alert alert-info back-widget-set text-center hover-effect-blue" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa fa-user fa-5x"></i>
                <?php
                $sq4 = "SELECT id from tblauthors ";
                $query4 = $dbh->prepare($sq4);
                $query4->execute();
                $results4 = $query4->fetchAll(PDO::FETCH_OBJ);
                $listdathrs = $query4->rowCount();
                ?>
                <h2 style="font-weight: bolder;"><?php echo htmlentities($listdathrs); ?></h2>
                Authors Listed
              </div>
            </div>
          </a>

          <a href="manage-categories.php">
            <div class="col-md-6 col-sm-12 rscol-xs-12">
              <div class="alert alert-info back-widget-set text-center hover-effect-blue" style="border: none; border-radius: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                <i class="fa-duotone fa-solid fa-book-copy fa-5x"></i>
                <?php
                $sql5 = "SELECT id from tblcategory ";
                $query5 = $dbh->prepare($sql5);
                $query5->execute();
                $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
                $listdcats = $query5->rowCount();
                ?>

                <h2 style="font-weight: bolder;"><?php echo htmlentities($listdcats); ?> </h2>
                Listed Categories
              </div>
            </div>
          </a>
        </div>


        <div class="col-md-12 sm-12 xs-12 chart-container">
          <h4 class="chart-title">Admin OverView</h4>
          <canvas id="myStackedBarChart"></canvas>
        </div>


      </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

    <script>
      var data = {
        labels: ['Books Listed', 'Books Not Returned Yet', 'Registered Users', 'Authors Listed', 'Listed Categories'],
        datasets: [{
          label: 'Count',
          data: [
            <?php echo $listdbooks; ?>,
            <?php echo $returnedbooks; ?>,
            <?php echo $regstds; ?>,
            <?php echo $listdathrs; ?>,
            <?php echo $listdcats; ?>
          ],
          backgroundColor: [
            '#E1F5C4',
            '#EDE574',
            '#ACBB78',
            '#D7DDE8',
            '#757F9A'
          ],
          borderColor: [
            '#E1F5C4',
            '#EDE574',
            '#ACBB78',
            '#D7DDE8',
            '#757F9A'
          ],
          borderWidth: 2,
          borderRadius: 8,
          hoverBackgroundColor: [
            '#E1F5C4',
            '#EDE574',
            '#ACBB78',
            '#D7DDE8',
            '#757F9A'
          ],
          hoverBorderColor: [
            '#E1F5C4',
            '#EDE574',
            '#ACBB78',
            '#D7DDE8',
            '#757F9A'
          ],
          hoverBorderWidth: 3
        }]
      };

      var config = {
        type: 'bar',
        data: data,
        options: {
          responsive: true,
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
                generateLabels: function(chart) {
                  return chart.data.datasets[0].data.map(function(value, index) {
                    return {
                      text: chart.data.labels[index] + ': ' + value,
                      fillStyle: chart.data.datasets[0].backgroundColor[index]
                    };
                  });
                },
                onClick: function(e, legendItem, legend) {
                  // Toggle visibility of the corresponding dataset (bar)
                  var index = legendItem.index;
                  var meta = legend.chart.getDatasetMeta(0);
                  var isVisible = meta.data[index].hidden;

                  // Toggle the visibility of the particular bar
                  meta.data[index].hidden = !isVisible;

                  // Re-render the chart to reflect the changes
                  legend.chart.update();
                }
              }
            },
            tooltip: {
              mode: 'index',
              intersect: false,
              backgroundColor: '#F7F8F8',
              titleColor: '#000',
              bodyColor: '#000',
              footerColor: '#000',
              borderColor: '#000',
              borderWidth: 2,
              displayColors: false,
            }
          },
          scales: {
            x: {
              stacked: true,
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
              stacked: true,
              beginAtZero: true,
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
          }
        }
      };

      var ctx = document.getElementById('myStackedBarChart').getContext('2d');
      var myChart = new Chart(ctx, config);
    </script>



  </body>

  </html>
<?php } ?>