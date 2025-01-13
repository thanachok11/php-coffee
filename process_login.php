<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
    <body>
    <?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    $link = mysqli_connect('localhost', 'root', '', 'Hotel') or die("Connect Failed".mysqli_connect_error());

    $sql = "SELECT * from member where username = '$username' and password = '$password'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($result);

    if ($result->num_rows > 0) 
    {
        header("Location: home.php?username=$username");
    } else 
    {
        echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
?>
    </body>
</html>