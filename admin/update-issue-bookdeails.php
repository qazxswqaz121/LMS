<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['return'])) {
        $rid = intval($_GET['rid']);
        $fine = $_POST['fine'];
        $rstatus = 1;
        $bookid = $_POST['bookid'];
        $sql = "update tblissuedbookdetails set fine=:fine,RetrunStatus=:rstatus where id=:rid;
update tblbooks set isIssued=0 where id=:bookid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':rid', $rid, PDO::PARAM_STR);
        $query->bindParam(':fine', $fine, PDO::PARAM_STR);
        $query->bindParam(':rstatus', $rstatus, PDO::PARAM_STR);
        $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
        $query->execute();

        $_SESSION['msg'] = "Book Returned successfully";
        header('location:manage-issued-books.php');
    }
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Issued Book Details</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
                max-width: 800px;
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
        </style>

        <script>
            // function for get student name
            function getstudent() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "get_student.php",
                    data: 'studentid=' + $("#studentid").val(),
                    type: "POST",
                    success: function(data) {
                        $("#get_student_name").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }

            //function for book details
            function getbook() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "get_book.php",
                    data: 'bookid=' + $("#bookid").val(),
                    type: "POST",
                    success: function(data) {
                        $("#get_book_name").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
        <style type="text/css">
            .others {
                color: red;
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
                        <h4 class="header-line">Issued Book Details</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-2">
                        <div class="container1">
                            <div class="heading">
                                Issued Book Details
                            </div>
                            <div class="panel-body">
                                <form role="form" class="form" method="post">
                                    <?php
                                    $rid = intval($_GET['rid']);
                                    $sql = "SELECT tblstudents.StudentId ,tblstudents.FullName,tblstudents.EmailId,tblstudents.MobileNumber,tblbooks.BookName,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine,tblissuedbookdetails.RetrunStatus,tblbooks.id as bid,tblbooks.bookImage from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblissuedbookdetails.id=:rid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':rid', $rid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>



                                            <input type="hidden" name="bookid" value="<?php echo htmlentities($result->bid); ?>">
                                            <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
                                                <div class="form-group">
                                                    <h4 style="margin-top: 10px; font-weight: bold;">Student Details</h4>
                                                    <hr />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student ID :</label>
                                                    <?php echo htmlentities($result->StudentId); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Name :</label>
                                                    <?php echo htmlentities($result->FullName); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Email Id :</label>
                                                    <?php echo htmlentities($result->EmailId); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Contact No :</label>
                                                    <?php echo htmlentities($result->MobileNumber); ?>
                                                </div>
                                            </div>


                                            <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
                                                <div class="form-group">
                                                    <h4 style="margin-top: 10px; font-weight: bold;">Book Details</h4>
                                                    <hr />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img src="bookimg/<?php echo htmlentities($result->bookImage); ?>" width="140">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Name :</label>
                                                    <?php echo htmlentities($result->BookName); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ISBN :</label>
                                                    <?php echo htmlentities($result->ISBNNumber); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Issued Date :</label>
                                                    <?php echo htmlentities($result->IssuesDate); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Returned Date :</label>
                                                    <?php if ($result->ReturnDate == "") {
                                                        echo htmlentities("Not Return Yet");
                                                    } else {


                                                        echo htmlentities($result->ReturnDate);
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fine (in INR-₹) :</label>
                                                    <?php
                                                    if ($result->fine == "") { ?>
                                                        <input class="input" type="text" name="fine" placeholder="Enter Fine in INR(₹)" id="fine" required />

                                                    <?php } else {
                                                        echo htmlentities($result->fine);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php if ($result->RetrunStatus == 0) { ?>

                                                <button type="submit" name="return" id="submit" class="login-button">Return Book </button>

                            </div>

                <?php }
                                        }
                                    } ?>
                </form>
                        </div>
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