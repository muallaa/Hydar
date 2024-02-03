<link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" >

<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<header class="header">
    <div class="custom-background">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <div><img src="..\img\LogoE2.PNG" alt="logo" width="110" height="90"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><strong>Home</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index/About.php"><strong>About</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><strong>Car Gallery</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><strong>Contact</strong></a> 
            </li>
            <?php
            session_start();
            if(!isset( $_SESSION['saller']) && !isset( $_SESSION['customer'])){
              ?>
            <li class="nav-item">
              <a class="nav-link" href="../index/Type.php"><strong class="btn btn-warning" >Signup</strong></a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index/login.php"><strong class="btn btn-dark" >Login</strong></a> 
            </li>
            <?php
            }else{
              ?>
                   <li class="nav-item">
              <a class="nav-link" href="../index/logout.php"><strong class="btn btn-dark" >log out</strong></a> 
            </li>
              <?php
            }
            ?>
          </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
     <div class="menu-sidebar">
        <ul class="menu-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    </div>
    </nav>
</div>
</header>


<script>
  function toggleMenu(){
const menuSidebar = document.querySelector('.menu-sidebar');
menuSidebar.classList.toggle('menu-open');
}
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>