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
    <a href="index.php"><img src="asset/images.png" alt=""></a>
    <a href="index.php" class="navbar-logo">Skill Test.<span>Ristek</span></a>
    <!-- tengah -->
    <div class="navbar-nav">
    </div>
    <!-- kanan -->
    <div class="navbar-extra">
      <a href="login.html">Login</a>
    </div>
  </nav>
  <!-- navbar end -->

 <section class="loginForm" id="">
    <div class="containerLogin">
     <div class="card-container">
     <div class="left">
        <div class="left-container">
          <img src="asset/LogoRistek.jpg" alt="">
          <h2>Login Form</h2>
          <p>Login Sebagai Admin.</p><br>
        </div>
       </div>
        <div class="right">
         <div class="right-container">
             <form action="aksi_login.php" method="POST">
              <div class="formLogin">
              <h1></h1>
           <input type="text" name="name" placeholder="Username">
           <input type="text" name="password" placeholder="Password">
        </div>

      <button type="submit" name="login" id = "loginButton">Login</button>
  </form>
   </div>
    </div>
  </div>
  </div>
 </section>



  <!-- feather icon -->
  <script> feather.replace();</script>

  <!-- Javascript -->
  <script src="js/script.js"></script>
</body>
</html>