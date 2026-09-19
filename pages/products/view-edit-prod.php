<div class="modal fade" tabindex="-1" role="dialog" id="editProduct" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Produk</h4>
      </div>

      <div class="modal-body">
      	<img src="" class="img-rounded" style="display: block; margin: 0 auto; max-width: 300px;" alt="img-detail-prod" id="e_prod_preview">
        
        <form id="editFormProd" enctype="multipart/form-data" style="margin-top: 16px;">
	        <fieldset>
	          
	          <input type="hidden" name="product_id" id="e_prod_id">
	          
	          <div class="form-group">
	          	<label>Kode Produk</label>
		          <div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-barcode fa-fw"></i></span>
				  <input type="text" class="form-control" name="prod_code" id="e_prod_code">
				</div>
	          </div>

	          <div class="form-group">
	            <label>Nama Produk</label>
	            <input type="text" class="form-control" name="name" id="e_prod_name">
	          </div>

	          <div class="form-group">
	          	<label>Kategori</label>
		      	<select class="form-control" name="category_id" id="e_prod_category">
				  	
				  <?php foreach($categories as $category){ ?>
		          <option value="<?= $category['id']; ?>"> 

		          <?= htmlspecialchars($category['name']); ?>
		          </option>
		          <?php } ?>
				</select>
	          </div>

	          <div class="form-group">
	            <label>Stok</label>
	            <input type="number" name="qty" class="form-control" id="e_prod_stock">
	          </div>

	          <div class="form-group">
	            <label for="prod_satuan">Satuan</label>
	            <input type="text" name="satuan" class="form-control" id="e_prod_satuan">
	          </div>
	          
	          <div class="form-group">
	            <label for="buy_price">Harga Beli</label>
	            <div class="input-group">
	            	<span class="input-group-addon"><strong>Rp.</strong></span>

	              <input type="number" class="form-control" id="e_buy_price" name="purchase_price">
	            </div>
	          </div>

			  <!-- selling price -->
			  <div class="form-group">
	            <label for="sell_price">Harga Jual</label>
	            <div class="input-group">
            	  <span class="input-group-addon"><strong>Rp.</strong></span>
	              <input type="number" class="form-control" id="e_sell_price" name="selling_price">
	            </div>
	          </div>

	          <!-- Upload File Gambar Produk -->
              <div class="form-group">
                <label for="img_prod">Gambar Produk</label>
                <input type="file" name="img_prod" id="img_prod" accept="image/jpeg,image/png">
                <span class="help-block">*Opsional</span>
              </div>

	        </fieldset>
	      </form>      
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="delete_product" form="editFormProd">Update Produk</button>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->