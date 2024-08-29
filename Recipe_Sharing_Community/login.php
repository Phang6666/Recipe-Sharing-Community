<?php

session_start();

if(isset($_SESSION['email'])) {
    header('Location: index.php');
    echo "<script>
            alert('You are already login');
          </script>";
    //add login logout in the header php file
    //change login into user name 
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '', 'mummumrecipe');

    if(!$conn){
        die('Connection failed: ' . mysqli_connect_error());
    }

    $query = "SELECT * FROM user WHERE email='$email' AND PASSWORD='" . md5($password). "'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {

        $_SESSION['email'] = $email;

        header('Location: index.php');

        exit();
    } else {
        $error = 'Invalid email or password.';
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="account_style.css">
</head>
<body>
    <?php if (isset($error)): ?>
        <p><?php echo "<script> alert('$error'); </script>";?> </p>
    <?php endif; ?>
    <form method="POST" action="">
        <a class="back-btn" href='index.php'>&lt; Back</a>
        <div id="title">
        <label>Login</label>
        </div>

        <label>Email:</label>
        <input type="email" name="email" required>

        <br>

        <label>Password:</label>
        <input type="password" name="password" required>

        <br>
        
        <input type="submit" value="Login" >

        <br>

        <a href="create.php">Not yet have an account? Create here</a>
    </form>

</body>
</html>