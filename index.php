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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Voting Dashboard - E-Vote</title>
  <?php include 'assets/header.php' ?>
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
  <br><br>
		<h1 class="my-3">Selamat Datang Di Webiste E-Vote Pemilihan Ketua Osis Periode 3000 / 3031</h1>
  <p>Ini adalah sebuah platform atau website voting online yang dirancang khusus untuk membantu proses pemilihan ketua osis yang baru di sekolah. Platform ini dirancang untuk memberikan kemudahan, keterbukaan, dan transparansi dalam proses pemilihan, sehingga seluruh siswa dan siswi dapat terlibat secara aktif dalam proses pemilihan.</p>
		<p>Dengan webiste ini, proses pemilihan menjadi lebih mudah, cepat dan efisien. Karena kalau masih melakukan voting dengan kertas, itu hanya akan menambah limbah saja dan tidak memanfaatkan teknologi pada zaman sekarang. Lalu pemilih dapat mengakses platform ini dengan mudah, menggunakan perangkat apapun yang mereka miliki, baik itu laptop, smartphone, atau tablet. Dalam platform ini, pemilih dapat melihat beberapa kandidat yang menjadi calon ketua osis, mengetahui profil dan visi misi mereka, serta memberikan suara dengan mudah dan cepat.</p>
		<p>E-Voting OSIS juga dirancang dengan fitur-fitur keamanan yang memadai, seperti sistem verifikasi pemilih dan perlindungan data pribadi, untuk memastikan bahwa proses pemilihan berlangsung dengan adil dan tidak terjadi kecurangan. Dengan semua fitur yang ditawarkan, E-Voting OSIS menjadi solusi yang ideal untuk organisasi siswa di sekolah yang ingin meningkatkan transparansi dan partisipasi dalam proses pemilihan mereka.
<br><br>
<center>
	<a href="kandidat.php" class="btn btn-outline-primary">LIHAT KANDIDAT</a>
</center>
</body>
</html>