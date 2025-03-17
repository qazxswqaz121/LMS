<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from tblbooks  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Category deleted scuccessfully ";
        header('location:manage-books.php');
    }


?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Manage Books</title>
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

            /* Focus effect on table row (accessibility) */
            .table tbody tr:focus {
                outline: 3px solid #9c6ee0;
                background-color: #eaf1fe;
            }

            /* Toggle Switch */
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
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
                /* Red for both Active and Inactive */
                transition: .4s;
                border-radius: 50px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                border-radius: 50px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
            }

            input:checked+.slider {
                /* The background will still be red, you can keep it the same for both states */
                background-color: #4CAF50;
                /* Red for both Active and Inactive */
            }

            input:checked+.slider:before {
                /* Move the slider to the right when Active */
                transform: translateX(26px);
            }

            f44336

            /* No change to background for inactive state as well */
            input:disabled+.slider {
                background-color: #f44336;
                /* Red for both Active and Inactive */
            }

            input:disabled+.slider:before {
                background-color: white;
            }

            .tooltip-container {
                position: relative;
                display: inline-block;
                cursor: pointer;
            }

            .tooltip-container .tooltip-text {
                visibility: hidden;
                width: 70px;
                background-color: #F7F8F8;
                color: #000;
                text-align: center;
                padding: 5px;
                border-radius: 25px;
                position: absolute;
                z-index: 1;
                top: 125%;
                /* Position below */
                left: 50%;
                transform: translateX(-50%);
                opacity: 0;
                transition: opacity 0.3s;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            }

            /* Show tooltip on hover */
            .tooltip-container:hover .tooltip-text {
                visibility: visible;
                opacity: 1;
            }


            .table img {
                width: 100px;
                height: auto;
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
                        <h4 class="header-line">Manage Books</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="container1">
                            <div class="heading">
                                Books Listing
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Book</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>ISBN</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT tblbooks.BookName, tblcategory.CategoryName, tblauthors.AuthorName, tblbooks.ISBNNumber, tblbooks.BookPrice, tblbooks.id as bookid, tblbooks.bookImage 
                FROM tblbooks 
                JOIN tblcategory ON tblcategory.id=tblbooks.CatId 
                JOIN tblauthors ON tblauthors.id=tblbooks.AuthorId";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;

                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) { ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center" width="300">
                                                            <img src="bookimg/<?php echo htmlentities($result->bookImage); ?>" width="100" style="border: 2px solid #000;">
                                                            <br /><b><?php echo htmlentities($result->BookName); ?></b>
                                                        </td>
                                                        <!-- <td class="center"><b><?php echo htmlentities($result->BookName); ?></b></td> -->
                                                        <td class="center" style="margin-top: 50px;"><?php echo htmlentities($result->CategoryName); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->AuthorName); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->ISBNNumber); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->BookPrice); ?></td>
                                                        <!-- <td class="center">
                                                            <a href="edit-book.php?bookid=<?php echo htmlentities($result->bookid); ?>">
                                                                <button class="btn btn-primary">
                                                                    <i class="fa fa-edit"></i> Edit
                                                                </button>
                                                            </a>
                                                            <a href="manage-books.php?del=<?php echo htmlentities($result->bookid); ?>"
                                                                onclick="return confirm('Are you sure you want to delete?');">
                                                                <button class="btn btn-danger">
                                                                    <i class="fa fa-pencil"></i> Delete
                                                                </button>
                                                            </a>
                                                        </td> -->

                                                        <td class="center">
                                                            <span class="tooltip-container">
                                                                <a href="edit-book.php?bookid=<?php echo htmlentities($result->bookid); ?>">
                                                                    <i class="fa-duotone fa-solid fa-pen-circle fa-2x" style="--fa-primary-color: #85b0f9; --fa-secondary-color: #85b0f9;"></i>
                                                                </a>
                                                                <span class="tooltip-text">Edit</span>
                                                            </span>
                                                            <span class="tooltip-container">
                                                                <a href="manage-books.php?del=<?php echo htmlentities($result->bookid); ?>" onclick="return confirm('Are you sure you want to delete?');">
                                                                    <i class="fa-duotone fa-solid fa-trash-can-slash fa-2x" style="--fa-primary-color: #e42807; --fa-secondary-color: #e42807;"></i>
                                                                </a>
                                                                <span class="tooltip-text">Delete</span>
                                                            </span>
                                                        </td>

                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>

                                </div>

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