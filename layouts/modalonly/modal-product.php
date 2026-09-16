<script>
    $(document).ready(function(){
        $('#btnAddProd').click(function(){
            <?php if($category_count == 0){ ?>

            $('#categoryWarning').modal('show');
            
            <?php } else { ?>
            
            $('#addProd').modal('show');
            
            <?php } ?>
        });
    });
</script>