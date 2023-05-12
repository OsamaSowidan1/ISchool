<?php
// Set database credentials
$host = "localhost";
$dbname = "ischool";
$username = "root";
$password = "";

// Set up a PDO connection
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Retrieve data from the database with a WHERE clause
$email = $_SESSION['email'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
$stmt->execute(['email' => $email]);

// Display data in an HTML table

while ($row = $stmt->fetch()) {
    $ar=$row["ar"];
    $eng=$row["eng"];
    $math=$row["math"];
    $deen=$row["deen"];
    $watnya=$row["watnya"];
    $science=$row["science"];
?>


  <center>
  <head>
    <link rel="stylesheet" href="../Style/degree.css">


</head>
    <div id="mydegree">
<table id="timetable">
  <caption>درجات الطالب</caption>
  <tr>
    <th>عربي</th>
    <th>انجليزي</th>
    <th>رياضيات</th>
    <th>دين</th>
    <th>وطنيه</th>
    <th>علوم</th>
  </tr>
  <tr>
    <td><?=$ar?></td>
    <td><?=$eng?></td>
    <td><?=$math?></td>
    <td><?=$deen?></td>
    <td><?=$watnya?></td>
    <td><?=$science?></td>
  </tr>
    </div>
    </center>


<?php

}


// Close the PDO connection
$pdo = null;


