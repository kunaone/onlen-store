<div class="modal fade" tabindex="-1" role="dialog" id="detailProduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Produk</h4>
      </div>
      <div class="modal-body">
		<button class="btn btn-success" style="float: right;"><i class="fa fa-print fa-fw"></i></button>
      	<img src="" class="img-rounded" style="display: block; margin: 0 auto; max-width: 300px;" alt="img-detail-prod" id="d_prod_preview">
        
        <form id="formDetailProd" action="" method="" style="margin-top: 16px;">
	        <fieldset>
	          
	          <input type="hidden" name="product_id" id="prod_id" value="">
	          
	          <div class="form-group">
	          	<label>Kode Produk</label>
		          <div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-barcode fa-fw"></i></span>
				  <input type="text" class="form-control" id="d_prod_code" style="cursor: inherit;" disabled>
				</div>
	          </div>

	          <div class="form-group">
	            <label>Nama Produk</label>
	            <input type="text" name="name" class="form-control" id="d_prod_name" style="cursor: inherit;" disabled>
	          </div>

	          <div class="form-group">
	            <label>Kategori Produk</label>
	            <div class="input-group">
	            	<span class="input-group-addon"><i class="fa fa-tags fa-fw"></i></span>
		            <input type="text" name="category" class="form-control" id="d_prod_category" style="cursor: inherit;" disabled>
	            </div>
	          </div>

	          <div class="form-group">
	            <label>Stok</label>
	            <input type="number" name="stok" class="form-control" id="d_prod_stock" style="cursor: inherit;" disabled>
	          </div>

	          <div class="form-group">
	            <label>Satuan</label>
	            <input type="text" name="satuan" class="form-control" id="d_prod_satuan" style="cursor: inherit;" disabled>
	          </div>
	          
	          <div class="form-group">
	            <label for="buy_price">Harga Beli</label>
	            <div class="input-group">
	            	<span class="input-group-addon"><strong>Rp.</strong></span>
	            	<input type="number" class="form-control" id="d_buy_price" name="purchase_price" style="cursor: inherit;" disabled>
	            </div>
	          </div>

			  <div class="form-group">
	            <label for="sell_price">Harga Jual</label>
	            <div class="input-group">
	            	<span class="input-group-addon"><strong>Rp.</strong></span>
	              <input type="number" class="form-control" id="d_sell_price" name="selling_price" style="cursor: inherit;" disabled>
	            </div>
	          </div>

	        </fieldset>
	      </form>      
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="delete_product" id="btnEditProdModal">Edit Produk</button>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->