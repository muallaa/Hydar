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
        <div class="col-md-7 col-lg-5 col-xl-5 ">
          <form action="../process/login.php" method="post">

          <!--User Name-->
          <div class="form-floating mb-4">
            <input type="text" id="form1Example13" class="form-control form-control-lg" placeholder="" name="username" required />
            <label class="form-label" for="form1Example13"> UserName </label>
          </div>

          <!-- Password input -->
          <div class="form-floating mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" placeholder="" name="password" required />
            <label class="form-label" for="form1Example23">Password</label>
           <div class="password-toggle">
              <input type="checkbox" id="showPassword" onclick="togglePassword()" />
              <label for="showPassword">Show Password</label>
            </div>
          </div>

   
          <!-- Submit button -->
            <div class="row">
              <button type="submit" class=" btn btn-light btn-lg d-block ">Log In</button>
              
              </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
    require_once '../template/footer.php';
  ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</html>