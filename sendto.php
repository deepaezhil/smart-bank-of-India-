<!DOCTYPE html>
<html>

<head>
    <title>Transaction | SBI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
                                $query = "SELECT * FROM useraccounts where id=(SELECT sender_id FROM senderaccount WHERE s_no IN (SELECT MAX(s_no) FROM senderaccount GROUP BY sender_id)ORDER BY s_no DESC LIMIT 1)";
                                $query_run = mysqli_query($connection, $query);

            ?>
                <form action="functioncode.php" method="POST">
                    <table class="table table-striped">

                        <?php
                if($query_run)
                { 
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                                <th><label>
                                        <h4>From Account</h4>
                                    </label></th>
                                <td></td>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr>
                                <div class="col-sm-2">
                                    <div align="center"> <img alt="User Pic"
                                            src="https://www.w3schools.com/howto/img_avatar2.png" id="profile-image1"
                                            class="img-circle img-responsive"></div><br>
                                </div>
                            </tr>
                            <tr>
                                <th><b>ID</b></th>
                                <td> <input type="number" class="form-control" name="sender_id"
                                        value="<?php echo $row['id']; ?>" readonly> </td>
                                <th><b>Name</b></th>
                                <td> <input type="text" class="form-control" name="sender_name"
                                        value="<?php echo $row['name']; ?>" readonly> </td>

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
                                <th><b>Current Balance</b></th>
                                <td> <input type="number" class="form-control" name="curr_bal"
                                        value="<?php echo $row['current_balance']; ?>" readonly> </td>

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

                    <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection, 'banking_system');
                                $id=$_GET['id'];
                                $query = "SELECT * FROM useraccounts where id='$id'";
                                $query_run = mysqli_query($connection, $query);

                
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

                                <th><label>
                                        <h4>To Account</h4>
                                    </label></th>
                                <td></td>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr>

                                <th><b>ID</b></th>
                                <td> <input type="number" class="form-control" name="receiver_id"
                                        value="<?php echo $row['id']; ?>" readonly> </td>
                                <th><b>Name</b></th>
                                <td> <input type="text" class="form-control" name="receiver_name"
                                        value="<?php echo $row['name']; ?>" readonly> </td>

                            </tr>
                            <tr>
                                <th><b>Account No</b></th>
                                <td> <?php echo $row['account_no.']; ?> </td>
                                <th><b>IFSC Code</b></th>
                                <td> <?php echo $row['ifsc_code']; ?> </td>

                            </tr>
                            <tr>

                                <th><b>Amount:</b></th>
                                <td> <input type="number" class="form-control" name="amount" required> </td>
                                <th><b>Remark:</b></th>
                                <td> <input type="text" class="form-control" name="remark" required> </td>

                            </tr>
                            <tr>

                                <th>
                                    <a href="customerdetails.php">
                                        <button type="button" class="btn btn-primary">CANCEL</button>
                                    </a>
                                </th>
                                <td>
                                </td>
                                <th>
                                </th>
                                <td>

                                    <button type="submit" class="btn btn-danger" name="transfer_popup">TRANSFER</button>
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
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>