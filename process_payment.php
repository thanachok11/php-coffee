<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="listroom.css">
</head>
<body>
<?php
    $username = $_REQUEST["username"];
    $status_payment = "ชำระเงินเสร็จสิ้น";

    $link = mysqli_connect('localhost', 'root', '', 'Hotel') or die("Connect Failed" . mysqli_connect_error());

    // Use mysqli_query directly for UPDATE queries
    $sql = "UPDATE `bookings` SET `status_payment` = 'ชำระเงินเสร็จสิ้น' WHERE `username` = '$username'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        echo "<p class='success-message>ชำระเงินเสร็จสิ้น</p>";
        echo "<a class='back-btn' href='home.php?username=$username'>Go Back to Home Page</a>\t";
    } else {
        // Handle errors if the query fails
        echo "Error updating payment status: " . mysqli_error($link);
    }

    mysqli_close($link);
?>
</body>
</html>
