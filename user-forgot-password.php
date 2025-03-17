<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['change'])) {
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $newpassword = md5($_POST['newpassword']);
  $sql = "SELECT EmailId FROM tblstudents WHERE EmailId=:email and MobileNumber=:mobile";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update tblstudents set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    echo "<script>alert('Your Password succesfully changed');</script>";
  } else {
    echo "<script>alert('Email id or Mobile no is invalid');</script>";
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
  <title>Online Library Management System | Password Recovery </title>
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

    .bg {
      animation: slide 5s ease-in-out infinite alternate;
      background-image: linear-gradient(-60deg, #A1FFCE 50%, #FAFFD1 50%);
      bottom: 0;
      left: -50%;
      opacity: .5;
      position: fixed;
      right: -50%;
      top: 0;
      z-index: -1;
    }

    .bg2 {
      animation-direction: alternate-reverse;
      animation-duration: 4s;
    }

    .bg3 {
      animation-duration: 5s;
    }

    @keyframes slide {
      0% {
        transform: translateX(-25%);
      }

      100% {
        transform: translateX(25%);
      }
    }
  </style>

  <script type="text/javascript">
    function valid() {
      if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        alert("New Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>

</head>

<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php'); ?>
  <!-- MENU SECTION END-->
  <div class="content-wrapper" style="margin-top: 100px;">
    <div class="container">

      <div class="bg"></div>
      <div class="bg bg2"></div>
      <div class="bg bg3"></div>


      <!--LOGIN PANEL START-->
      <div class="row">

        <div class="content">

          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="container1">
              <div class="heading">
                Change Password
              </div>
              <div class="panel-body">
                <form role="form" class="form" name="chngpwd" method="post" onSubmit="return valid();">

                  <div class="form-group">
                    <input class="input" type="email" placeholder="Enter Register Email Id" name="email" required autocomplete="off" />
                  </div>

                  <div class="form-group">
                    <input class="input" type="text" placeholder="Enter Register Mobile No" name="mobile" required autocomplete="off" />
                  </div>

                  <div class="form-group">
                    <input class="input" type="password" placeholder="Enter New Password" name="newpassword" required autocomplete="off" />
                  </div>

                  <div class="form-group">
                    <input class="input" type="password" placeholder="Enter Confirm Password" name="confirmpassword" required autocomplete="off" />
                  </div>


                  <button type="submit" name="change" class="login-button">Change Password</button>

                  <div>
                    <a href="index.php" style="display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: bold; color: #9c6ee0; text-decoration: none;">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!---LOGIN PABNEL END-->


    </div>
  </div>
  <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php'); ?>
  <!-- FOOTER SECTION END-->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>

</body>

</html>