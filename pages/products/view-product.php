<?php
include_once "./pages/products/view-add-prod.php";
include_once "./pages/products/view-detail-prod.php";
include_once "./pages/products/view-edit-prod.php";

$stmt = mysqli_query($conn,
        "SELECT p.*, c.name AS category_name
         FROM products p
         LEFT JOIN categories c ON p.category_id = c.id
         ORDER BY p.id DESC");
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 style="margin-top: 40px;">Daftar Produk</h1>
                <p class="text-muted">Manage katalog produk kamu</p>
			</div>
		</div>

		<div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default" style="border-radius: 10px;">
                    <div class="panel-heading clearfix" style="background-color: #fff; border-bottom: 0; border-top-left-radius: 10px; border-top-right-radius: 10px; padding-top: 16px;">
                        <div class="form-inline pull-left" style="">
                            <form class="input-group" action="" style="width: 300px;">
                                <input type="text" class="form-control" placeholder="Cari produk yang di tambahkan..">
                                <span class="input-group-btn">
                                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                </span>
                            </form>
                            <button class="btn btn-default"><i class="fa fa-filter"></i></button>
                        </div>
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#addProd"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Baru</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table <?php if(empty($products)){echo htmlspecialchars('table-bordered');} ?>">
                                <thead>
                                    <tr class="text-muted" style="font-size: 12px; letter-spacing: .8px;">
                                        <th>#NO</th>
                                        <th>SKU</th>
                                        <th>GAMBAR</th>
                                        <th>PRODUK</th>
                                        <th>KATEGORI</th>
                                        <th>STOK</th>
                                        <th>SATUAN</th>
                                        <th>HARGA JUAL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($stmt) == 0){?>
                                    <tr>
                                        <td class="text-center text-muted" style="padding: 24px 0;" colspan="8"><strong>Belum ada produk</strong>, Silahkan isi produk untuk mulai berjualan.</td>
                                    </tr>
                                    <?php 
                                    } else {
                                        $no = 1;
                                        $defaultImg = "./assets/img/no-img.png";
                                        while($row = mysqli_fetch_assoc($stmt)){

                                          $prod_id = isset($row['id']) ? $row['id'] : '';
                                          $prod_code = isset($row['prod_code']) ? $row['prod_code'] : '';
                                          $img_prod = isset($row['img_prod']) ? $row['img_prod'] : '';
                                          $prod_name = isset($row['name']) ? $row['name'] : '';

                                          $category = isset($row['category_name']) ? $row['category_name'] : '-';
                                          $unit = isset($row['satuan']) ? $row['satuan'] : '-';
                                          $selling_price = isset($row['selling_price']) ? $row['selling_price'] : 0;
                                          $stok = isset($row['qty']) ? $row['qty'] : 0;
                                          $img_prod = isset($row['img_prod']) ? $row['img_prod'] : '';

                                    ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($no++)?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($prod_code)?></td>
                                        <!-- img product -->
                                        <td style="vertical-align: middle;">
                                            <?php if(!empty($img_prod)){ ?>
                                            <img src="uploads/products/<?= htmlspecialchars($img_prod); ?>" alt="<?= htmlspecialchars($prod_name); ?>" style="width: 45px; height: 45px; object-fit: cover;">
                                            <?php }else{ ?>
                                            <img src="<?=$defaultImg?>" style="width: 45px; height: 45px; object-fit: cover;" alt="default-img">
                                            <?php } ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($prod_name)?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($category)?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($stok)?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($unit)?></td>
                                        <td style="vertical-align: middle;">Rp <?=number_format($selling_price, 0, ',', '.');?></td>
                                        <td style="vertical-align: middle; width: 1px; white-space: nowrap;">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#detailProduct" data-id="<?=htmlspecialchars($prod_id)?>"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-warning shw-edit-modal" data-id="<?=htmlspecialchars($prod_id)?>"><i class="fa fa-pencil-square-o"></i></button>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delProduct" data-id="<?=htmlspecialchars($prod_id) ?>" data-prodcode="<?= htmlspecialchars($prod_code); ?>"><i class="fa fa-trash fa-fw"></i></button>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<!-- /=============================================/
        IF CATEGORY EMPTY SHOW WARNING MODAL
    /=============================================/-->
<div class="modal fade" id="categoryWarning" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-warning" style="border-top-left-radius: 6px; border-top-right-radius: 6px;">
        <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
        </button>
        <h4 class="modal-title">
            <strong>Perhatian</strong>
        </h4>
      </div>

      <div class="modal-body">
          <p>Sebelum menambahkan produk, silakan tambahkan data kategori terlebih dahulu.</p>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <a href="?page=categories" class="btn btn-warning">Kelola Kategori</a>
      </div>
    </div> 
  </div> 
</div>

<!-- /=============================================/
        DELETE PRODUCT SHOW VALIDATION MODAL
    /=============================================/-->
<div class="modal fade" tabindex="-1" role="dialog" id="delProduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Produk</h4>
      </div>
      <div class="modal-body">
        <p id="delete_msg"></p>
        
        <form id="formDelProduct" method="POST" action="">
            <input type="hidden" name="id" id="delete_id">
        </form>       
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="delete_product" form="formDelProduct">Hapus</button>
      </div>
    
    </div>
  </div>
</div>