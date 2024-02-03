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
        <div class="container text-center mt-4">
          <div class="alert" style="background-color: rgba(35, 67, 116, 0.8); color: #ffffff; border-radius: 15px;">
              <h6 class="alert-heading">Our mission is to help you discover your dream car. Your information is collected with the utmost care and confidentiality.</h6>
          </div>
      </div>            
        <div class="col-md-7 col-lg-5 col-xl-5 ">
          <form action="../process/signup2.php?email=<?php echo $_GET['email']?>" method="post">
          <!--price range-->
          <div class="form-floating mb-4">
            <select id="form1Example23" class="form-select form-select-lg" name="price" required >
              <option value="select">-</option>
              <option value="50.000 SR - 100.000 SR">50.000 SR - 100.000 SR </option>
              <option value="200.000 SR - 300.000 SR">100.000 SR - 200.000 SR</option>
              <option value="200.000 SR - 300.000 SR">200.000 SR - 300.000 SR</option>
              <option value="300.000 SR - 600.000 SR">300.000 SR - 600.000 SR</option>
            </select>
            <label class="form-label" for="form1Example23">Price range </label>
          </div>
          
          <!-- date input -->
          <div class="form-floating mb-4">
            <input name="date" type="date" id="form1Example13" class="form-control form-control-lg" placeholder="" required />
            <label class="form-label" for="form1Example13">Date of Birth</label>
          </div>

          <!-- number of children input -->
          <div class="form-floating mb-4">
            <input name="n_child" type="text" id="form1Example23" class="form-control form-control-lg" placeholder="" required />
            <label class="form-label" for="form1Example23">Number of children</label>
          </div>

          <!-- Matiral Statue -->
          <div class="form-floating mb-4">
            <select name="m_status" id="form1Example23" class="form-select form-select-lg" required >
              <option value="select">-</option>
              <option value="single">Single</option>
              <option value="married">Married</option>
            </select>
            <label class="form-label" for="form1Example23">Marital Status</label>
          </div>

          <!-- phone -->
          <div class="form-floating mb-4">
            <input name="phone" type="text" id="form1Example23" class="form-control form-control-lg" placeholder="" required />
            <label class="form-label" for="form1Example23">Phone</label>
          </div>

            <!-- Gender -->
            <div class="form-floating mb-4">
            <select name="gender" id="form1Example23" class="form-select form-select-lg" required >
              <option value="select">-</option>
              <option value="male">male</option>
              <option value="fmale">fmale</option>
            </select>
            <label class="form-label" for="form1Example23">Gender</label>
          </div>

          <!-- Submit button -->
          <div class="row">
            <button type="submit" class=" btn btn-light btn-lg d-block ">Submit</button>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>