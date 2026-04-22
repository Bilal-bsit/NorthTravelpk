<?php
session_start();
include 'inc/config.php';

if (!isset($_SESSION['reset_email'])) {
    die("Unauthorized access");
}

$email = $_SESSION['reset_email'];

if (isset($_POST['reset'])) {

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $dbh->prepare("UPDATE tblusers 
        SET Password = :password 
        WHERE EmailId = :email")
    ->execute([':password'=>$password, ':email'=>$email]);

    session_destroy();

    header("Location: login.php?reset=success");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<style>
body{
    background:linear-gradient(135deg,#ff9966,#ff5e62);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    font-family:Arial;
}
.card{
    background:#fff;
    padding:40px;
    border-radius:12px;
    width:300px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
h2{margin-bottom:20px;}
input{
    width:90%;
    padding:12px;
    margin:15px 0;
    border-radius:6px;
    border:1px solid #ccc;
}
button{
    width:100%;
    padding:12px;
    background:#ff5e62;
    color:#fff;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
button:hover{background:#e04848;}
</style>
</head>

<body>

<div class="card">
<h2>Reset Password</h2>

<form method="POST">
<input type="password" name="password" placeholder="Enter New Password" required>
<button name="reset">Update Password</button>
</form>

</div>

</body>
</html>