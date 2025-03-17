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
        <title>Online Library Management System | Manage Reg Students</title>
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
                max-width: 1800px;
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
                border-bottom: 2px solid #e0e0e0;
                font-size: 14px;
                color: #000;
            }

            .table thead {
                background-color: #9c6ee0;
                color: white;
                padding: 15px;
                text-align: center;
                font-weight: bold;
                font-size: 14 px;
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

            /* Focus effect on table row (accessibility) */
            .table tbody tr:focus {
                outline: 3px solid #9c6ee0;
                background-color: #eaf1fe;
            }

            /* Toggle Switch */
            .switch-container {
                display: flex;
                flex-direction: column;
                /* Stack items vertically */
                align-items: center;
                /* Center everything */
                gap: 5px;
                /* Space between switch and text */
            }

            .switch {
                position: relative;
                display: inline-block;
                width: 40px;
                /* Decrease width */
                height: 20px;
                /* Decrease height */
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #f44336;
                /* Default: Red (Blocked) */
                transition: .4s;
                border-radius: 50px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 14px;
                /* Smaller circle */
                width: 14px;
                border-radius: 50%;
                left: 3px;
                bottom: 3px;
                background-color: white;
                transition: .4s;
            }

            /* Toggle ON (Green when Active) */
            input:checked+.slider {
                background-color: #4CAF50;
                /* Green */
            }

            /* Move slider to the right when Active */
            input:checked+.slider:before {
                transform: translateX(20px);
            }

            /* Disabled Toggle */
            input:disabled+.slider {
                cursor: not-allowed;
            }

            /* Disabled (Blocked: Red) */
            input:disabled:not(:checked)+.slider {
                background-color: #f44336;
                /* Red */
            }

            /* Disabled (Active: Green) */
            input:disabled:checked+.slider {
                background-color: #4CAF50;
                /* Green */
            }

            /* Text Below the Switch */
            .status-text {
                font-weight: bold;
                font-size: 12px;
                /* Smaller text */
                color: #fff;
                /* Default color */
                text-align: center;
            }



            .tooltip-container {
                position: relative;
                display: inline-block;
                cursor: pointer;
            }

            .tooltip-container .tooltip-text {
                visibility: hidden;
                width: 70px;
                background-color: #000;
                color: #fff;
                text-align: center;
                padding: 5px;
                border-radius: 5px;
                position: absolute;
                z-index: 1;
                top: 125%;
                /* Position above */
                left: 50%;
                transform: translateX(-50%);
                opacity: 0;
                transition: opacity 0.3s;
                font-size: 12px;
            }

            /* Show tooltip on hover */
            .tooltip-container:hover .tooltip-text {
                visibility: visible;
                opacity: 1;
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
                        <h4 class="header-line">Manage Reg Students</h4>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="container1">
                            <div class="heading">
                                Reg Students
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Email id </th>
                                            <th>Mobile Number</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT * from tblstudents";
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
                                                    <td class="center"><?php echo htmlentities($result->EmailId); ?></td>
                                                    <td class="center"><?php echo htmlentities($result->MobileNumber); ?></td>
                                                    <td class="center"><?php echo htmlentities($result->RegDate); ?></td>
                                                    <td class="center">
                                                        <div class="switch-container">
                                                            <label class="switch">
                                                                <input type="checkbox" <?php echo ($result->Status == 1) ? 'checked' : ''; ?> disabled>
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <span class="status-text" style="color: <?php echo ($result->Status == 1) ? '#4CAF50' : '#f44336'; ?>;">
                                                                <?php echo ($result->Status == 1) ? "Active" : "Blocked"; ?>
                                                            </span>
                                                        </div>


                                                    </td>
                                                    <td class="center">
                                                        <?php if ($result->Status == 1) { ?>
                                                            <span class="tooltip-container">
                                                                <a href="reg-students.php?inid=<?php echo htmlentities($result->id); ?>"
                                                                    onclick="return confirm('Are you sure you want to block this student?');">
                                                                    <i class="fa-duotone fa-solid fa-ban fa-2x" style="--fa-primary-color: #e61e1e; --fa-secondary-color: #ec5f5f; --fa-secondary-opacity: 0.5;"></i>                                                                </a>
                                                                <span class="tooltip-text">Block</span>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span class="tooltip-container">
                                                                <a href="reg-students.php?id=<?php echo htmlentities($result->id); ?>"
                                                                    onclick="return confirm('Are you sure you want to activate this student?');">
                                                                    <i class="fa-duotone fa-solid fa-user-unlock fa-2x" style="--fa-primary-color: #799F0C; --fa-secondary-color: #ACBB78;"></i>                                                                </a>
                                                                <span class="tooltip-text">Unlock</span>
                                                            </span>
                                                        <?php } ?>

                                                        &nbsp; &nbsp; 
                                                        <span class="tooltip-container">
                                                            <a href="student-history.php?stdid=<?php echo htmlentities($result->StudentId); ?>">
                                                                <i class="fa-solid fa-square-info fa-2x" style="color: #63E6BE;"></i>
                                                            </a>
                                                            <span class="tooltip-text">Info</span>
                                                        </span>
                                                    </td>

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