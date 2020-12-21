<!DOCTYPE html>
<html>

<head>
    <title>Customer Profile | SBI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <style>
    #container-fluid {
        text-align: center
    }
    </style>
</head>

<body style="background-color:#006080;">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fa fa-university" aria-hidden="true"></i> SBI Online Banking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container">
        <div class="card w-100 text-center shadowBlue">
            <div class="card-header" style="background-color:#800000">
                <h1>Account Details</h1>
            </div>
            <div class="card-body">

                <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'banking_system');
                $id=$_GET['id'];
                $query = "SELECT * FROM useraccounts where id='$id'";
                $insert_query = "INSERT INTO senderaccount (sender_id) VALUES ('$id')";
                $query_run = mysqli_query($connection, $query);
                $result_query = mysqli_query($connection, $insert_query);
            ?>

                <table class="table table-striped">
                    <?php
                if($query_run)
                { 
                    foreach($query_run as $row)
                    {
            ?>

                    <tbody>
                        <tr>
                            <div class="col-sm-2">
                                <div align="center"> <img alt="User Pic"
                                        src="https://www.w3schools.com/howto/img_avatar2.png" id="profile-image1"
                                        class="img-circle img-responsive"></div><br>
                            </div>
                        </tr>
                        <tr>
                            <th><b>ID</b></th>
                            <td><?php echo $row['id']; ?></td>
                            <th><b>Name</b></th>
                            <td> <?php echo $row['name']; ?> </td>
                        </tr>
                        <tr>
                            <th><b>Account No</b></th>
                            <td> <?php echo $row['account_no.']; ?> </td>
                            <th><b>Branch Name</b></th>
                            <td> <?php echo $row['branch_name']; ?> </td>
                        </tr>
                        <tr>
                            <th><b>IFSC Code</b></th>
                            <td> <?php echo $row['ifsc_code']; ?> </td>
                            <th><b>Account Type</b></th>
                            <td> <?php echo $row['account_type']; ?> </td>
                        </tr>
                        <tr>
                            <th><b>Current Balance</b></th>
                            <td> <?php echo $row['current_balance']; ?> </td>
                            <th><b>Occupation</b></th>
                            <td> <?php echo $row['occupation']; ?> </td>
                        </tr>
                        <tr>
                            <th><b>Contact Number</b></th>
                            <td> <?php echo $row['contact']; ?> </td>
                            <th><b>Address</b></th>
                            <td> <?php echo $row['address']; ?> </td>
                        </tr>
                        <tr>
                            <th>
                                <a href="customerdetails.php">
                                    <button class="btn btn-success">BACK</button>
                                </a>
                            </th>
                            <td>
                            </td>
                            <th>
                            </th>
                            <td>
                                <a href="transfermoney.php">
                                    <button class="btn btn-danger">TRANSFER MONEY</button>
                                </a>
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


</body>

</html>