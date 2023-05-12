<?php include 'config.php'; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>I SCHOOL</title>
    <link rel="stylesheet" href="../Style/style.css" />
    <link rel="icon" type="image/x-icon" href="../images/logoo.png">
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
    rel="stylesheet"
    />
</head>
<body>

    <!-- navbar -->
    <?php include 'navG.php'; ?>

    <div class="signup-box">
    <h1>Sign Up</h1>
    <form  method="post">
        <label>First Name</label>
        <input type="text" name="first_name" />
        <label>Last Name</label>
        <input type="text" name="last_name" />
        <label>Id</label>
        <input type="text" name="id" />
        <label>Email</label>
        <input type="email" name="email" />
        <label>Password</label>
        <input type="password" name="password" />
        <input type="submit" value="Sign Up" name="btn">
        <p class="para-2">
        Already have an account? <a href="index.php">Login here</a>
        </p>
    </form>
    </div>
    
</body>
</html>

<?php

if(isset($_POST['btn'])){


$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$id=$_POST['id'];
$password=$_POST['password'];


$sql = "INSERT INTO users (first_name, last_name, id2, email, password) VALUES (:first_name, :last_name, :id2, :email, :password)";
$stmt = $conn->prepare($sql);


$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':id2', $id);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

// Execute the SQL statement
if ($stmt->execute()) {
    $_SESSION['email'] = $email;
    header("Location: grade.php");
} else {
    echo "Error inserting data.";
}

}
