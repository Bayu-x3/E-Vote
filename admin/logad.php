<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include '../assets/header.php' ?>
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
              <h3 class="card-title text-center mb-4">Login Admin</h3>
              <form method="POST">
                <div class="form-group">
                  <label for="username">USERNAME</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <br>
                <div class="form-group">
                  <label for="password">PASSWORD</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                </div>
                <br>
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
    include '../assets/conn.php';
    include '../assets/footer.php';

    $isLoggedIn = isset($_SESSION['username']);
    if ($isLoggedIn) {
      header('Location: index.php');
    }

    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $result = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username'");

      if (mysqli_num_rows($result) === 1 ) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit; 
          }
      }else {
        echo "<script>
        swal('Wrong username / Password!!', 'Masukan Username dan Password dengan benar!!', 'error');
        </script>";
      }
    }
    ?>