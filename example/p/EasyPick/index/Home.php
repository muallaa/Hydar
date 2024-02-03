<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Home.css">
</head>
<body>
    <?php
        require_once '../template/header.php';
    ?>

    <main>

    <!---slider-->

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css">
   
   <link rel="stylesheet" href="../css/slider.css">
   <div class="sliders">
<div class="slideshow">
  <div class="slider slider-1">
    <div class="item">
      <img src="../img/car2.jpeg">
    </div>
    <div class="item">
      <img src="../img/car4.jpeg">
    </div>
    <div class="item">
      <img src="../img/R.jpg">
    </div>
  </div>
</div>
</div>
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <script src="../js/slider.js"></script>
    
    <!---slider-->

    <div class=" container" >
        <div class="row g-5 my-3">
        
            <div class="col-6 px-5 ">
                <div>
                <h6 class="my-5" >Browse by Brand</h6>

                <div class="row row-cols-4 g-3 bg-white rounded rounded-3 p-4" >
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                </div>
                </div>
            </div>
            <div class="col-6 px-5">
            <div>
                <h6 class="my-5" >Browse by Type</h6>

                <div class="row row-cols-4 g-3 bg-white rounded rounded-3 p-4" >
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                    <div class="col">
                        <img src="../img/Logo1.PNG" alt="">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </main>
<?php
        require_once '../template/footer.php';
?>
</body>
</html>