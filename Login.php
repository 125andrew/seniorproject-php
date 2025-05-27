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
    $UserPassword = $_POST["password"];

    $LoginQuery = "SELECT Password, SaveData FROM `users` WHERE Username = '".$Username."';";

    try
    {
        $LoginResult = $conn->query($LoginQuery);

        if ($LoginResult === false)
        {
            die("500");
        }
    }
    catch (Exception $e)
    {
        die("500");
    }

    if ($LoginResult->num_rows > 0)
    {
        $row = $LoginResult->fetch_assoc();
        if (password_verify($UserPassword, $row["Password"])) 
        {
            echo($row["SaveData"]);
        }
        else
        {
            die("401");
        }
    }
    else
    {
        die("404");
    }

    $conn->close();

?>