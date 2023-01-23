<?php
// This is the file that will be called when the form is submitted
// This file will be responsible for inserting the data into the database
    // Variables to store the data from the form
    $username = $_POST['inputusername'];
    $password = $_POST['inputpassword'];
    
    

    // Database connection
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'prototype');
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    require_once "login.php";

    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);

    // Attempt insert query execution
    if (empty($username) || empty($password)) {
        echo "Please fill all the fields";
    } 
    // else if login is correct
    else {
        $q = "SELECT * FROM loginData WHERE username = '$username' AND password = '$password'";
        $r = mysqli_query($link, $q);
        if (mysqli_num_rows($r) == 1) {
            $set = "SELECT id FROM loginData WHERE username = '$username' AND password = '$password'";
            header("Location: indexLogged.php");
            
            
        } else {
            header("Location: Failure2.html");
        }
    }
    





    mysqli_close($link);


?>