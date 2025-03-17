<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['issue'])) {
        $studentid = strtoupper($_POST['studentid']);
        $bookid = $_POST['bookid'];
        $aremark = $_POST['aremark'];
        $isissued = 1;
        $aqty = $_POST['aqty'];
        if ($aqty > 0) {
            $sql = "INSERT INTO  tblissuedbookdetails(StudentID,BookId,remark) VALUES(:studentid,:bookid,:aremark)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
            $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
            $query->bindParam(':aremark', $aremark, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $_SESSION['msg'] = "Book issued successfully";
                header('location:manage-issued-books.php');
            } else {
                $_SESSION['error'] = "Something went wrong. Please try again";
                header('location:manage-issued-books.php');
            }
        } else {
            $_SESSION['error'] = "Book Not available";
            header('location:manage-issued-books.php');
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
        <title>Online Library Management System | Issue a new Book</title>
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
            /* Container styling */
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

            /* Heading styling */
            .heading {
                text-align: center;
                font-weight: 900;
                font-size: 30px;
                color: #9c6ee0;
            }

            /* Input field styling */
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

            /* Login button styling */
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

            /* Styling for student name box */
            .student-box {
                padding: 10px 20px;
                background-color: #ffffff;
                border: none;
                border-radius: 10px;
                text-align: center;
                font-size: 18px;
                color: #333;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -2px;
            }

            /* Styling for book selection radio buttons */
            .book-option {
                display: flex;
                align-items: center;
                margin: 10px 0;
            }

            .book-option input[type="radio"] {
                margin-right: 10px;
            }

            .book-option label {
                font-size: 16px;
                color: #555;
            }

            .Book-option {
                display: flex;
                justify-content: center;
                align-items: center;
                border: none;
                padding: 10px;
            }
        </style>


        <script>
            // Function to get student name
            function getstudent() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "get_student.php",
                    data: 'studentid=' + $("#studentid").val(),
                    type: "POST",
                    success: function(data) {
                        $("#get_student_name").html(data); // Display student name
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }

            // Function to get book details and display radio buttons for selection
            function getbook() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "get_book.php",
                    data: 'bookid=' + $("#bookid").val(),
                    type: "POST",
                    success: function(data) {
                        // Clear any previous book options and insert new ones
                        $("#get_book_name").html(data);

                        // Dynamically create book options with radio buttons
                        let books = JSON.parse(data); // Assuming data is returned as a JSON array
                        let bookOptionsHTML = "";
                        books.forEach(function(book) {
                            bookOptionsHTML += `
                        <div class="book-option">
                            <input type="radio" id="book${book.id}" name="bookid" value="${book.id}">
                            <label for="book${book.id}">${book.title} - ${book.author}</label>
                        </div>
                    `;
                        });
                        $("#get_book_name").html(bookOptionsHTML);
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
                        <h4 class="header-line">Issue a New Book</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-3">
                        <div class="container1">
                            <div class="heading">
                                Issue a New Book
                            </div>
                            <div class="panel-body">
                                <form role="form" class="form" method="post">
                                    <!-- Student ID Input -->
                                    <div class="form-group">
                                        <input class="input" type="text" name="studentid" id="studentid" placeholder="Enter Student id" onBlur="getstudent()" autocomplete="off" required />
                                    </div>

                                    <!-- Student Name Display -->
                                    <div class="form-group">
                                        <div id="get_student_name" class="student-box"></div>
                                    </div>

                                    <!-- Book ISBN/Title Input -->
                                    <div class="form-group">
                                        <input class="input" type="text" name="booikid" id="bookid" placeholder="Enter ISBN Number or Book Title" onBlur="getbook()" required="required" />
                                    </div>

                                    <!-- Book Selection (Radio buttons) -->
                                    <div class="Book-option" id="get_book_name">

                                    </div>

                                    <!-- Remarks Textarea -->
                                    <div class="form-group">
                                        <textarea class="input" name="aremark" id="aremark" placeholder="Enter Remark" required></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" name="issue" id="submit" class="login-button">Issue Book</button>
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