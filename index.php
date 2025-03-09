<?php
$insert = false;
if (isset($_POST['name'])){
    //set connection variables 
$server = "localhost";
$username = "root";
$password = "";

//create a database connnection 

$con = mysqli_connect($server , $username , $password);

//check for connection success
if (!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}
// echo "Success Connecting to the db "

//collect post variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `travel`.`travel` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp()); ";
//  echo $sql;


// execute the query 
 if ($con -> query($sql)== true){
    // echo " Successfully inserted";

    //flag for succesfull insertion 
    $insert =true;
 }

 else {
    echo "ERROR: $sql <br> $con-> error";
 }
//close the database connection 
 $con -> close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Car">
    <div class="container">
       <h1>Welcome to Lahore Travel Booking Site</h1>  
       <p>Enter your details and submit this Form To confirm your Booking.</p>
       <?php
       if ($insert ==true){
       echo "<p class= 'submitMsg' >Thanks for submitting this form to confirm your Booking. </p>";
    }

       ?>

       <form action="index.php" method="post">

        <input type="text" name="name" id="name" placeholder="Enter your Name">

        <input type="text" name="age" id="age" placeholder="Enter your Age">

        <input type="text" name="gender" id="gender" placeholder="Enter your Gender">

        <input type="email" name="email" id="email" placeholder="Enter your email">

        <input type="phone" name="phone" id="phone"  placeholder="Enter your Phone Number">

        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any Other Information Here"></textarea>

        <button class="btn">Submit</button>

       </form>
    </div>
    <script  src="index.js"></script>
     
</body>
</html>