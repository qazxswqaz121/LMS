<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    // code for block student    
    if (isset($_GET['inid'])) {
        $id = $_GET['inid'];
        $status = 0;
        $sql = "update tblstudents set Status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:reg-students.php');
    }



    //code for active students
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = 1;
        $sql = "update tblstudents set Status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:reg-students.php');
    }


?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Student History</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- DATATABLE STYLE  -->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
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


        <style>
            .container1 {
                max-width: auto;
                background: #F8F9FD;
                background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
                border-radius: 40px;
                padding: 25px 35px;
                border: 5px solid rgb(255, 255, 255);
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                margin: 20px;
            }

            .heading {
                text-align: center;
                font-weight: 900;
                font-size: 30px;
                color: #9c6ee0;
            }

            /* Table Styles */
            .table {
                width: 100%;
                margin-bottom: 20px;
                border-collapse: collapse;
                border-radius: 10px;
                overflow: hidden;
            }


            .table td {
                padding: 15px;
                text-align: center;
                border-bottom: 1px solid #e0e0e0;
                font-size: 14px;
                color: #000;
            }

            .table thead {
                background-color: #9c6ee0;
                color: white;
                padding: 15px;
                text-align: center;
                font-weight: bold;
                font-size: 14px;
                text-transform: uppercase;
            }

            .table th {
                background-color: #9c6ee0;
                color: white;
                padding: 15px;
                text-align: center;
                font-weight: bold;
                font-size: 14px;
                text-transform: uppercase;
            }

            /* Table Row Hover Effect */
            .table tbody tr:hover {
                background-color: #f5f5f5;
                cursor: pointer;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -5px;
            }

            .table tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .table tbody tr:nth-child(even) {
                background-color: #f1f1f1;
            }

            /* Action Buttons (Edit/Delete) */
            .table .btn {
                padding: 8px 16px;
                font-size: 14px;
                border-radius: 35px;
                transition: background-color 0.3s ease;
            }

            .table .btn-primary {
                background-color: #007bff;
                color: white;
            }

            .table .btn-primary:hover {
                background-color: #0056b3;
            }

            .table .btn-danger {
                background-color: #dc3545;
                color: white;
            }

            .table .btn-danger:hover {
                background-color: #c82333;
            }

            /* Active/Inactive Status */
            .btn-success {
                background-color: #28a745;
                color: white;
                padding: 5px 12px;
                border-radius: 15px;
                text-align: center;
            }

            .btn-danger {
                background-color: #dc3545;
                color: white;
                padding: 5px 12px;
                border-radius: 15px;
                text-align: center;
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
                        <?php $sid = $_GET['stdid']; ?>
                        <h4 class="header-line">#<?php echo $sid; ?> Book Issued History</h4>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="container1">
                            <div class="heading">

                                <?php echo $sid; ?> Details
                            </div>
                                <div class="table-responsive">
                                    <table class="table  table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Issued Book </th>
                                                <th>Issued Date</th>
                                                <th>Returned Date</th>
                                                <th>Fine (if any)</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "SELECT tblstudents.StudentId ,tblstudents.FullName,tblstudents.EmailId,tblstudents.MobileNumber,tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine,tblissuedbookdetails.RetrunStatus,tblbooks.id as bid,tblbooks.bookImage from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId='$sid' ";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->StudentId); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->FullName); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->BookName); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->IssuesDate); ?></td>
                                                        <td class="center"><?php if ($result->ReturnDate == ''): echo "Not returned yet";
                                                                            else: echo htmlentities($result->ReturnDate);
                                                                            endif; ?></td>
                                                        <td class="center"><?php if ($result->ReturnDate == ''): echo "Not returned yet";
                                                                            else: echo $result->fine;
                                                                            endif;
                                                                            ?></td>


                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                        <!--End Advanced Tables -->
                    </div>
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
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>