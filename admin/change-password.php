<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['change'])) {
    $password = md5($_POST['password']);
    $newpassword = md5($_POST['newpassword']);
    $username = $_SESSION['alogin'];
    $sql = "SELECT Password FROM admin where UserName=:username and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
      $con = "update admin set Password=:newpassword where UserName=:username";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();
      $msg = "Your Password succesfully changed";
    } else {
      $error = "Your current password is wrong";
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
    <title>Online Library Management System | </title>
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
      .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }

      .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }


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

      .form {
        margin-top: 20px;
      }

      .form .input {
        width: 100%;
        background: white;
        border: none;
        padding: 15px 20px;
        border-radius: 20px;
        margin-top: 15px;
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

      .form .forgot-password {
        display: block;
        margin-top: 10px;
        margin-left: 10px;
      }

      .form .forgot-password a {
        font-size: 11px;
        color: #9c6ee0;
        text-decoration: none;
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
  </head>
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

  <body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">

        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <!-- <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">User Change Password</h4>
          </div>
        </div> -->
        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
        <!--LOGIN PANEL START-->

        <div class="content">

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <div class="container1">
                <div class="heading">Change Password</div>
                <form class="form" role="form" method="post" onSubmit="return valid();" name="chngpwd">
                  <input required="" class="input" type="password" name="password" autocomplete="off" placeholder="Current Password" required>
                  <input required="" class="input" type="password" name="newpassword" autocomplete="off" placeholder="New Password" required>
                  <input required="" class="input" type="password" name="confirmpassword" autocomplete="off" placeholder="Confirm Password" required>
                  <input class="login-button" name="change" type="submit" value="Sign In">
                </form>
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
<?php } ?>