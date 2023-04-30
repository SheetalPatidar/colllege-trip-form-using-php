<?php
$insert = false;
if(!empty($_POST['name'])){
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
     
    // Create a database connection 
    $con = mysqli_connect($server, $username, $password);

    //Check for connection success
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }

    //echo "Sucess Connecting to the db";

    //Collect post variables
    $count = 1;
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    $sql = "INSERT INTO trip.ipstrip(id, name, age, gender, phone, email, msg)VALUES ('$count', '$name','$age','$gender','$phone','$email','$msg');";
    //echo $sql;
 
    
    //Execute the query
    if($con->query($sql) == true){
        //echo "Successfully inserted";

        //Flag for successful insertion
        $insert = true;
        $count++;
       

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

//Close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Project</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <img class="ipsbg" src="ipsbg.webp" alt="IPS Academy">
    <div class="container">
        <h1>Welcome to IPS Academy US Trip </h1>
        <p>kindly fill your details to show participation</p>\

        <?php 
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for Submiting your form see you in trip Have a Good Day</p>";

        }
    ?>

        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
       
    </form>
    </div>
    <script src="index.js"></script>
    
    
</body>
</html> 
