<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Danh Mục</h4>
        <div class="ml-auto text-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h4 class="card-title" style="margin: 12px 12px">Danh Sách Danh Mục</h4>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã danh mục</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tương tác</th>
              </tr>
            </thead>

            <tbody>
              
            <?php 
            

              foreach($list_category as $category){
                $status_text = ($category['status'] == 'active') ? 'Hoạt động' : 'Ngưng hoạt động';
            ?>
              <tr>
              <th scope="row"><?php echo $category['id']?>
              </th>
              <td><?php echo $category['category_name']?></td>
              <td><input type="submit" class="btn btn-success" value="<?php echo $status_text ?>"></td>
              </td>
              <td><a href="index.php?act=edit_danhmuc&id=<?php echo $category['id'] ?>"><i class="fas fa-edit btn btn-info"></i></a>
              </td>
            </tr> 
            <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
  </div>