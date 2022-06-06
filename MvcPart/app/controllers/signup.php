<?php

session_start();
include("db.php");
include("functions.php");

if (!$conn) {
    echo "Connection failed!";
}
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {

    $name = validate($_POST['name']);
    $pass = validate($_POST['password']);

    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);

//    $pass = md5($pass);

    $sql = "SELECT * FROM users WHERE user_name='$name' or email = '$email' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: /../WebPart/PaginaSignupClient.php?error=Username or email is taken, try another");
        exit();
    }else {
        $sql2 = "INSERT INTO users(user_name, email, phone, password) VALUES('$name', '$email', '$phone', '$pass')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            header("Location:  /../WebPart/PaginaSignupClient.php?success=Your account has been created successfully");
            exit();
        }else {
            header("Location: /../WebPart/PaginaSignupClient.php?error=Unknown error occurred");
            exit();
        }
    }
}
