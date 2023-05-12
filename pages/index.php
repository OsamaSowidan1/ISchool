<?php include 'config.php'; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>I SCHOOL</title>
    <link rel="stylesheet" href="../Style/style.css" />
    <link rel="stylesheet" href="../Style/alert.css" />
    <link rel="icon" type="image/x-icon" href="../images/logoo.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"rel="stylesheet"/>
</head>
<body>
    <?php include'navG.php';?>
    <div class="login-box">
    <h1>Login</h1>
    <form method="post">
        <label>Email</label>
        <input type="email" name="email" />
        <label>Password</label>
        <input type="password" name="password" />
        <input type="submit" value="Login" name="btn" />
        <p class="para-2">
            Not have an account? <a href="signup.php">Sign Up Here</a>
            </p>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST['btn'])){



$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);




$stmt->execute();

if ($stmt->rowCount() == 1) {
    $_SESSION['email'] = $email;
    if($email=='admin@gmail.com' and $password=='123'){
        header("Location: admin.php");
    }else
    header("Location: grade.php");
} else {
        echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
    Username or password not Corect
    </div>';
}
$conn = null;
}
?>