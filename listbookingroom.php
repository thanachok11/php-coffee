<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Bookings</title>
    <link rel="stylesheet" href="listroom.css">
    <link rel="stylesheet" href="listfood.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="room.js" defer></script>
</head>
<body>
<?php
    $username = $_REQUEST['username'];
?>

<header>
    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a href="#" class="logo">
            <img src="image/test1.jpeg" alt="logo">
            <h2>Hotel</h2>
        </a>
        <ul class="links">
        <span class="close-btn material-symbols-rounded">close</span>
            <li><a href="home.php?username=<?php echo urlencode($username); ?>">Home</a></li>
            <li><a href="food_page.php?username=<?php echo urlencode($username); ?>">Food</a></li>
            <li><a href="room1.php?username=<?php echo urlencode($username); ?>">Room</a></li>
            <li><a href="listfood_page.php?username=<?php echo urlencode($username); ?>">BILLFOOD</a></li>
            <li><a href="listbookingroom.php?username=<?php echo urlencode($username); ?>">BILLROOM</a></li>
        </ul>
        <div class="dropdown">
            <button class="login-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 448 512">
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
            </button>
            <div class="dropdown-content">
            <a href="dashbord.php">Logout</a>
            </div>
        </div>
    </nav>
    </header>
    <div class="content">
            <h1>รายการห้องที่จอง</h1>
        </div>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'Hotel') or die('Connect Failed' . mysqli_connect_error());
    
    // Validate and sanitize input
    $username = mysqli_real_escape_string($link, $_REQUEST['username']);

    $sql = "SELECT b.*, bd.* FROM bookings b JOIN bookingdetail bd ON b.booking_id = bd.booking_id WHERE username = '$username'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ลำดับการจอง</th><th>วันที่จอง</th><th>สถานะ</th><th>ห้องที่จอง</th><th>วันที่เช็คอิน</th><th>วันที่เช็คเอาท์</th><th>ชื่อคนจอง</th><th>สถานะการชำระเงิน</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['booking_id'] . "</td>";
            echo "<td>" . $row['booking_date'] . "</td>";
            echo "<td>" . $row['booking_status'] . "</td>";
            echo "<td>" . $row['room_id'] . "</td>";
            echo "<td>" . $row['checkin'] . "</td>";
            echo "<td>" . $row['checkout'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['status_payment'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a class='back-btn' href='home.php?username=$username'>กลับไปยังหน้าหลัก</a>\t";
        echo "<a class='back-btn' href='payment.php?username=$username'>จ่ายเงิน</a>";
    } else {
        echo "No bookings found.";
    }

    mysqli_close($link);
    ?>

</body>
</html>
