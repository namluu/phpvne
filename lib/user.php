<?php
function get_user($username, $password)
{
    global $connect;
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);
    $query = "
        SELECT * FROM user
        WHERE username = '$username'
        AND password = '$password'
    ";
    return mysqli_query($connect, $query);
}

function user_handle()
{
    if (isset($_POST['btnLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $user = get_user($username, $password);
        if (mysqli_num_rows($user) == 1) {
            $row = mysqli_fetch_array($user);
            $_SESSION['userId'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['group'] = $row['group'];
        }
    }

    if (isset($_POST['btnLogout'])) {
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        unset($_SESSION['group']);
    }
}