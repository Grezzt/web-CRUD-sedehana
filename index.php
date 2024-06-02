<?php
include 'koneksi.php';
$ambil = "SELECT * FROM inventaris";
$hasil = mysqli_query($koneksi, $ambil);

$data = array();
if (mysqli_num_rows($hasil) > 0) {
  while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris Barang</title>
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600&display=swap"
    rel="stylesheet"
  />
  <!--icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!-- style -->
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <!-- Navbar -->
  <nav class="navbar">
    <a href="index.php" class="navbar-logo">Skill Test.<span>Ristek</span></a>
    <!-- tengah -->
    <div class="navbar-nav">
    </div>
    <!-- kanan -->
    <div class="navbar-extra">
      <a href="login.php">Login</a>
    </div>
  </nav>
  <!-- navbar end -->

<!-- main section -->
  <section name="tabel inventaris barang user" class="tabelInventaris">
  <div class="container">
    <div class="input-box">
      <i class="uil uil-search"></i>
      <input type="text" id="searchInput" placeholder="Search here..." />
      <button id="searchButton" class="button" >Search</button>
    </div>

  <table id="data-table" class="table">
   <thead class="">
   <tr>
      <th class="table-header">id</th>
      <th class="alphabet-header">Nama</th>
      <th class="table-header">quantity</th>
      <th class="table-header">Harga</th>
    </tr>
  </thead>
    <tbody id="info-table-body" class="table-content">
      <?php
        foreach ($data as $item) {
          echo '<tr>';
          echo '<td>' . $item['id'] . '</td>';
          echo '<td>' . $item['name'] . '</td>';
          echo '<td>' . $item['quantity'] . '</td>';
          echo '<td>' . $item['price'] . '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>
  </div>
    </div>
  </section>

  <!-- js -->
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
