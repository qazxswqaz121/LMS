<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['create'])) {
        $category = $_POST['category'];
        $status = $_POST['status'];
        $sql = "INSERT INTO  tblcategory(CategoryName,Status) VALUES(:category,:status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $_SESSION['msg'] = "Brand Listed successfully";
            header('location:manage-categories.php');
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again";
            header('location:manage-categories.php');
        }
    }
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Add Categories</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href='https://fonts.googleapis.com/css2?family=Lexend:wght@400;600&display=swap' rel='stylesheet' type='text/css' />

        <style>
            .container1 {
                max-width: 550px;
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

            .form .input {
                width: 100%;
                background: white;
                border: none;
                padding: 15px 20px;
                border-radius: 20px;
                margin-top: 25px;
                box-shadow: rgb(196, 173, 231) 0px 10px 10px -5px;
                border-inline: 2px solid transparent;
            }

            .form .input::-moz-placeholder {
                color: rgb(170, 170, 170);
            }

            .form .input::placeholder {
                color: rgb(170, 170, 170);
            }

            .form .input:focus {
                outline: none;
                border-inline: 2px solid #9c6ee0;
            }

            .form .login-button {
                display: block;
                width: 100%;
                font-weight: bold;
                background: linear-gradient(45deg, #9400D3 0%, #4B0082 100%);
                color: white;
                padding-block: 15px;
                margin: 20px auto;
                border-radius: 20px;
                box-shadow: rgba(148, 0, 211, 0.6) 0px 20px 10px -15px, rgba(75, 0, 130, 0.6) 0px 20px 10px -15px;
                border: none;
                transition: all 0.2s ease-in-out;
            }

            .form .login-button:hover {
                transform: scale(1.03);
                box-shadow: rgba(148, 0, 211, 0.6) 0px 23px 10px -20px, rgba(75, 0, 130, 0.6) 0px 23px 10px -20px;
            }

            .form .login-button:active {
                transform: scale(0.95);
                box-shadow: rgba(148, 0, 211, 0.6) 0px 15px 10px -10px, rgba(75, 0, 130, 0.6) 0px 15px 10px -10px;
            }


            .radio-input {
                display: flex;
                flex-direction: row;
                font-size: 14px;
                font-weight: 400;
                color: black;
                height: 50px;
            }

            .radio-input input[type="radio"] {
                display: none;
            }

            .radio-input label {
                display: flex;
                align-items: center;
                padding: 10px;
                border: 1px solid #ccc;
                background-color: #FBED96;
                border-radius: 5px;
                margin-right: 12px;
                cursor: pointer;
                position: relative;
                transition: all 0.3s ease-in-out;
            }

            .radio-input label:before {
                content: "";
                display: block;
                position: absolute;
                top: 50%;
                left: 0;
                transform: translate(-50%, -50%);
                width: 14px;
                height: 14px;
                border-radius: 50%;
                background-color: #fff;
                border: 2px solid #ccc;
                transition: all 0.3s ease-in-out;
            }

            .radio-input input[type="radio"]:checked+label:before {
                background-color: green;
                top: 0;
            }

            .radio-input input[type="radio"]:checked+label {
                background-color: royalblue;
                color: #fff;
                border-color: rgb(129, 235, 129);
                animation: radio-translate 0.5s ease-in-out;
            }

            @keyframes radio-translate {
                0% {
                    transform: translateX(0);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateX(0);
                }
            }
        </style>


    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class=" content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class=" container1">
                        <div class="heading">
                           Add Category
                        </div>
                        <form role="form" class="form" method="post">
                            <div class="form-group">
                                <input class="input" type="text" name="category" autocomplete="off" placeholder="New Category Name" required />
                            </div>

                            <div class="form-group" style="display: flex; justify-content:center; ">
                                <label style="font-size: medium;">Status</label>
                            </div>

                            <div class="form-group" style="display: flex; justify-content:center; ">
                                <div class="radio-input">
                                    <input value="1" name="status" id="1" type="radio" checked="checked">
                                    <label for="1">Active</label>
                                    <input value="0" name="status" id="0" type="radio">
                                    <label for="0">Inactive</label>
                                </div>

                            </div>
                            <!-- <input class="login-button" name="create" type="submit" value="Add Category"> -->
                            <button type="submit" name="create" class="login-button">Create </button>

                        </form>
                    </div>
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
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>