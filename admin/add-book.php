<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['add'])) {
        $bookname = $_POST['bookname'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $price = $_POST['price'];
        $bookimg = $_FILES["bookpic"]["name"];
        $bqty = $_POST['bqty'];
        // get the image extension
        $extension = substr($bookimg, strlen($bookimg) - 4, strlen($bookimg));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        //rename the image file
        $imgnewname = md5($bookimg . time()) . $extension;
        // Code for move image into directory

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            move_uploaded_file($_FILES["bookpic"]["tmp_name"], "bookimg/" . $imgnewname);
            $sql = "INSERT INTO  tblbooks(BookName,CatId,AuthorId,ISBNNumber,BookPrice,bookImage,bookQty) VALUES(:bookname,:category,:author,:isbn,:price,:imgnewname,:bqty)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
            $query->bindParam(':category', $category, PDO::PARAM_STR);
            $query->bindParam(':author', $author, PDO::PARAM_STR);
            $query->bindParam(':isbn', $isbn, PDO::PARAM_STR);
            $query->bindParam(':price', $price, PDO::PARAM_STR);
            $query->bindParam(':imgnewname', $imgnewname, PDO::PARAM_STR);
            $query->bindParam(':bqty', $bqty, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('Book Listed successfully');</script>";
                echo "<script>window.location.href='manage-books.php'</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again');</script>";
                echo "<script>window.location.href='manage-books.php'</script>";
            }
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
        <title>Online Library Management System | Add Book</title>
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

            /* Customize file input to match existing design */
            .form .file-input {
                width: 100%;
                background: white;
                border: none;
                padding: 15px 20px;
                border-radius: 20px;
                margin-top: 25px;
                box-shadow: rgb(196, 173, 231) 0px 10px 10px -5px;
                border-inline: 2px solid transparent;
                cursor: pointer;
                position: relative;
                overflow: hidden;
                text-align: center;
            }

            .form .file-input::-webkit-file-upload-button {
                display: none;
                /* Hide the default button */
            }

            .form .file-input::before {
                content: "Choose File";
                color: #ffffff;
                font-weight: bold;
                font-size: 10px;
                text-align: center;
                display: inline-block;
                width: 20%;
                padding: 5px;
                background: linear-gradient(45deg, #9400D3 0%, #4B0082 100%);
                border-radius: 20px;
                /* box-shadow: rgba(148, 0, 211, 0.6) 0px 20px 10px -15px, rgba(75, 0, 130, 0.6) 0px 20px 10px -15px; */
                cursor: pointer;
                transition: all 0.2s ease-in-out;
            }

            .form .file-input:hover::before {
                transform: scale(1.03);
                box-shadow: rgba(148, 0, 211, 0.6) 0px 23px 10px -20px, rgba(75, 0, 130, 0.6) 0px 23px 10px -20px;
            }

            .form .file-input:active::before {
                transform: scale(0.95);
                box-shadow: rgba(148, 0, 211, 0.6) 0px 15px 10px -10px, rgba(75, 0, 130, 0.6) 0px 15px 10px -10px;
            }

            .form .file-input:focus {
                outline: none;
                border-inline: 2px solid #9c6ee0;
            }

            .form .file-input:focus::before {
                border-inline: 2px solid #9c6ee0;
            }
        </style>

        <script type="text/javascript">
            function checkisbnAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'isbn=' + $("#isbn").val(),
                    type: "POST",
                    success: function(data) {
                        $("#isbn-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Add Book</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12  col-md-offset-3">
                        <div class="container1">
                            <div class="heading">
                                Book Info
                            </div>
                            <div class="panel-body">
                                <form role="form" class="form" method="post" enctype="multipart/form-data">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="input" type="text" name="bookname" autocomplete="off" placeholder="Book Name" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="input" name="category" required="required">
                                                <option value=""> Select Category</option>
                                                <?php
                                                $status = 1;
                                                $sql = "SELECT * from  tblcategory where Status=:status";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':status', $status, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->CategoryName); ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label> Author<span style="color:red;">*</span></label> -->
                                            <select class="input" name="author" required="required">
                                                <option value=""> Select Author</option>
                                                <?php

                                                $sql = "SELECT * from  tblauthors ";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->AuthorName); ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Book Quantity<span style="color:red;">*</span></label> -->
                                            <input class="input" type="text" name="bqty" autocomplete="off" placeholder="Book Quantity" required="required" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Price<span style="color:red;">*</span></label> -->
                                            <input class="input" type="number" name="price" autocomplete="off" placeholder="Price" required="required" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label>ISBN Number<span style="color:red;">*</span></label> -->
                                            <input class="input" type="text" name="isbn" id="isbn" required="required" autocomplete="off" placeholder="ISBN Number" onBlur="checkisbnAvailability()" />
                                            <p class="help-block">An ISBN is an International Standard Book Number.</p>
                                            <span id="isbn-availability-status" style="font-size:12px;"></span>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label>Book Picture<span style="color:red;">*</span></label> -->
                                            <input class="input file-input" type="file" name="bookpic" autocomplete="off" required="required" />
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" name="add" id="add" class="login-button">Submit </button>
                                    </div>
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