<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);

include('includes/config.php');

if(!isset($_SESSION['admin_reset'])){
    die("Unauthorized access");
}

$email = $_SESSION['admin_reset'];
$message='';

if(isset($_POST['submit']))
{
$newpassword = md5($_POST['newpassword']);
$confirm = md5($_POST['confirmpassword']);

if($newpassword != $confirm){
    $message = "<p class='error'>Passwords do not match</p>";
}else{

$sql="UPDATE admin SET Password=:newpassword WHERE EmailId=:email";
$query=$dbh->prepare($sql);
$query->execute([':newpassword'=>$newpassword, ':email'=>$email]);

session_destroy();

header("Location:index.php?reset=success");
exit();
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Reset Password</title>

<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(135deg,#ff9966,#ff5e62);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}
.card{
    background:#fff;
    padding:40px;
    border-radius:12px;
    width:350px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}
h2{margin-bottom:20px;}
input{
    width:90%;
    padding:12px;
    margin:10px 0;
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
.error{color:red;}
</style>

</head>
<body>

<div class="card">

<h2>Reset Password</h2>

<?php echo $message; ?>

<form method="post">
<input type="password" name="newpassword" placeholder="New Password" required>
<input type="password" name="confirmpassword" placeholder="Confirm Password" required>
<button name="submit">Update Password</button>
</form>

</div>

</body>
</html>