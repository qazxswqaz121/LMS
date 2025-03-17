<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Issued Books</title>
        <script src="https://cdn.tailwindcss.com"></script>
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
                max-width: 1800px;
                background: #F8F9FD;
                background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
                border-radius: 20px;
                padding: 25px 35px;
                border: 5px solid rgb(255, 255, 255);
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                margin: 20px;
                position: relative;
            }

            .heading {
                text-align: center;
                font-weight: 900;
                font-size: 30px;
                color: #9c6ee0;
            }

            /* Search Input */
            .search-input {
                width: 30%;
                padding: 10px;
                font-size: 16px;
                border: 2px solid #ccc;
                border-radius: 15px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                transition: border 0.3s ease;
                display: flex;
            }

            .search-input:focus {
                border-color: #9c6ee0;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }

            /* Book Card */
            .book-card {
                background-color: white;
                border-radius: 20px;
                box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.1);
                display: flex;
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
                width: 100%;
            }

            .book-card:hover {
                transform: translateY(-10px);
                box-shadow: rgba(0, 0, 0, 0.2) 0px 10px 20px -5px;
            }

            .book-image {
                flex: 0 0 200px;
                overflow: hidden;
                height: 300px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f1f1f1;
            }

            .book-image img {
                max-height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .book-image:hover img {
                transform: scale(1.05);
            }

            .book-details {
                flex: 1;
                padding: 20px;
                text-align: left;
            }

            .book-title {
                font-size: 20px;
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
            }

            .book-details p {
                font-size: 14px;
                margin: 10px 0;
                color: #555;
            }

            .book-details p strong {
                color: #333;
            }

            .no-books-message {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 18px;
                font-weight: bold;
                color: #333;
                text-align: center;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }

            /* Table Styling (for old table structure) */
            .table {
                width: auto;
                margin-bottom: 20px;
                border-collapse: collapse;
                border-radius: 10px;
                overflow: hidden;
            }

            .table th,
            .table td {
                padding: 15px;
                text-align: center;
                font-size: 16px;
                color: #333;
                border-bottom: 1px solid #e0e0e0;
            }

            .table thead {
                background-color: #9c6ee0;
                color: white;
                text-align: center;
                font-weight: bold;
                text-transform: uppercase;
            }

            /* Hover Effect on Rows */
            .table tbody tr:hover {
                background-color: #f4f4f4;
                cursor: pointer;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -5px;
                transform: translateY(-5px);
                transition: transform 0.2s ease, background-color 0.3s ease;
            }

            .table tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .table tbody tr:nth-child(even) {
                background-color: #f1f1f1;
            }

            /* Colspan Cell Styling */
            .table td[colspan="2"] {
                text-align: left;
                padding-left: 20px;
            }

            .table td.text-left {
                text-align: left;
            }

            /* Animation Effect */
            .book-card {
                animation: fadeIn 0.5s ease-in-out;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    transform: translateY(30px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
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
                        <h4 class="header-line">Manage Issued Books</h4>
                    </div>


                    <div class="container1">
                        <div class="heading">Book Collection</div>

                        <!-- Search Bar -->
                        <div style="text-align: center; margin-bottom: 20px;">
                            <input type="text" id="bookSearch" placeholder="Search by Book Name..." class="search-input">
                        </div>

                        <div class="row" id="bookList">
                            <?php
                            $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage,tblbooks.isIssued,tblbooks.bookQty,  
        COUNT(tblissuedbookdetails.id) AS issuedBooks,
        COUNT(tblissuedbookdetails.RetrunStatus) AS returnedbook
        FROM tblbooks
        LEFT JOIN tblissuedbookdetails ON tblissuedbookdetails.BookId = tblbooks.id
        LEFT JOIN tblauthors ON tblauthors.id = tblbooks.AuthorId
        LEFT JOIN tblcategory ON tblcategory.id = tblbooks.CatId
        GROUP BY tblbooks.id";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>
                                    <div class="col-md-4 mb-6 book-card-container">
                                        <div class="book-card">
                                            <div class="book-image">
                                                <img src="admin/bookimg/<?php echo htmlentities($result->bookImage); ?>" class="rounded-md" alt="book-image">
                                            </div>
                                            <div class="book-details">
                                                <h3 class="book-title"><?php echo htmlentities($result->BookName); ?></h3>
                                                <p><strong>Author:</strong> <?php echo htmlentities($result->AuthorName); ?></p>
                                                <p><strong>ISBN Number:</strong> <?php echo htmlentities($result->ISBNNumber); ?></p>
                                                <p><strong>Book Quantity:</strong> <?php echo htmlentities($result->bookQty); ?></p>
                                                <p><strong>Available:</strong> <?php echo ($result->bookQty - ($result->issuedBooks - $result->returnedbook)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo '<div id="noBooksMessage" class="no-books-message">No books found.</div>';
                            }
                            ?>
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
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>

        <script>
            // Add event listener for the search bar
            document.getElementById('bookSearch').addEventListener('input', function() {
                let searchValue = this.value.toLowerCase();
                let bookCards = document.querySelectorAll('.book-card-container');
                let noBooksMessage = document.getElementById('noBooksMessage');

                let found = false;

                bookCards.forEach(function(card) {
                    let bookName = card.querySelector('.book-title').textContent.toLowerCase();
                    if (bookName.includes(searchValue)) {
                        card.style.display = ''; // Show card
                        found = true;
                    } else {
                        card.style.display = 'none'; // Hide card
                    }
                });

                // If no books are found, show the "No books found" message
                if (!found && noBooksMessage) {
                    noBooksMessage.style.display = 'block';
                } else {
                    noBooksMessage.style.display = 'none';
                }
            });
        </script>



    </body>

    </html>
<?php } ?>