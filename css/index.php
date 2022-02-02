<?php

    // clean the input parameters
    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_STRING);

    ////// alternative iimplementation /////////////////////////////
    // $firstname = htmlspecialchars($_GET['firstname']);
    // $lastname = htmlspecialchars($_GET['lastname']);
    // $age = htmlspecialchars($_GET['age']);
    /////////////////////////////////////////////////////////////////

    // initialize error message as empty
    $error = "";

    // append any error messages
    if(empty($firstname) || is_null($firstname)){ $error .= "Missing First Name<br>";} 
    if(empty($lastname) || is_null($firstname)){ $error .= "Missing Last Name<br>";} 

    if(empty($age) || is_null($firstname)){ 
        $error .= "Missing Age<br>";
    } else if((filter_var($age, FILTER_VALIDATE_INT) === false) || $age < 0 ){ 
        $error .= "Age must be a positive number<br>";
    } 

    // check if any errors were found
    if($error != "") {
        echo $error;
        exit();
    }

    $greeting = "Hello, my name is $firstname $lastname.<br>";
    echo $greeting;

    $votingSentence = "I am $age years old and ";
    if($age >= 18){
        $votingSentence .= "I am old enough to vote in the United States.<br>";
    }else {
        $votingSentence .= "I am not old enough to vote in the United States.<br>";
    }
    echo $votingSentence;

    $numberOfDays = $age*365;
    echo "$numberOfDays Days<br>";

    $date = date('m/d/y');
    echo "$date<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Week 2</title>
</head>
<body>
    <h1>By James Chapman</h1>
</body>
</html>