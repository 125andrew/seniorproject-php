<?php
    $servername = "sql307.infinityfree.com";
    $DbUsername = "if0_39095277";
    $DbPassword = "FmsStQPpv6QnI9";
    $dbname = "if0_39095277_seniorproject";

    $conn = new mysqli($servername, $DbUsername, $DbPassword, $dbname);

    if ($conn->connect_error)
    {
        die("500");
    }

    $Username = $_POST["username"];
    $UserPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $RegisterUserQuery = "INSERT INTO users(Username, Password) VALUES ('".$Username."', '".$UserPassword."');";

    try
    {
        $RegisterUserResult = $conn->query($RegisterUserQuery);

        if ($RegisterUserResult === false)
        {
            die("500");
        }
    }
    catch (Exception $e)
    {
        die("500");
    }

    //success
    echo("success");
    $conn->close();

?>