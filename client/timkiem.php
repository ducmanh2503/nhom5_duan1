<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>tìm  kiếm</h1>
    <?php
        foreach($tim_kiem as $tim){
            echo $tim['product_name'];
            echo $tim['product_price'];
        }
       
    ?>
</body>
</html>