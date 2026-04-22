<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Sign in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    height:100vh;
    background:linear-gradient(135deg,#1d2671,#c33764);
    display:flex;
    justify-content:center;
    align-items:center;
}

/* Card */
.login-container{
    background:#fff;
    padding:40px;
    border-radius:15px;
    width:350px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
    text-align:center;
}

/* Title */
.login-container h2{
    margin-bottom:25px;
    color:#333;
}

/* Input fields */
.input-group{
    margin-bottom:20px;
    text-align:left;
}

.input-group label{
    font-size:14px;
    color:#555;
}

.input-group input{
    width:100%;
    padding:12px;
    margin-top:5px;
    border-radius:8px;
    border:1px solid #ccc;
    transition:0.3s;
}

.input-group input:focus{
    border-color:#6a11cb;
    outline:none;
}

/* Button */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:linear-gradient(135deg,#6a11cb,#2575fc);
    color:#fff;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
}

/* Links */
.links{
    margin-top:15px;
}

.links a{
    text-decoration:none;
    font-size:14px;
    color:#6a11cb;
}

.links a:hover{
    text-decoration:underline;
}
</style>

</head>

<body>

<div class="login-container">

<h2>Admin Login</h2>

<form method="post">

<div class="input-group">
<label>Username</label>
<input type="text" name="username" placeholder="Enter Username" required>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" placeholder="Enter Password" required>
</div>

<button type="submit" name="login">Sign In</button>

</form>

<div class="links">
<a href="forgot-password.php">Forgot Password?</a>
<br><br>
<a href="../index.php">Back to Home</a>
</div>

</div>

</body>
</html>