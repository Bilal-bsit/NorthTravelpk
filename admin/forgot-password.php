<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);

include('includes/config.php');

$message='';
$showOtp=false;

// STEP 1: GENERATE OTP
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];

    $sql ="SELECT * FROM admin WHERE EmailId=:email AND MobileNo=:mobile";
    $query= $dbh->prepare($sql);
    $query->execute([':email'=>$email, ':mobile'=>$mobile]);

    if($query->rowCount() > 0)
    {
        $otp = rand(100000,999999);

        $dbh->prepare("UPDATE admin SET reset_token=:otp WHERE EmailId=:email")
            ->execute([':otp'=>$otp, ':email'=>$email]);

        $_SESSION['admin_reset'] = $email;

        $message="<p class='success'>Your OTP is: <b>$otp</b></p>";
        $showOtp=true;
    }
    else
    {
        $message="<p class='error'>Invalid Email or Mobile</p>";
    }
}

// STEP 2: VERIFY OTP
if(isset($_POST['verify']))
{
    $otp = trim($_POST['otp']);

    if(!isset($_SESSION['admin_reset'])){
        die("Session expired. Try again.");
    }

    $email = $_SESSION['admin_reset'];

    $sql ="SELECT * FROM admin WHERE EmailId=:email AND reset_token=:otp";
    $query= $dbh->prepare($sql);
    $query->execute([':email'=>$email, ':otp'=>$otp]);

    if($query->rowCount() > 0)
    {
        header("Location: change-password.php");
        exit();
    }
    else
    {
        $message="<p class='error'>Invalid OTP</p>";
        $showOtp=true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Forgot Password</title>

<style>
body{
    margin:0;
    font-family:Arial;
    background:linear-gradient(135deg,#667eea,#764ba2);
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
    background:#667eea;
    color:#fff;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
button:hover{background:#5a67d8;}
.success{color:green;}
.error{color:red;}
a{
    display:block;
    margin-top:15px;
}
</style>

</head>
<body>

<div class="card">

<h2>Admin Forgot Password</h2>

<?php echo $message; ?>

<?php if(!$showOtp){ ?>

<form method="post">
<input type="email" name="email" placeholder="Enter Email" required>
<input type="text" name="mobile" placeholder="Enter Mobile Number" required>
<button name="submit">Generate OTP</button>
</form>

<?php } else { ?>

<form method="post">
<input type="text" name="otp" placeholder="Enter OTP" required>
<button name="verify">Verify OTP</button>
</form>

<?php } ?>

<a href="index.php">Back to Login</a>

</div>

</body>
</html>