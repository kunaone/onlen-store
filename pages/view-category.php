<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
				<h1 style="margin-top: 40px;">Kategori Produk</h1>
                <p class="text-muted">Manage kategori untuk katalog produk mu</p>
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
                        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Baru</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php
                            $dummyImg = "./assets/img/no-img.png";

                            $no=1;
                            $categories = array("makanan", "minuman", "produk kecantikan", "perabotan rumah")
                            
                            ?>
                            <table class="table">
                                <thead>
                                    <tr class="text-muted" style="font-size: 12px; letter-spacing: .8px;">
                                        <th>#NO</th>
                                        <th>KATEGORI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($categories as $data){?>
                                    <tr>
                                        <td style="vertical-align: middle; width: 100px; white-space: nowrap;"><?=htmlspecialchars($no++)?></td>
                                        <td class="text-capitalize" style="vertical-align: middle;"><?=htmlspecialchars($data)?></td>
                                        <td style="vertical-align: middle; width: 1px; white-space: nowrap;">
                                            <button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>