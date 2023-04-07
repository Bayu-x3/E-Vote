<?php
session_start();
include '../assets/conn.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login.php');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);

if (!$result) {
  die('Error: ' . mysqli_error($conn)); // handle SQL query error
}
$scarpe = mysqli_query($conn,"SELECT * FROM voters WHERE nisn = '$nisn'");
$row = mysqli_fetch_assoc($scarpe);
$ready = $row['ready'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Voting Dashboard - E-Vote OSIS</title>
	<?php include '../assets/header.php';?>
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
						<a class="nav-link" href="../index.php">Home</a>
					</li>
     <li class="nav-item">
      <a class="nav-link" href="../kandidat.php">Kandidat</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="../infuser.php">User Information</a>
     </li>
     <li class="nav-item">
    <a class="nav-link" href="../logout.php">Logout</a>
     </li>
    </ul>
   </div>
  </div>
 </nav>
	<div class="container">
  <br><br>
	 <h1 class="my-3">Visi dan Misi Kandidat Nomor 1</h1>
  <h5>Visi: </h5>
  <ol>
    <li>Login ke akun E-Vote yang sudah di berikan.</li>
    <li>Pilih kandidat yang Anda ingin mendukung.</li>
    <li>Klik tombol "Detail" pada kartu kandidat untuk melihat profil dan program kerjanya.</li>
    <li>Setelah memilih, klik tombol "Vote" pada kartu kandidat.</li>
    <li>Anda hanya dapat memilih satu kandidat untuk setiap posisi.</li>
    <li>Setelah memilih, Anda tidak dapat mengubah pilihan Anda.</li>
    <li>Setelah selesai memilih, klik tombol "Logout" untuk keluar dari akun.</li>
  </ol>
  <h5>Misi: </h5>
  <ul>
    <li>Hanya siswa yang terdaftar di sekolah ini yang dapat memilih.</li>
    <li>Setiap siswa hanya dapat memberikan satu suara untuk setiap posisi.</li>
    <li>Suara yang sudah diberikan tidak dapat diubah.</li>
    <li>Setiap suara akan dihitung dan diverifikasi oleh panitia pemilihan.</li>
  </ul>
		<br>
		<div class="row">
			<center>
			<div class="row">
			<center>
			<!-- Candidate Card 1 -->
			<form method="POST">
			<div class="col-md-4">
				<div class="card">
					<img src="https://i.pinimg.com/originals/fd/ad/83/fdad83821e23d5e3b0b369c6cf58a453.jpg" class="card-img-top" alt="Candidate 1">
					<div class="card-body">
						<h5 class="card-title">1. Anos Voldigoad</h5>
						<p class="card-text">Calon Kandidat Ketua OSIS Nomor 2 Periode 2030 / 2031</p>
      <a href="../kandidat.php" class="btn btn-secondary">Back</a>
						<button class="btn btn-danger" name="submit">Vote</button>
</form>
					</center>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<br><br><br><?php include '../assets/footer.php';?>
</body>
</html>

<?php 
	if ($ready == 1) {
 echo"<script>
	window.location = 'already_voted.php';
	</script>";
  exit();
}
else {
		if (isset($_POST['submit'])) {
			$name = $_SESSION['nisn'];

			// update vote count
			$query2 = "UPDATE candidates SET vote_count = vote_count + 1 WHERE id = 1";

			// update voter status
			$query3 = "UPDATE voters SET ready = 1 WHERE nisn = '$nisn'";
if ($conn->query($query2) && $conn->query($query3)) {
  $result = mysqli_query($conn, "SELECT ready FROM voters WHERE nisn='$nisn'");
  $row = mysqli_fetch_assoc($result);
  $ready = $row['ready'];
  echo "<script>
        swal('Berhasil Voting!!', 'Terimakasih telah memvoting', 'success');
        </script>";
} else {
  echo "Error: " . $query2 . "<br>" . $conn->error;
}

		}
	}
?>
