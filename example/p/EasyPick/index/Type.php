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
  <ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="container text-center mt-4">
          <div class="alert text-center" style="background-color: rgba(35, 67, 116, 0.8); color: #ffffff; border-radius: 15px; padding: 20px;">
            <h4 class="alert-heading" style="font-size: 24px; font-weight: bold;">Welcome to Easy Pick</h4>
            <p class="mb-0" style="font-size: 18px; line-height: 1.5;">Discover, shop, or join as a valued customer, curious guest, or aspiring seller — we're here to elevate your online journey.</p>
        </div>
        
        
      </div>        
       <div class="col-md-7 col-lg-5 col-xl-5 ">
        

            <div class="row my-2">
              <a href='signup.php?type=saller'
                class=" btn btn-light btn-lg d-block ">Seller</a>
         
        </div>
      
            <div class="row">
              <a href='signup.php?type=customer' 
                class=" btn btn-light btn-lg d-block ">Customer</a>
             
          
        </div>
   <br>
   <div class="row">
    <button onclick="window.location.href='#'" type="submit" class="btn btn-lg d-block" style="background-color: #dbdbdb; color: #000000;">Guest</button>
</div>

        
        
          
          <!-- Existing form elements -->
          <br><br>
          <p> Continue Sign Up Later? <a href="login.html">Home</a></p>
         
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