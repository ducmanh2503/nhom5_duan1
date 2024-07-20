<?php
// session_destroy();
// die();


    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>

    
    <table border = 1>
    
        <tr>
            <td>STT</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh </td>
            <td>Giá</td>
            <td>Số Lượng</td>
            <td></td>
            
            
        </tr>
        <?php
        
        foreach($cart as $key => $product){   
    ?>
    <tr>
            <td><?php echo $key ++ ?></td>
            
            <td><?php echo $product['product_name'] ?></td>
            <td><img style="width: 100px;" src="admin/upload/<?php echo $product['product_image'] ?>" alt=""></td>
            <td><?php echo $product['product_price'] ?></td>
            <td><input type="text" value="<?php echo $product['quantity'] ?>"></td>
            <td><a onclick="return confirm('Bạn có muốn xóa không')" href=""><button>Xoa</button></a></td>
         
        </tr>
        <?php }?>
        
       
        
    
    <tr>
            
            
            
        </tr>
        
    
    </table>
    
</body>
</html>

