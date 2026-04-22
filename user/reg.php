<?php
include 'inc/config.php'; 
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $mobile  = htmlspecialchars($_POST['MobileNumber']);
    $password_raw = $_POST['pass'];

    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tblusers (FullName, MobileNumber, EmailId, Password, RegDate)
            VALUES (:name, :mobile, :email, :password, CURDATE())";
    $stmt = $dbh->prepare($sql);

    try {
        $stmt->execute([
            ':name'     => $name,
            ':mobile'   => $mobile,
            ':email'    => $email,
            ':password' => $password
        ]);

        echo "<script>
            alert('Registration successful!');
            window.location.href='login.php';
        </script>";
    } catch (PDOException $e) {
        //23000 is MySQL error for unique keys
    if ($e->getCode() === '23000') {
        echo "<script>alert('This email is already registered.');history.back();</script>";
    } else {
        echo "<script>alert('Registration failed.');history.back();</script>";
    }
    exit;
}
    
    // {
    //     echo "<script>alert('Error: Could not register.');</script>";
    // }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Art Portfolio Hub</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="reg/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="reg/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="reg.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="number" name="MobileNumber" id="mobile-no" placeholder="Mobile Number"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="reg/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
       
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>