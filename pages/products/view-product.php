<?php

include_once "./pages/products/view-add-prod.php";
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
                            <?php
                            $dummyImg = "./assets/img/no-img.png";

                            $no=1;
                            // $products = array(
                            //                     array(
                            //                         'name' => 'Mie Goreng Sakura',
                            //                         'category_name' => 'Makanan',
                            //                         'sell_price' => 'Rp 3500',
                            //                         'stok' => '40',
                            //                         'satuan' => 'dus'
                            //                     ),
                            //                     array(
                            //                         'name' => 'Kopi Kapal Api Special Sachet',
                            //                         'category_name' => 'Minuman',
                            //                         'sell_price' => 'Rp 11.500',
                            //                         'stok' => '10',
                            //                         'satuan' => 'buah'
                            //                     ),
                            //                     array(
                            //                         'name' => 'Minyak Sanco',
                            //                         'category_name' => 'Kebutuhan Masak',
                            //                         'sell_price' => 'Rp 78.500',
                            //                         'stok' => '10',
                            //                         'satuan' => 'dus'
                            //                     )
                            //                 );

                            $products = array();
                            
                            ?>
                            <table class="table <?php if(empty($products)){echo htmlspecialchars('table-bordered');} ?>">
                                <thead>
                                    <tr class="text-muted" style="font-size: 12px; letter-spacing: .8px;">
                                        <th>#NO</th>
                                        <th>GAMBAR</th>
                                        <th>PRODUK</th>
                                        <th>KATEGORI</th>
                                        <th>HARGA JUAL</th>
                                        <th>STOK</th>
                                        <th>SATUAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($products)){?>
                                    <tr>
                                        <td class="text-center text-muted" style="padding: 24px 0;" colspan="8"><strong>Belum ada produk</strong>, Silahkan isi produk untuk mulai berjualan.</td>
                                    </tr>
                                    <?php 
                                    } else {
                                        foreach($products as $data){?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($no++)?></td>
                                        <td style="vertical-align: middle;"><img src="<?=$dummyImg?>" alt="img-prod" style="width: 80px;"></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['name'])?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['category_name'])?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['sell_price'])?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['stok'])?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['satuan'])?></td>
                                        <td style="vertical-align: middle; width: 1px; white-space: nowrap;">
                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>
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