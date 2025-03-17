<head>

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
        * {
            font-family: 'lexend', sans-serif;
        }

        .navbar {
            padding: 15px 0;
            /* border-bottom: 3px solid #966fe2; */
            border: none;
        }

        .navbar-brand img {
            width: 230px;
            height: 70px;
        }

        .menu-section {
            /* background-color: #000; */
            /* border-bottom: 5px solid #9170E4; */
            border: 2px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 98%;
            margin-left: 1%;
            height: 70px;
            margin-top: 5px;
            position: fixed;
            top: 0;
            z-index: 1000;


        }

        /* Centering the Navbar Menu */
        #menu-top {
            display: flex;
            justify-content: right;
            align-items: right;
            list-style-type: none;
            margin-top: 14px;
            padding: 10;
            margin-right: 24%;
        }

        #menu-top li {
            /* margin-right: 20px; */
            position: relative;
            margin: 1px;
            color: '#fff';
        }

        /* Styling Navbar Links */
        #menu-top li a {
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }


        /* Hover effect for main menu items */
        #menu-top li a:hover {
            background-color: #FBED96;
            color: #000;
            border-radius: 15px;
            padding: 10px 15px;
        }

        .menu-top-active {
            background-color: #FBED96;
            color: white;
            font-weight: bold;
            border-radius: 15px;
            padding: 10px 15px;
        }

        .menu-top-active:hover {
            background-color: #FBED96;
            color: white;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .dropdown-menu li a {
            color: white;
            padding: 10px 15px;
            display: block;
            text-align: left;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu li a:hover {
            background-color: #FBED96;
        }

        /* Show dropdown when hovering over parent menu item */
        #menu-top li:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .logout a:hover {
            background-color: transparent !important;
            color: inherit !important;
            border-radius: none !important;
        }


        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(255, 65, 65);
        }

        /* plus sign */
        .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sign svg {
            width: 17px;
        }

        .sign svg path {
            fill: white;
        }

        /* text */
        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: .3s;
        }

        /* hover effect on button width */
        .Btn:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }

        /* hover effect button's text */
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }

        /* button click effect*/
        .Btn:active {
            transform: translate(2px, 2px);
        }

        .fa-house-window,
        .fa-right-to-bracket,
        .fa-user-plus,
        .fa-user-crown {
            margin-right: 8px;
        }
    </style>

</head>


<!-- LOGO HEADER END-->
<?php if ($_SESSION['login']) {
?>
    <section class="menu-section" style="background-color: #a8dadc;">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse" style="display: flex; justify-content: space-between;">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active"> DASHBOARD</a></li>
                            <li><a href="issued-books.php">Issued Books</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account &nbsp; <i class="fa fa-angle-down fa-1x"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>

                            <?php if ($_SESSION['login']) {
                            ?>
                                <li class="logout" style="margin-top: -11px; hover: none;">
                                    <!-- <a href="logout.php" class="btn btn-danger pull-right">LOGOUT</a> -->
                                    <a href="logout.php" style="hover:none;">
                                        <button class="Btn">

                                            <div class="sign"><svg viewBox="0 0 512 512">
                                                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                                                </svg></div>

                                            <div class="text">Logout</div>
                                        </button>
                                    </a>

                                </li>
                            <?php } ?>


                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="menu-section" style="background-color: #9c6ee0;">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">

                            <li><a href="index.php"> <i class="fa-duotone fa-solid fa-house-window"></i> Home</a></li>
                            <li><a href="index.php#ulogin"> <i class="fa-duotone fa-solid fa-right-to-bracket"></i> User Login</a></li>
                            <li><a href="signup.php"> <i class="fa-duotone fa-solid fa-user-plus"></i> User Signup</a></li>

                            <li><a href="adminlogin.php"> <i class="fa-duotone fa-solid fa-user-crown"></i> Admin Login</a></li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php } ?>