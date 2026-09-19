<?php
require_once __DIR__ . '/../../config/conn.php';

if(isset($_POST['update_product'])){

    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    $prod_code =  isset($_POST['prod_code']) ? trim($_POST['prod_code']) : '';

    $name =  isset($_POST['name']) ? trim($_POST['name']) : '';

    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    $purchase_price = isset($_POST['purchase_price']) ? intval($_POST['purchase_price']) : 0;

    $selling_price = isset($_POST['selling_price']) ? intval($_POST['selling_price']) : 0;

    $qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0;

    $satuan = isset($_POST['satuan']) ? trim($_POST['satuan']) : '';

    if (!$product_id) {

        echo json_encode(array(
            'status' => false,
            'message' => 'Product ID tidak valid.'
        ));
        exit;
    }

    /*============================
        CHECK NEW IMAGE
    ============================*/
    $has_new_image = (
        isset($_FILES['img_prod']) &&
        $_FILES['img_prod']['error'] != UPLOAD_ERR_NO_FILE
    );

    /*============================
        UPDATE WITH NEW IMAGE
    ==============================*/

    if ($has_new_image) {

        $sql = "UPDATE products SET
                    prod_code = ?,
                    name = ?,
                    category_id = ?,
                    purchase_price = ?, 
                    selling_price = ?,
                    qty = ?,
                    satuan = ?,
                    img_prod = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssiiiissi",
            $prod_code,
            $name,
            $category_id,
            $purchase_price,
            $selling_price,
            $qty,
            $satuan,
            $image_name,
            $product_id
        );

    }


    /*============================
      UPDATE WITHOUT CHANGE IMAGE
    ==============================*/
    else {

        $sql = "UPDATE products SET
                    prod_code = ?,
                    name = ?,
                    category_id = ?,
                    purchase_price = ?, 
                    selling_price = ?,
                    qty = ?,
                    satuan = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssiiiisi",
            $prod_code,
            $name,
            $category_id,
            $purchase_price,
            $selling_price,
            $qty,
            $satuan,
            $product_id
        );

    }


    /*============
        EXECUTE
    ==============*/
    if (mysqli_stmt_execute($stmt)) {

        echo json_encode(array(
            'status' => true,
            'message' => 'Product berhasil diupdate.'
        ));

        exit;

    } else {

        echo json_encode(array(
            'status' => false,
            'message' => 'Gagal mengupdate produk.'
        ));

        exit;
    }
}

?>