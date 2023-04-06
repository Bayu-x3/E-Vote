<?php
session_start();
include 'assets/conn.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login.php');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM candidates WHERE nisn='$nisn'";
$query1 = "SELECT * FROM candidates";
$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Voting Dashboard - E-Vote OSIS</title>
	<?php include 'assets/header.php';?>
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
     <li class="nav-item">
						<li class="nav-tem">
							<a class="nav-link" href="index.php">Home</a>
						</li>
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
	 <h1 class="my-3">Tata cara melakukan voting:</h1>
  <ol>
    <li>Login ke akun E-Vote yang sudah di berikan.</li>
    <li>Pilih kandidat yang Anda ingin mendukung.</li>
    <li>Klik tombol "Detail" pada kartu kandidat untuk melihat profil dan program kerjanya.</li>
    <li>Setelah memilih, klik tombol "Vote" pada kartu kandidat.</li>
    <li>Anda hanya dapat memilih satu kandidat untuk setiap posisi.</li>
    <li>Setelah memilih, Anda tidak dapat mengubah pilihan Anda.</li>
    <li>Setelah selesai memilih, klik tombol "Logout" untuk keluar dari akun.</li>
  </ol>
  <h2 class="my-3">Peraturan:</h2>
  <ul>
    <li>Hanya siswa yang terdaftar di sekolah ini yang dapat memilih.</li>
    <li>Setiap siswa hanya dapat memberikan satu suara untuk setiap posisi.</li>
    <li>Suara yang sudah diberikan tidak dapat diubah.</li>
    <li>Setiap suara akan dihitung dan diverifikasi oleh panitia pemilihan.</li>
  </ul>
		<br>
			<center>
			<h1 class="my-2">KANDIDAT CALON KETUA OSIS PERIODE 3000 / 3001</h1>
		</center>
		<div class="row">
  <?php
		$detail_pages = array('candidate1.php', 'candidate2.php', 'candidate3.php');
  $i = 1;
  while ($row = mysqli_fetch_assoc($result1)) :
  ?>
    <div class="col-md-4">
      <div class="card">
        <img src="<?php echo $row['pict']?>" class="card-img-top" alt="Candidate <?php echo $i; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $i; ?>. <?php echo $row['name']; ?></h5>
          <p class="card-text"><?php echo $row['description']; ?></p>
										<a href="calon/<?php echo $detail_pages[$i-1]; ?>" class="btn btn-primary">Detail</a>
        </div>
      </div>
    </div>
  <?php
    $i++;
  endwhile;
  ?>
</div>
	<!-- Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>