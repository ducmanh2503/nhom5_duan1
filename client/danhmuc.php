<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Danh mục sản phẩm
      </h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8"> 
        <table class="table border text-center" style="width: 100%; margin: 0 auto;"> 
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên danh mục</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stt = 1; // Biến đếm cho số thứ tự
            foreach ($list_category as $category) {
              if ($category['status'] == 'Active') {
            ?>
            <tr>
              <th scope="row"><?php echo $stt++; ?></th>
              <td><a href="index.php?act=category_as_product&category_id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name']?></a>
                
              <input type="hidden" value="<?php echo $category['status']?>"></td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
