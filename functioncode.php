<?php
$connection = mysqli_connect("localhost","root",""); 
$db = mysqli_select_db($connection,'banking_system'); 


    if(isset($_POST["transfer_popup"])){
      $sender_id=$_POST["sender_id"];
      $sender_name=$_POST["sender_name"];
      $receiver_id=$_POST["receiver_id"];
      $receiver_name=$_POST["receiver_name"];
      $amount=$_POST["amount"];
      $remark=$_POST["remark"];
      $transaction_time = date("Y-m-d H:i:s a");

      $sql = "SELECT * from useraccounts where id=$sender_id";
      $query = mysqli_query($connection,$sql);
      $sql1 = mysqli_fetch_array($query) or die("could not connect");

      $sql = "SELECT * from useraccounts where id=$receiver_id";
      $query = mysqli_query($connection,$sql);
      $sql2 = mysqli_fetch_array($query);

      if($amount > $sql1['current_balance'])
      {
  
          echo '<script type="text/javascript">';
          echo ' alert("Insufficient Balance")';  
          echo '</script>';
      }

    else if($amount == 0){
        echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
   </script>";
    }
   else {

  
       $newCredit = $sql1['current_balance'] - $amount;
       $sql = "UPDATE useraccounts set current_balance=$newCredit where id=$sender_id";
       mysqli_query($connection,$sql); 



       $newCredit = $sql2['current_balance'] + $amount;
       $sql = "UPDATE useraccounts set current_balance=$newCredit where id=$receiver_id";
       mysqli_query($connection,$sql);

       
      
   
$query="INSERT INTO transaction (sender_id,sender_name,receiver_id,receiver_name,amount,remark,transaction_time) VALUES ('$sender_id','$sender_name','$receiver_id','$receiver_name','$amount','$remark','$transaction_time')";
$query_run=mysqli_query($connection,$query);

if($query_run)
{
   echo "<script type='text/javascript'>alert('Transaction is Successful! Please check your transactions details.');
   window.location='customerdetails.php';</script>";
   
}
else
{
    echo '<script> alert("Transaction is Failed!"); </script>';   
}

$newCredit= 0;
       $amount =0;
}
}

?>