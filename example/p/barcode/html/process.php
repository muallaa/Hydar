<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" > 
    <style>
        @font-face {
            font-family: ocrb;
            src: url("./font/OCR-B.otf");
        }

        @font-face {
            font-family: orca;
            src: url("./font/OcrA.ttf");
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
           
            
        }

        #barcode_char{
            font-family: ocrb;
            font-size: 24.4px;
        }

        #barcode_pdf{
           
            padding: 0px;
        }

        #barcode_pdf img{
            width: 100%;
            height: 4rem;
        }

        h6 {
            line-height: 0.5rem;
        }
        h5{
            line-height: 0.05rem;
        }

        #one h6 {
            font-size: 6px;
            font-weight: bold;
        }

        #one{
          /*  margin-left: -50%;*/
           
            font-weight: bold;
        }

        #tow{
         /*   margin-left: -50%;*/
         font-weight: bold;
          
        }
        #tow h6{
            font-size: 6px;
            font-weight: bold;
        }

        h5{
            font-weight: bold;
            font-size: 10px;
        }

        #img_small{
            position: absolute;
            width: 50px;
            margin-left: 15%;
            margin-top: 0.5rem;
            opacity: 0.3;
        }
        .img_main{
            width: 35mm;
            height: 45mm;
        }

        form{
            width: 128mm;
            height: 88mm;
            padding: 0px;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php

//Arabic

$three_name = $_POST['three_name'];
$lakab = $_POST['lakab'];
$mhl_melad = $_POST['mhl_melad'];
$name_mother = $_POST['name_mother'];
$isdar = $_POST['isdar'];
$jnsea = $_POST['jnsea'];

//English
$Mother_name = $_POST['Mother_name'];
$document_type = $_POST['document_type'];
$country_code = $_POST['country_code'];
$surname = $_POST['surname'];
$given_names = $_POST['given_names'];
$document_number = $_POST['document_number'];
$nationality = $_POST['nationality'];
$birth_date = $_POST['birth_date'];
$sex = $_POST['sex'];
$expiry_date = $_POST['expiry_date'];
$issu_date = $_POST['issu_date'];

$img = $_FILES['img']['tmp_name'];

$img_name = $_FILES['img']['name'];

$dir = './img/'.$img_name;

move_uploaded_file($img , $dir);

$barcode_date_birth = date_format(new DateTime($birth_date) , 'ymd');
$barcode_date_expiry = date_format(new DateTime($expiry_date) , 'ymd');

#$result = shell_exec("https://najwa-academy.net/test/st.py $document_type $country_code $surname $given_names $document_number $nationality $birth_date $sex $expiry_date");

$result = shell_exec("C:\wamp64\www\p\barcode\mrz-master\st.py $document_type $country_code $surname $given_names $document_number $nationality $barcode_date_birth $sex $barcode_date_expiry");


$result_barcode =  htmlspecialchars( $result , ENT_QUOTES, 'UTF-8');


?>


<div class="container">
    <div class="row py-5 my-5">
        <div class="d-flex justify-content-center">
            <form action="" class=" border" >
                <img src="./img/<?php echo$img_name;?>" alt="" id="img_small">
                <div class="d-flex justify-content-around">
                    <div class="   d-flex justify-content-start px-4">
                        <img src="./img/<?php echo$img_name;?>" alt="" class="img_main align-self-center">
                    </div>

                    <div class="  ">

                        <div class="  d-flex justify-content-between" id="one">
                            <div class=" text-start" >
                                <h6>Type / النوع / جور</h6>
                                <h5 class=" offset-3" ><?php echo $document_type;?></h5>
                                <div class=" text-start" >
                                <h6>Full Name</h6>
                                <h5><?php echo $given_names;?></h5>
                                </div>
                            </div>

                            <div class="text-center">
                                <h6>رمز البلد / كودى ولات / Country</h6>
                                <h5><?php echo $country_code;?></h5>
                            </div>

                            <div class=" text-end" >
                                <h6>رقم الجواز / زمارى باسبورت/Passport</h6>
                                <h5 class=" text-center"><?php echo $document_number;?></h5>
                                <div>
                                <h6>الاسم الثلاثي / ناوى سياني</h6>
                                <h5><?php echo $three_name;?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="  d-flex justify-content-between" id="tow">
                            <div class=" text-start">
                                <h6>Surname</h6>
                                <h5><?php echo $surname;?></h5>
                                <div>
                                <h6>Sex</h6>
                                <h6>الجنس / ره كه ز</h6>
                                <h5><?php echo $sex;?> / <?php if($sex == 'F'){ echo 'أنثى';}else{ echo 'ذكر';}?></h5>
                                </div>
                                <div class=" text-start">
                                <h6>Mother Name</h6>
                                <h5><?php echo $Mother_name;?></h5>
                                
                            </div>
                            </div>

                            <div class="text-center">
                                <div style="margin-left:5rem;">
                                <h6>Natiionalty / الجنسية / رمكة زنامة</h6>
                                <h5><?php echo $jnsea;?></h5>
                                </div>
                                <div style="" >
                                <h6>Date of Birth</h6>
                                <h6>تاريخ الميلاد / شويني له دايك بوون</h6>
                                <h5><?php echo $birth_date;?></h5>
                                </div>
                            </div>

                            <div class=" text-end">
                                <h6>اللقب/نازناو</h6>
                                <h5><?php echo $lakab;?></h5>
                                <div>
                                <h6>Place of Birth</h6>
                                <h6>محل الميلاد / شوين له دايكبوون</h6>
                                <h5><?php echo $mhl_melad;?></h5>
                                </div>
                                <div>
                                <h6>اسم الأم / ناوى نايك</h6>
                               
                                <h5><?php echo $name_mother;?></h5>
                                </div>
                            </div>
                        </div>

                       

                        <div class="  d-flex justify-content-between" id="tow">
                            <div class="text-start">
                                <h6>Date of Expiry</h6>
                                <h6>تاريخ النفاذ / روزي به سه رجوون</h6>
                                <h5><?php echo $expiry_date;?></h5>
                                
                            </div>

                            <div class="text-center">
                                <h6>Date of Issue</h6>
                                <h6>تاريخ الاصدار / روزي ده رجوون</h6>
                                <h5><?php echo $issu_date;?></h5>
                               
                            </div>

                            <div class=" text-end" >
                                <h6>Issuing Authority</h6>
                                <h6>جهة الاصدار / شويني ده رجوون</h6>
                                <h5><?php echo $isdar;?></h5>
                              
                            </div>
                        </div>
                      

                    </div>
                  

                </div>
                <div class=" bg-danger" id="barcode_pdf" >
                            <img src="./barcode/barcode.jpg" class="" alt="">
                </div>
                <div class=" px-4" id="barcode_char">
                        <?php echo $result_barcode;?>
                </div>
            </form>
        </div>
    </div>
</div>

