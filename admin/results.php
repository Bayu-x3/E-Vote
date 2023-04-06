<?php
session_start();
include '../assets/conn.php';

if (!isset($_SESSION['username'])) {
  header('Location: logad.php');
}
$result = mysqli_query($conn,"SELECT * FROM candidates vote_count");

// Query baru untuk variabel $result1
$result1 = mysqli_query($conn,"SELECT * FROM candidates name");
$data1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

$result2 = mysqli_query($conn,"SELECT * FROM candidates ORDER BY vote_count desc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php include'../assets/header.php';?>
</head>
<body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
     <div class="container-fluid">
      <a class="navbar-brand" href="index.php">E-Vote Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav ms-auto">
        <li class="nav-tem">
         <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="kandidat.html">Vote Results</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="../logout.php">Logout</a>
        </li>
       </ul>
      </div>
     </div>
    </nav>
    <br><br>
   <div class="col-sm-12" >
    <div class="card">
      <div class="card-body">
        <center><h1>Vote result</h1>
<table class="table table-striped">
<tr>
    <th>No</th>
    <center><th>Nama</th></center>
    <th>Vote Count</th>
</tr>
<?php $i = 1; ?>
<?php while( $row = mysqli_fetch_assoc($result) ): ?>
<?php while( $row1 = mysqli_fetch_assoc($result2) ): ?>
<tr>
    <td><?= $i ?></td>    
    <td><?= $row1["name"]; ?></td>     
    <td><?= $row1["vote_count"]; ?></td> 
 </tr>
<?php $i++; ?>
<?php endwhile; ?>
<?php endwhile; ?>
        </table>
        <div class="col-md-6">
    <!-- Card for Voting Results Chart -->
    <div class="card">
        <div class="card-header">
            Vote Results Chart
        </div>
        <div class="card-body">
            <canvas id="voteChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('voteChart').getContext('2d');
                var voteChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [<?php foreach ($data1 as $row) { echo '"' . $row['name'] .'",';}?>],
                        datasets: [{
                            label: 'Vote Count',
                            data: [<?php mysqli_data_seek($result, 0); while ($p = mysqli_fetch_array($result)) { echo '"' . $p['vote_count'] .'",';}?>],
                            backgroundColor: [
                                '#FF6384',
                                '#36A2EB',
                                '#FFCE56',
                                '#8c564b',
                                '#e377c2',
                                '#7f7f7f',
                                '#bcbd22',
                                '#17becf',
                                '#9467bd',
                                '#d62728',
                                '#2ca02c'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            </script>
        </div>
    </div>
</div>
    </div>
    </div>
    </center>
</body>
</html>