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
    $SaveData = $_POST["saveData"];

    $stmt = $conn->prepare("UPDATE users SET SaveData = ? WHERE Username = ?");
    if (!$stmt) {
        die("500");
    }

    $stmt->bind_param("ss", $SaveData, $Username);

    if (!$stmt->execute()) {
        die("500");
    }

    echo "200"; // success
    $conn->close();
?>