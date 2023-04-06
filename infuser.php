<?php
 session_start();
 include 'assets/conn.php';

 if (!isset($_SESSION['nisn'])) {
  header('Location: login.php');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>User Information</title>
 <?php include 'assets/header.php'?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
   <a class="navbar-brand" href="index.php">E-Vote</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
					<li class="nav-tem">
						<a class="nav-link" href="index.php">Home</a>
					</li>
     <li class="nav-item">
      <a class="nav-link" href="kandidat.php">Kandidat</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="infuser.php">User Information</a>
     </li>
     <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
     </li>
    </ul>
   </div>
  </div>
 </nav>
 <div class="container">
 <div class="col-sm-12" >
    <div class="card">
      <div class="card-body">
        <center><br><br>
        <h3 style="color: black;">Information User</h3>
<table class="table table-striped">
  <thead>
  </thead>
  <tbody>
  <tr>
      <th scope="row">Nama:</th>
      <td><?= $row["name"]; ?></td>
    </tr>
    <tr>
      <th scope="row">Kelas:</th>
      <td><?= $row["class"]; ?></td>
    </tr>
    <tr>
      <th scope="row">Nisn:</th>
      <td><?= $row["nisn"]; ?></td>
    </tr>
    <tr>
      <th scope="row">Status Vote:</th>
        <td><?= $row["ready"] ? '<font color="green">Sudah Vote!!</font>' : '<font color="red">Belum Vote!!</font>'; ?></td>
       </tr>
       <tr>
         <th scope="row">RealTime</th>
           <td id="jam"></td>
             </tr>
            </tbody>
           </table>
          </center>
         </div>
        </div>
       </div>
      </div>
    <script>
    setInterval(function() {
    var now = new Date();
    var jam = now.getHours();
    var menit = now.getMinutes();
    var detik = now.getSeconds();
    jam = jam < 10 ? "0" + jam : jam;
    menit = menit < 10 ? "0" + menit : menit;
    detik = detik < 10 ? "0" + detik : detik;
    var waktu = jam + ":" + menit + ":" + detik;
    var selamat = "";

    if (jam >= 0 && jam < 12) {
        selamat = "Selamat pagi!";
    } else if (jam >= 12 && jam < 18) {
        selamat = "Selamat siang!";
    } else {
        selamat = "Selamat malam!";
    }

    document.getElementById("jam").innerHTML = selamat + " " + waktu;
}, 1000);

    </script></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
 </div>
</body>
</html>
