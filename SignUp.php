<?php
// This is the file that will be called when the form is submitted
// This file will be responsible for inserting the data into the database
    // Variables to store the data from the form
    $username1 = $_POST['username'];
    $email1 = $_POST['email'];
    $password1 = $_POST['password'];


    
    
    
    // Database connection
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'prototype');
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    require_once "SignUp.php";

    $username1 = mysqli_real_escape_string($link, $username1);
    $email1 = mysqli_real_escape_string($link, $email1);
    $password1 = mysqli_real_escape_string($link, $password1);

    //if email or username is already taken
    $sql1 = "SELECT * FROM logindata WHERE username = '$username1' OR email = '$email1'";
    $result1 = mysqli_query($link, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        echo "Username or Email is already taken";
        header("Location: Failure.html");
        
    }
    else if(mysqli_num_rows($result1) > 0){
  	  $email_error = "Sorry... email already taken";
        header("Location: Failure.html");
  	}
    // Attempt insert query execution
    else{
    $sql = "INSERT INTO logindata (username, email, password) VALUES ('$username1', '$email1', '$password1')";
    $result = mysqli_query($link, $sql);
    ?>

    <!DOCTYPE html>
    <html>
        <!--window alert-->
        <script>
            alert("You have successfully signed up!");
        </script>


<html>
    
<?php
    // This is the file that will be called when the form is submitted
    }
    if($result){
        header("Location: Success.html");
    }
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
    
    ?>
    
     
    