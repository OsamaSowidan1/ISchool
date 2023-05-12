<?php include 'config.php';
include 'navG.php' ;?>
<head>
    <title>I SCHOOL</title>
    <link rel="stylesheet" href="../Style/admin.css" />
    <link rel="stylesheet" href="../Style/alert2.css" />
    <link rel="icon" type="image/x-icon" href="../images/logoo.png">
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
    rel="stylesheet"
    />
</head>
<div class="signup-box" dir='rtl'>
    <h1>درحات الطالب</h1>
    <center>
    <form  method="post" >
        <label>رقم الطالب</label>
        <input type="text" name="id" />
        <label>عربي</label>
        <input type="text" name="ar" />
        <label>انجليزي</label>
        <input type="text" name="eng" />
        <label>رياضيات</label>
        <input type="text" name="math" />
        <label>دين</label>
        <input type="text" name="deen" />
        <label>وطنيه</label>
        <input type="text" name="watnya" />
        <label>علوم</label>
        <input type="text" name="science" />
        <input type="submit" value="انطلق" name="btn">
    </form>
    </center>
    </div>

    <?php

if(isset($_POST['btn'])){



$id=$_POST['id'];
$ar=$_POST['ar'];
$eng=$_POST['eng'];
$math=$_POST['math'];
$deen=$_POST['deen'];
$watnya=$_POST['watnya'];
$science=$_POST['science'];


$sql = "UPDATE users SET id = $id , ar = $ar , eng =$eng , math = $math , deen = $deen , watnya = $watnya , science = $science WHERE id2 = $id";

$stmt = $conn->prepare($sql);


// Execute the SQL statement
if ($stmt->execute()) {
    echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
    Done
    </div>';
} else {
    echo "Error inserting data.";
}

}
