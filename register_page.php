<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script>
        function validateForm() {
            var password = document.forms["registrationForm"]["password"].value;
            var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value;

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="registration-form">
        <form name="registrationForm" action="process_registration.php" method="POST" onsubmit="return validateForm()">
            <h2>สมัครสมาชิก</h2>
            <div class="form-group">
                <input type="text" name="name" placeholder="Name:" required>
            </div>
            <div class="form-group">
                <input type="text" name="mobile" placeholder="Mobile:" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email:" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username:" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password:" required>
            </div>
            <div class="form-group">
                <input type="password" name="confirmPassword" placeholder="Confirm Password:" required>
            </div>
            <!-- Add a hidden input field for createDate with a value -->
            <input type="hidden" name="createDate" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
