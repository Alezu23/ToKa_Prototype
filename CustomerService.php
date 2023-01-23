<?php
// This is the file that will be called when the form is submitted
// This file will be responsible for inserting the data into the database
    // Variables to store the data from the form
    $Cname = $_POST['name'];
    $Csubject = $_POST['subject'];
    $Cemail = $_POST['email'];
    $Cmessage = $_POST['message'];


    
    
    
    // Database connection
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'prototype');
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    require_once "CustomerService.php";
    
    $Cname = mysqli_real_escape_string($link, $Cname);
    $Csubject = mysqli_real_escape_string($link, $Csubject);
    $Cemail = mysqli_real_escape_string($link, $Cemail);
    $Cmessage = mysqli_real_escape_string($link, $Cmessage);


    // Attempt insert query execution
    $sql = "INSERT INTO csdata (name, subject, email, message) VALUES ('$Cname', '$Csubject', '$Cemail', '$Cmessage')";
    $result = mysqli_query($link, $sql);
    ?>

    
    
<?php
    // Checks if the data was inserted into the database successfully
    if($result){
        header("location: ThankYou.html");
    }
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
    
    ?>
    
     
    