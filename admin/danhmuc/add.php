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
                <h4 class="card-title">Thêm Mới Danh Mục</h4>
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="index.php?act=add_danhmuc" method="post" class="m-t-40">
                    <div>
                        <section>
                            <label for="category_id">Mã danh mục</label>
                            <input id="category_id" name="category_id" type="text" class="required form-control" disabled>
                            <label for="category_name">Tên danh mục</label>
                            <input id="category_name" name="category_name" type="text" class="required form-control">                  
                        </section>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; ">
                        <input id="btn-them" type="submit" name="add_cate" value="Thêm mới"
                            class="btn btn-success" style="margin-top: 12px">
                    </div>
                </form>
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                ?>
            </div>
        </div>  
    </div>
</div>