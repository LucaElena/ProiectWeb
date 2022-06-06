<?php

session_start();

include("db.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    if (!empty($email) && !empty($new_password) ) {

        //read from database
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $sql2 = "UPDATE users SET password  = '$new_password' WHERE email = '$email'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location:  /../WebPart/PaginaResetPassClient.html?success=Password was successfully reset");
                exit();
            } else {
                header("Location: /../WebPart/PaginaSignupClient.php?error=unknown error occurred");
                exit();
            }
        }
    }
}

?>