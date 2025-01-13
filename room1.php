<!DOCTYPE html>
<html>
<head>
    <title>Hotel Room</title>
   <link rel="stylesheet" href="dashbord.css"> 
   <link rel="stylesheet" href="room.css">
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
        </nav>
    </header>
    <div class="content">
    <h1>เลือกห้องพัก</h1>
    </div>
    <?php
    // เชื่อมต่อกับฐานข้อมูล
    $conn = mysqli_connect("localhost", "root", "", "Hotel");
    if (!$conn) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
    }

    // ดึงข้อมูลเมนูจากฐานข้อมูล
    $sql = "SELECT * FROM room";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $room_id = $row['room_id'];
            $username=$_REQUEST['username'];
            $roomRemark = $row['Room_remark'];
            $imageUrl = $row['image'];

            $price = $row['price'];
        
            echo "<div class='room-container'>";
            echo "<img src='$imageUrl' alt='Room Image' class='image'><br>";
            echo "</div>";
            echo "<p class='room-details'>รายละเอียดห้อง: $roomRemark ราคา: $price</p>";
            echo "<a href='bookingroom.php?room_id=$room_id&username=$username&price=$price' class='button'>จองห้อง $room_id</a>";
        }
        
    } else {
        echo "ยังไม่มีเมนูในระบบ";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
