<script>
    /*==================
        ADD MODAL
    ==================*/
    $(document).ready(function(){
        $('#btnAddProd').click(function(){
            <?php if($category_count == 0){ ?>

            $('#categoryWarning').modal('show');
            
            <?php } else { ?>
            
            $('#addProd').modal('show');
            
            <?php } ?>
        });

        <?php if($has_errors){ ?>
        
        $('#addProd').modal('show');
        
        <?php } ?>
    });

    /*==================
        DELETE MODAL
    ==================*/
    $('#delProduct').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var prodcode = button.data('prodcode');

        $('#delete_id').val(id);
        $('#delete_msg').text('Apakah anda ingin menghapus produk ' + prodcode + '?');
    });


    /*==================
      GET DATA by ID
    ==================*/
    function getProduct(id, callback) {
        $.ajax({
            url: './process/products/get_product_id.php',
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(product) {
                callback(product);
            }
        });
    }
    /*==================
        DETAIL MODAL
    ==================*/
    var currentProduct = '';

    $('#detailProduct').on('show.bs.modal', function(event) {

        var id = $(event.relatedTarget).data('id');

        getProduct(id, function(product) {

            currentProduct = product;

            $('#d_prod_id').val(product.id);
            $('#d_prod_code').val(product.prod_code);
            $('#d_prod_name').val(product.name);
            $('#d_prod_category').val(product.category_name);
            $('#d_prod_stock').val(product.qty);
            $('#d_prod_satuan').val(product.satuan);
            $('#d_buy_price').val(parseFloat(product.purchase_price));
            $('#d_sell_price').val(parseFloat(product.selling_price));

            if(product.img_prod){
          
              $('#d_prod_preview').attr('src', './uploads/products/' + product.img_prod);
            
            }else{

              $('#d_prod_preview').attr('src', './assets/img/no-img.png');
            }

            $('#d_prod_preview').on('error', function() {
              
              $(this).attr('src', './assets/img/no-img.png');
            
            });

            $('#btnEditProdModal').data('id', product.id);
        });

    });

    $('#detailProduct').on('hidden.bs.modal', function(){
        
        history.pushState(null, '', '?page=products');
    });

    /*==================
        EDIT PRODUCT
    ==================*/
    function fillEditProd(product){

        $('#e_prod_id').val(product.id);
        $('#e_prod_code').val(product.prod_code);
        $('#e_prod_name').val(product.name);
        $('#e_prod_category').val(product.category_id);
        $('#e_prod_stock').val(product.qty);
        $('#e_prod_satuan').val(product.satuan);

        $('#e_buy_price').val(parseFloat(product.purchase_price));
        $('#e_sell_price').val(parseFloat(product.selling_price));

        $('#btnEditProd').data('id', product.id);

        if(product.img_prod){
          
          $('#e_prod_preview').attr('src', './uploads/products/' + product.img_prod);
        
        }else{

          $('#e_prod_preview').attr('src', './assets/img/no-img.png');
        }

        $('#e_prod_preview').on('error', function() {
          
          $(this).attr('src', './assets/img/no-img.png');
        
        });
    }

    function openEditProduct(product, id) {

        fillEditProd(product);
        history.pushState(
            null,
            '',
            '?edit-product&id=' + id
        );

        $('#editProduct').modal('show');
    }

    /*====================================
     SHOW EDIT MODAL FROM TABLE PRODUCTS
    ====================================*/
    $('.shw-edit-modal').click(function() {

        var id = $(this).data('id');

        getProduct(id, function(product) {
            openEditProduct(product, id);
        });

    });

    /*====================================
   SHOW EDIT MODAL FROM DETAIL MODAL PRODUCT
    ====================================*/
    $('#btnEditProdModal').click(function() {

        var id = $(this).data('id');

        $('#detailProduct').one('hidden.bs.modal', function() {
            openEditProduct(currentProduct);
        });

        $('#detailProduct').modal('hide');
    });

    $('#editProduct').on('hidden.bs.modal', function(){

        history.pushState(null, '', '?page=products');
    })

    /*==================
    SUBMIT FORM PRODUCT
    ==================*/
    $('#editFormProd').submit(function(e) {

        e.preventDefault();

        var formData = new FormData(this);

        formData.append('update_product', '1');

        for (var pair of formData.entries()) {
            console.log(pair[0], pair[1]);
        }

        $.ajax({
            url: '?page=products',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',

            success: function(response) {

                if (response.status) {
                    
                    console.log('UPDATE RESPONSE:', response);

                    $('#editProduct').modal('hide');
                    
                    history.pushState(
                            null,
                            '',
                            '?page=products'
                    );

                    location.reload();

                } else {

                    alert(response.message);
                }
            },

           error: function(xhr, status, error) {

                console.log('STATUS:', xhr.status);
                console.log('ERROR:', error);
                console.log('RESPONSE:', xhr.responseText);
            }
        });

    });
</script>