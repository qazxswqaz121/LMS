<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $sid = $_SESSION['stdid'];
        $fname = $_POST['fullanme'];
        $mobileno = $_POST['mobileno'];

        $sql = "update tblstudents set FullName=:fname,MobileNumber=:mobileno where StudentId=:sid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':sid', $sid, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->execute();

        echo '<script>alert("Your profile has been updated")</script>';
    }

?>

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
        <title>Online Library Management System | Student Signup</title>
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
                color: #fff;
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

            .form-group1 {
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 1.2em;
                font-weight: 600;
            }

            .profile-card {
                background: white;
                padding: 20px;
                border-radius: 20px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                margin-bottom: 20px;
            }

        </style>

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper" style="margin-top: 100px;">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">My Profile</h4>

                    </div>

                </div>
                <div class="row">

                    <div class="col-md-9 col-md-offset-3">
                        <div class="container1">
                            <div class="heading">
                                My Profile
                            </div>
                            <div class="panel-body">
                                <form name="signup" class="form" method="post">
                                    <?php
                                    $sid = $_SESSION['stdid'];
                                    $sql = "SELECT StudentId,FullName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  tblstudents  where StudentId=:sid ";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>

                                            <div class="profile-card">

                                            <div class="form-group1">
                                                <label>Student ID : </label>
                                                <?php echo htmlentities($result->StudentId); ?>
                                            </div>

                                            <div class="form-group1">
                                                <label>Reg Date : </label>
                                                <?php echo htmlentities($result->RegDate); ?>
                                            </div>
                                            <?php if ($result->UpdationDate != "") { ?>
                                                <div class="form-group1">
                                                    <label>Last Updation Date : </label>
                                                    <?php echo htmlentities($result->UpdationDate); ?>
                                                </div>
                                            <?php } ?>


                                            <div class="form-group1">
                                                <label>Profile Status : </label>
                                                <?php if ($result->Status == 1) { ?>
                                                    <span style="color: green">Active</span>
                                                <?php } else { ?>
                                                    <span style="color: red">Blocked</span>
                                                <?php } ?>
                                            </div>

                                            </div>


                                            <div class="form-group">
                                                <label>Enter Full Name</label>
                                                <input class="input" type="text" name="fullanme" value="<?php echo htmlentities($result->FullName); ?>" autocomplete="off" required />
                                            </div>


                                            <div class="form-group">
                                                <label>Mobile Number :</label>
                                                <input class="input" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber); ?>" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Enter Email</label>
                                                <input class="input" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId); ?>" autocomplete="off" required readonly />
                                            </div>
                                    <?php }
                                    } ?>

                                    <button type="submit" name="update" class="login-button" id="submit">Update Now </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <?php include('includes/footer.php'); ?>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>