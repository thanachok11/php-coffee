<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
<link rel="stylesheet" href="listroom.css">
<link rel="stylesheet" href="listfood.css">
</head>
<body>

<div class="container">
    <?php
    $room_id = $_REQUEST['room_id'];
    $username = $_REQUEST['username'];
    $booking_date = date("Y-m-d");
    $booking_status = 'ยืนยันการจอง';
    $price = $_REQUEST['price'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $status_payment = "รอการชำระเงิน";
    

    $link = mysqli_connect('localhost', 'root', '', 'Hotel') or die('Connect Failed' . mysqli_connect_error());

    // Check if the room_id is not already booked for the given date range
    $sqlCheckRoom = "SELECT * FROM bookingdetail WHERE room_id = '$room_id' AND 
                    (('$checkin' BETWEEN checkin AND checkout) OR ('$checkout' BETWEEN checkin AND checkout))";
    $resultCheckRoom = mysqli_query($link, $sqlCheckRoom);

    if (mysqli_num_rows($resultCheckRoom) > 0) {
        echo "<p class='error-message'>ขออภัยมีคนจองห้องนี้แล้ว</p><br>";
        echo "<a href='room1.php?&username=$username'class='back-btn'>จองห้องใหม่</a>";
    } else {
        // Insert into bookings table
        $sql1 = "INSERT INTO bookings (booking_date, booking_status, username, status_payment) VALUES ('$booking_date', '$booking_status', '$username', '$status_payment')";
        $result1 = mysqli_query($link, $sql1);

        if (!$result1) {
            die('Error: ' . mysqli_error($link));
        }

        // Retrieve the booking_id from the newly inserted row
        $booking_id = mysqli_insert_id($link);

        // Insert into bookingdetail table
        $sql2 = "INSERT INTO bookingdetail (room_id, checkin, checkout, booking_id, price) VALUES ('$room_id', '$checkin', '$checkout', $booking_id, '$price')";
        $result2 = mysqli_query($link, $sql2);

        if (!$result2) {
            die('Error: ' . mysqli_error($link));
        }

        echo "<a href='listbookingroom.php?&username=$username'>ดูใบเสร็จ</a>";
    }

    mysqli_close($link);
    ?>
</div>

</body>
</html>
