<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'assets/header.php' ?>
    <title>Login Form</title>
    <style>
     body {
      font-family: 'Helvetica', sans-serif;
       background: linear-gradient(to bottom, #5a72ff, #b54cff);
       width: 100%;
       height: 100vh;
     }
   </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card mt-5">
            <div class="card-body">
              <h3 class="card-title text-center mb-4">Login Form</h3>
              <form method="POST">
                <div class="form-group">
                  <label for="nisn">NISN</label>
                  <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Enter nisn">
                </div>
                <br>
                <div class="form-group">
                  <label for="password">PASSWORD</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                </div>
                <br>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" name="remember-me" id="remember-me">
                  <label class="form-check-label" for="remember-me">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4" name="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
    <?php
    session_start();
    include 'assets/conn.php';
    include 'assets/footer.php';

    // hash cookie name
$cookieNameHash = hash('sha256', 'remember_me');

if (isset($_COOKIE[$cookieNameHash])) {
  // Cookie exists, set session
  $_SESSION['nisn'] = $_COOKIE[$cookieNameHash];
  header('Location: index.php');
  exit;
} else if (isset($_POST['submit'])) {
  // User submitted login form
  $nisn = $_POST['nisn'];
  $password = $_POST['password'];

  $result = mysqli_query($conn,"SELECT * FROM voters WHERE nisn = '$nisn'");

  if (mysqli_num_rows($result) === 1 ) {
    $row = mysqli_fetch_assoc($result);

    if ($password == $row["password"]) {
        $_SESSION['nisn'] = $nisn;

        // Set remember me cookie
        if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
          $cookieValue = $nisn;
          $cookieNameHash = hash('sha256', 'remember_me');
          setcookie($cookieNameHash, $cookieValue, time() + (60), "/");
        }

        header('Location: index.php');
        exit; 
    }
  } else {
    echo "<script>
      swal('Wrong Nisn / Password!!', 'Masukan Username dan Password dengan benar!!', 'error');
      </script>";
  }
}
?>