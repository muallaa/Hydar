<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        textarea{
            font-family:sans-serif;
            font-size: 100px;
        }
    </style>
</head>
<body>



<div class=" container">
    <div class="row py-5">
    <form action="./process.php" method="post" enctype="multipart/form-data">
    <h5 class=" text-center">عربي</h5>
    <hr>
    
    <div class=" form-floating my-2">
        <input type="text" name="three_name" class=" form-control" id="">
        <label for="">لأسم الثلاثي </label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="lakab" class=" form-control" id="">
        <label for="">اللقب </label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="mhl_melad" class=" form-control" id="">
        <label for="">محل الميلاد </label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="name_mother" class=" form-control" id="">
        <label for="">اسم الام </label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="isdar" class=" form-control" id="">
        <label for="">جهة الاصدار </label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="jnsea" class=" form-control" id="">
        <label for="">الجنسية  </label>
    </div>


    <hr>
    <h5 class=" text-center">English</h5>
    <hr>
    <div class=" form-floating my-2">
        <input type="text" name="document_type" class=" form-control" id="">
        <label for="">document_type</label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="country_code" class=" form-control" id="">
        <label for="">country_code</label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="surname" class=" form-control" id="">
        <label for="">surname</label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="given_names" class=" form-control" id="">
        <label for="">given_names</label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="Mother_name" class=" form-control" id="">
        <label for="">Mother Name</label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="document_number" class=" form-control" id="">
        <label for="">document_number</label>
    </div>

    <div class=" form-floating my-2">
        <input type="text" name="nationality" class=" form-control" id="">
        <label for="">nationality</label>
    </div>

    
    <div class=" form-floating my-2">
        <input type="date" name="birth_date" class=" form-control" id="">
        <label for="">birth_date</label>
    </div>

    

    
    <div class=" form-floating my-2">
        <input type="text" name="sex" class=" form-control" id="">
        <label for="">sex</label>
    </div>

    
    <div class=" form-floating my-2">
        <input type="date" name="expiry_date" class=" form-control" id="">
        <label for="">expiry_date</label>
    </div>

    
    <div class=" form-floating my-2">
        <input type="date" name="issu_date" class=" form-control" id="">
        <label for="">Issu_date</label>
    </div>

    <div class=" form-floating my-2">
        <input type="file" name="img" class=" form-control" id="">
        <label for="">Photo</label>
    </div>

    <button class="btn btn-primary my-4" type="submit" >submet</button>
    </form>
    </div>
</div>
    
</body>
</html>