<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'inc/config.php';

$message = '';
$showOtpField = false;

if (isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);

    $stmt = $dbh->prepare("SELECT * FROM tblusers WHERE EmailId = :email AND MobileNumber = :mobile");
    $stmt->execute([':email'=>$email, ':mobile'=>$mobile]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        $otp = rand(100000, 999999);

        $dbh->prepare("UPDATE tblusers 
            SET reset_token = :token, token_expiry = DATE_ADD(NOW(), INTERVAL 15 MINUTE)
            WHERE EmailId = :email")
        ->execute([':token'=>$otp, ':email'=>$email]);

        $_SESSION['reset_email'] = $email;

        $message = "<p class='success'>Your OTP is: <b>$otp</b></p>";
        $showOtpField = true;

    } else {
        $message = "<p class='error'>Invalid Email or Mobile</p>";
    }
}

if (isset($_POST['verify'])) {

    $otp = $_POST['otp'];
    $email = $_SESSION['reset_email'];

    $stmt = $dbh->prepare("SELECT * FROM tblusers 
        WHERE EmailId = :email AND reset_token = :otp AND token_expiry >= NOW()");
    $stmt->execute([':email'=>$email, ':otp'=>$otp]);

    if ($stmt->rowCount() > 0) {

        $dbh->prepare("UPDATE tblusers SET reset_token=NULL, token_expiry=NULL WHERE EmailId=:email")
            ->execute([':email'=>$email]);

        header("Location: reset-password.php");
        exit();

    } else {
        $message = "<p class='error'>Invalid or expired OTP</p>";
        $showOtpField = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
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
</style>
</head>

<body>

<div class="card">
<h2>Forgot Password</h2>

<?php echo $message; ?>

<?php if (!$showOtpField): ?>

<form method="POST">
<input type="email" name="email" placeholder="Enter Email" required>
<input type="text" name="mobile" placeholder="Enter Mobile Number" required>
<button name="submit">Generate OTP</button>
</form>

<?php else: ?>

<form method="POST">
<input type="text" name="otp" placeholder="Enter OTP" required>
<button name="verify">Verify OTP</button>
</form>

<?php endif; ?>

</div>

</body>
</html>