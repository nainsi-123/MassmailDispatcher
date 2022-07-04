<?php

session_start();
include "datablogin.php";

if(isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$email = validate($_POST['email']);
$pass = validate($_POST['password']);

if(empty($email)) {
    header("Location: index.php?error= Email is required");
    exit();
}else if(empty($pass)){
    header("Location: index.php?error= Password is required");
    exit();
}

$sql = " SELECT * FROM users WHERE user_name= '$email' AND password= '$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name']===$email && $row['password']===$pass){
        echo "Logged in successfully!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: aftlogin.php");
        exit();
    }else {
        header("Location: indexlogin.php?error = Incorrect Email or Password");
        exit();
    }
}else{
    header("Location: indexlogin.php");
    exit();
}
