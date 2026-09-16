<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 style="margin-top: 40px;">Transaksi Baru</h1>
                <p class="text-muted">Tambahkan produk ke tempat order</p>
            </div>
        </div>

		<div class="row">
			<div class="col-lg-8">
				<div class="panel panel-default" style="border-radius: 10px;">
					<div class="panel-body">
						<form class="input-group" action="">
							<input type="text" class="form-control" placeholder="Cari produk yang di tambahkan..">
							<span class="input-group-btn">
								<button class="btn btn-primary"><i class="fa fa-search"></i></button>
							</span>
						</form>
						
						<div class="table-responsive">
                            <?php

                            $imgPath = "./assets/img/no-img.png";

                            $no=1;
                            $transactions = array(
                                                array(
                                                    'name' => 'Mie Goreng Sakura',
                                                    'price' => 'Rp 3.500'
                                                ),
                                                array(
                                                    'name' => 'Kopi Kapal Api Special Sachet',
                                                    'price' => 'Rp 2.500'
                                                ),
                                                array(
                                                    'name' => 'Minyak Sanco',
                                                    'price' => 'Rp 78.500'
                                                )
                                            );
                            
                            ?>
                            <table class="table" style="margin-top: 12px;">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>GAMBAR</th>
                                        <th>PRODUK</th>
                                        <th>HARGA</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transactions as $data){?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?=$no++?></td>
                                        <td style="vertical-align: middle;"><img src="<?=$imgPath?>" alt="img-product" style="width: 60px;"></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['name'])?></td>
                                        <td style="vertical-align: middle;"><?=htmlspecialchars($data['price'])?></td>
                                        <td style="vertical-align: middle; text-align: center; width: 1px; white-space: nowrap;"><button class="btn btn-default"><i class="fa fa-plus fa-fw"></i></button></td> 
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-default" style="border-radius: 10px;">
					<div class="panel-heading clearfix" style="background-color: #fff; border-bottom: none; border-top-left-radius: 10px; border-top-right-radius: 10px;">
						<p class="pull-left" style="margin-top: 8px;"><strong>Order Terbaru</strong></p>
						<button class="btn btn-default pull-right">Clear</button>
					</div>
					<div class="panel-body">
						<p class="text-muted">N/A</p>
					</div>
					<div class="panel-footer" style="background-color: #fff; border-top: none; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
						<div class="clearfix">
							<p class="pull-left" style="margin-bottom: 0;"><strong>Total</strong></p>
							<p class="pull-right" style="margin-bottom: 0;"><strong>0</strong></p>
						</div>
						<button class="btn btn-primary btn-block" style="margin-top: 12px;">Checkout</button>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>