<!DOCTYPE html>

<head>
    <title>Contact Us | SBI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">

    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
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
                    <li class="nav-item active">
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

    <section id="contact">
        <div class="social">
            <a herf="#"><i class="fab fa-facebook"></i></a>
            <a herf="#"><i class="fab fa-twitter"></i></a>
            <a herf="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="contact-box">
            <div class="c-heading">
                <h1>Get In Touch</h1>
                <p>Call Or Email Us Regarding Any Query</p>
            </div>
            <form action="contact.php" method="POST">
                <div class="c-inputs">
                    <input type="text" name="fullname" placeholder="fullname">
                    <input type="email" name="email" placeholder="mail-id">
                    <textarea name="message" placeholder="message"></textarea>
                    <button type="submit" name="send">SEND</button>
                </div>
            </form>
        </div>
        <div class=" map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15551.953681414647!2d77.59295316977537!3d12.972592299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae16794e1aded7%3A0xe8d4057b8658976!2sState%20Bank%20of%20India!5e0!3m2!1sen!2sin!4v1607068830210!5m2!1sen!2sin"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$connection = mysqli_connect("localhost","root",""); 
$db = mysqli_select_db($connection,'banking_system'); 


if(isset($_POST["send"])){
      $fullname=$_POST["fullname"];
      $email=$_POST["email"];
      $message=$_POST["message"];

      $query = "INSERT INTO contactus (fullname,email,message) VALUES ('$fullname','$email','$message')";
      $query_run = mysqli_query($connection,$query);


if($query_run)
{
   echo "<script type='text/javascript'>alert('Thank You! Your message is submitted.');
   window.location='contact.php';</script>";
   
}
else
{
    echo '<script> alert("Try Again! Your message failed to submit."); </script>';   
}

}
?>