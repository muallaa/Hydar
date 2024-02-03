<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyPick signup 2</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../index/script.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    
</head>
<body>
  <?php
    require_once '../template/header.php';
  ?>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <form action="../process/signup.php?type=<?php echo $_GET['type']?>" class="col-md-7 col-lg-5 col-xl-5 " method="post">

          <!--user name-->
          <div class="form-floating mb-4">
            <input name="name" type="text" id="form1Example13" class="form-control form-control-lg" placeholder="" />
            <label class="form-label" for="form1Example13">User name</label>
          </div>

          <!-- Email input -->
          <div class="form-floating mb-4">
            <input name="email" type="email" id="form1Example13" class="form-control form-control-lg" placeholder="" required />
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-floating mb-4">
            <input name="password" type="password" id="form1Example23" class="form-control form-control-lg" placeholder="" required />
            <label class="form-label" for="form1Example23">Password</label>
            <div class="password-toggle">
              <input type="checkbox" id="showPassword" onclick="togglePassword()" />
              <label for="showPassword">Show Password</label>
            </div>
          </div>

          <!-- Submit button -->
          <div class="row">
            <button type="submit" class=" btn btn-light btn-lg d-block ">Sign up</button>
          </div>

          <form action="./signup2.html">

          <!-- Existing form elements -->
          <br><br>
          <p>Already have an account? <a href="login.html">Log in here</a></p>
          <br>

            <script src="script.js"></script>
          </div>
          </form>
      
    </div>
  </section>
  <?php
      require_once '../template/footer.php';
  ?>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>