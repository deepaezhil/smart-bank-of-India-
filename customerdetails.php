<!DOCTYPE html>
<html>

<head>
    <title>Customer Details | SBI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><i class="fa fa-university" aria-hidden="true"></i> SBI Online Banking</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customerdetails.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h5>Customer Details</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'banking_system');

                $query = "SELECT * FROM useraccounts";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Holder Name</th>
                                <th scope="col">Account No.</th>
                                <th scope="col">Branch Name</th>
                                <th scope="col">Current Balance</th>
                                <th scope="col">Account type</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['name']; ?> </td>
                                <td> <?php echo $row['account_no.']; ?> </td>
                                <td> <?php echo $row['branch_name']; ?> </td>
                                <td> <?php echo $row['current_balance']; ?> </td>
                                <td> <?php echo $row['account_type']; ?> </td>
                                <td> <?php echo $row['contact']; ?> </td>
                                <td>
                                    <a href="profile.php?id=<?php echo $row['id']; ?>">
                                        <button class="btn btn-primary"> VIEW </button>
                                        <a>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>Smart Bank of India</h1>
                <p>India's No.1 Banking Services</p>
            </div>
            <div class="footer-items">
                <h1>Quick Links</h1>
                <div class="border"></div>
                <ul>
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="services.php">
                        <li>Services</li>
                    </a>

                </ul>
            </div>

            <div class="footer-items">
                <h1>Important Links</h1>
                <div class="border"></div>
                <ul>

                    <a href="about.php">
                        <li>About</li>
                    </a>
                    <a href="contact.php">
                        <li>Contact</li>
                    </a>

            </div>

            <div class="footer-items">
                <h1>Contact Us</h1>
                <div class="border"></div>
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>Smart Bank of India<br> No 65, 2nd Floor,
                        Local Head Office Cplx, St Marks Rd, above SPB Branch, Bengaluru, Karnataka 560001</li>
                    <br><br><br><br>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>+91-9779776365</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>support@sbionlinebanking.com</li>
                </ul>
                <div class="social-media">
                    <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            Copyright &copy; SBI Banking 2020. All rights reserved. Designed by E DEEPA
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>