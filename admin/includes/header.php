<head>
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
        /* General Navbar Styling */
        .navbar {
            padding: 15px 0;
            /* border-bottom: 3px solid #966fe2; */
            border: none;
        }

        .navbar-brand img {
            width: 230px;
            height: 70px;
        }

        /* Centering the Navbar Menu */
        #menu-top {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
            margin-top: 8px;
            padding: 10;
        }

        #menu-top li {
            /* margin-right: 20px; */
            position: relative;
            margin: 1px;
            color: '#fff';
        }

        /* Styling Navbar Links */
        #menu-top li a {
            font-weight: lighter;
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

        /* Dropdown Menu Styling */
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
            background-color: #f9f9f9;
        }

        /* Show dropdown when hovering over parent menu item */
        #menu-top li:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
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

        .dropdown-toggle i.fa {
            margin-right: 8px;
            /* Adds space between the icon and the text */
        }

        /* Space between text "Categories" and down arrow */
        .dropdown-toggle .fa-angle-down {
            margin-left: 8px;
            /* Adds space between the text and the down arrow icon */
        }

        .fa-gauge,
        .fa-layer-group,
        .fa-user-tie,
        .fa-book-open-cover,
        .fa-book-arrow-up,
        .fa-user-tie-hair,
        .fa-retweet {
            margin-right: 8px;
        }

        .logout a:hover {
            background-color: transparent !important;
            color: inherit !important;
            border-radius: none !important;
        }

        /* Logout btn style */

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
    </style>

</head>

<body>

    <!-- <div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="assets/img/Library.png" alt="Logo" width="230px" height="70px" />
            </a>
        </div>

        <div class="right-div" style="margin-top: 10px;">
            <a href="logout.php">
                <button class="Btn">

                    <div class="sign"><svg viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                        </svg></div>

                    <div class="text">Logout</div>
                </button>
            </a>

        </div>
    </div>
</div> -->

    <section class="menu-section" style="background-color: #9c6ee0; margin-top: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse" cstyle="display: flex; justify-content: space-between;">
                        <ul id="menu-top" class="nav navbar-nav navbar-center">
                            <li><a href="dashboard.php" class="menu-top-active"> <i class="fa-gauge fa-solid"></i> DASHBOARD</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-duotone fa-solid fa-layer-group"></i> Categories <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-category.php">Add Category</a></li>
                                    <li><a href="manage-categories.php">Manage Categories</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user-tie"></i> Authors <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-author.php">Add Author</a></li>
                                    <li><a href="manage-authors.php">Manage Authors</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-book-open-cover"></i> Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="add-book.php">Add Book</a></li>
                                    <li><a href="manage-books.php">Manage Books</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-book-arrow-up"></i> Issue_Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="issue-book.php">Issue New Book</a></li>
                                    <li><a href="manage-issued-books.php">Manage Issued Books</a></li>
                                </ul>
                            </li>

                            <li><a href="reg-students.php"> <i class="fa-duotone fa-solid fa-user-tie-hair"></i> Reg_Students</a></li>

                            <li><a href="change-password.php"> <i class="fa-solid fa-retweet"></i> Change_Password</a></li>

                            <li class="logout" style="margin-top: -8px; hover: none;">
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

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>