<?php
include 'inc/config.php';

$message = '';
$email = $_GET['email'];

if (isset($_POST['verify'])) {
    $otp = $_POST['otp'];

    $stmt = $dbh->prepare("SELECT * FROM tblusers 
        WHERE EmailId = :email AND reset_token = :otp AND token_expiry >= NOW()");
    $stmt->execute([':email'=>$email, ':otp'=>$otp]);

    if ($stmt->rowCount() > 0) {
        header("Location: reset-password.php?email=$email");
        exit();
    } else {
        $message = "<p class='error'>Invalid or expired OTP</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Verify OTP</title>
<style>
body{
    background:linear-gradient(135deg,#43cea2,#185a9d);
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
    text-align:center;
    width:300px;
}
input{
    width:90%;
    padding:12px;
    margin:15px 0;
}
button{
    padding:12px;
    width:100%;
    background:#43cea2;
    color:#fff;
    border:none;
}
.error{color:red;}
</style>
</head>
<body>

<div class="card">
<h2>Verify OTP</h2>
<?php echo $message; ?>

<form method="POST">
<input type="text" name="otp" placeholder="Enter OTP" required>
<button name="verify">Verify</button>
</form>

</div>
</body>
</html>