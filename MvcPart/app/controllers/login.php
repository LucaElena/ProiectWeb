<?php

session_start();

include("db.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password))
    {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {

            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $password)
                {

                    $_SESSION['id_user'] = $user_data['id_user'];
                    header("Location: /../WebPart/PaginaGeneralaClient.php");
                    die;
                }
                else {
                    header("Location: /../WebPart/PaginaLoginClient.php?error=Username or password is incorrect");
                    exit();
                }
            }
        }
    }
}

?>