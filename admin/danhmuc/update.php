<div class="page-wrapper">  
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Danh Mục</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body wizard-content">
                <h4 class="card-title">Cập Nhật Danh Mục</h4>
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="index.php?act=update_danhmuc" method="post" class="m-t-40">
                    <div>
                        <section>
                            <label for="category_name">Tên danh mục</label>
                            <input id="category_name" name="category_name" type="text"
                                value="<?php echo $category['category_name'] ?>" class="required form-control">
                            <label for="status">Trạng thái</label>
                            <select id="status" name="status" class="form-control">
                                <?php

                                    $status_options = array("Active" => "Hoạt động", "Inactive" => "Ngưng hoạt động");
                                    foreach ($status_options as $key => $value) {

                                        $selected = ($key == $category['status']) ? 'selected' : '';

                                        echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                                    }
                                ?>
                            </select>
                        </section>
                        <div class="border-top" style="text-align: center;">
                            <div class="card-body">
                                <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>">
                                <input type="submit" class="btn btn-warning" value="Cập Nhật" id="btn_update"
                                    name="btn-update">
                            </div>
                        </div>
                    </div>

                    <?php
                        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                            
                    ?>
                </form>
            </div>
        </div>     
    </div>  
</div>
