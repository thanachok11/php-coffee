<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            color: #4CAF50;
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        form {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4CAF50;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            display: inline-block;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Payment</h2>

    <?php 
    $link = mysqli_connect('localhost', 'root', '', 'Hotel') or die('Connect Failed' . mysqli_connect_error());
    $username = $_REQUEST['username'];
    
    $sql = "SELECT SUM(food_price) AS total_price 
    FROM bookingfood
    WHERE username = '$username' AND status_payment = 'รอการชำระเงิน'";
    $result = mysqli_query($link,$sql);

    $sql2 = "SELECT * FROM bookingfood  WHERE username = '$username' AND status_payment= 'รอการชำระเงิน'";
    $result2 = mysqli_query($link,$sql2);

    $row = mysqli_fetch_assoc($result);
    $totalPrice = $row['total_price'];

    echo "<table>";
        echo "<tr><th>Booking ID</th><th>Price</th></tr>";

        while ($row = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td>" . $row['bkfood_id'] . "</td>";
            echo "<td>" . $row['food_price'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    echo "<table>";
        echo "<tr>";
        echo "<td style='text-align: center; font-weight: bold; color: #4CAF50;'>" ."Total Food Price: ".$totalPrice." บาท". "</td>";
        echo "</tr>";
    echo "</table>";
    
    ?>
    <form action="processpaymentfood.php?username=<?php echo urlencode($username); ?>" method="post">
        <input type="hidden" name="username" value="<?php echo urlencode($username); ?>">
        
        <label for="payment">Choose Payment Method</label>
        <select name="payment" id="payment">
            <option value="เงินสด">Cash</option>
            <option value="paypal">PayPal</option>
            <option value="opel">Mobile Banking App</option>
            <option value="audi">QR Code</option>
        </select>
        <br><br>
        <input type="submit" value="Make Payment">
    </form>
</body>
</html>
