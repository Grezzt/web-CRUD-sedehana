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
    <a href="#home" class="navbar-logo">Himatika.<span>Ristek</span></a>
    <!-- tengah -->
    <div class="navbar-nav">
    </div>
    <!-- kanan -->
    <div class="navbar-extra">
      <!-- <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a> -->
      <a href="login.php">Logout</a>
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
    <div class="tambahItem">
        <button class = "tombolTambah" onclick = "openTambahModal()">Tambah Barang</button>
    </div>

  <table id="data-table" class="table">
   <thead class="">
   <tr>
      <th class="table-header">id</th>
      <th class="alphabet-header">Nama</th>
      <th class="table-header">quantity</th>
      <th class="table-header">Harga</th>
      <th class = "th"></th>
      <th class = "th"></th>
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
          echo '<td><button class="tombolEdit" id="editButton" data-id="' . $item['id'] . '" onclick="openEditModal(this)">Edit</button></td>';
          echo '<td><button class="tombolHapus" id="hapusButton" data-id="' . $item['id'] . '" onclick="openDeleteModal(this)">Hapus</button></td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

    <!-- Modal Tambah Barang -->
    <div id="modalFormTambah" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeTambahModal()">&times;</span>
        <h2>Tambah Barang</h2>
        <form id="formTambahBarang" method="POST">
          <label for="namaBarang">Nama Barang:</label>
          <input type="text" id="namaBarang" name="namaBarang" required>

          <label for="quantityBarang">Quantity:</label>
          <input type="number" id="quantityBarang" name="quantityBarang" required>

          <label for="hargaBarang">Harga:</label>
          <input type="number" id="hargaBarang" name="hargaBarang" required>

          <button type="submit">Tambah</button>
        </form>
      </div>
    </div>

    <!-- Modal Edit Barang -->
    <div id="modalFormEdit" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h2>Edit Barang</h2>
        <form id="formEditBarang" method="POST">
            <input type="hidden" id="editId" name="id">
            <label for="editName">Nama Item:</label>
            <input type="text" id="editName" name="name"><br><br>
            <label for="editQuantity">Quantity:</label>
            <input type="text" id="editQuantity" name="quantity"><br><br>
            <label for="editPrice">Price:</label>
            <input type="text" id="editPrice" name="price"><br><br>
            <button type="submit">Simpan Perubahan</button>
        </form>
      </div>
    </div>

    <!-- modal hapus item -->
    <div id="modalFormDelete" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeDeleteModal()">&times;</span>
        <h2>Konfirmasi Hapus</h2>
        <h4>Apakah anda yakin untuk menghapus barang</h4>
        <form id="formDeleteBarang" method="POST">
            <input type="hidden" id="deleteId" name="id">
            <button type="submit" >Hapus</button>
            <button type="button" onclick="closeDeleteModal()">Urungkan</button>
        </form>
      </div>
    </div>

    </div>
  </div>
    </div>
  </section>

  <!-- js -->
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
