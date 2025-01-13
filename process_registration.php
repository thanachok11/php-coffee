<?php
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$createDate = date("Y-m-d");
$isAtive = 'T';

$link = mysqli_connect('localhost', 'root', '', 'Hotel') or die("Connect Failed" . mysqli_connect_error());
$sql = "INSERT INTO member(username, password, name, email, mobile, createDate, isAtive) VALUES ('$username', '$password', '$name', '$email', '$mobile', '$createDate', '$isAtive')";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "Fail: " . mysqli_error($link); // Display the error message
} else {
    header("Location: login.php");
}

mysqli_close($link); // Close the database connection
?>
