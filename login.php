<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="asset/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Email" name="email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button class="btn">
        <a class="login" href="index.php">Login</a>
      </button>
      <div class="register-link">
        <p>Dont have an account? <a href="#">Register</a></p>
      </div>
    </form>

    <?php
    include 'koneksi.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $perintahSql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $data = mysqli_fetch_array($konek, $perintahSql);

        $proses = mysqli_query($konek, $perintahSql);

        if ($proses) {
            session_start();
            $_SESSION['login'] = $data['nama'];
            header('location: index.php');
        } else {
            echo "<script>alret('Gagal Login')</script>";
        }
    }
    ?>
  </div>
</body>
</html>