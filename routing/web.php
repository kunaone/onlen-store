<?php

switch ($page) {
	case "products":
		include_once "./pages/products/view-product.php";
		break;
	case "edit-product":
		include_once "./pages/products/view-edit-product.php";
		break;
	case "detail-product":
		include_once "./pages/products/view-detail-product.php";
		break;
	case "categories":
		include_once "./pages/view-category.php";
		break;
	case "suppliers":
		include_once "./pages/view-supplier.php";
		break;
	case "penjualan":
		include_once "./pages/view-penjualan.php";
		break;
	case "pembelian":
		include_once "./pages/view-pembelian.php";
		break;
	case "login":
		include_once "./pages/login.php";
		break;
/* ===================
	HOMEPAGE w different role
   ===================*/
  // main
   case "transaksi-baru":
   		include_once "./pages/cashier/new-sales.php";
   		break;
   case "riwayat-transaksi":
		include_once "./pages/cashier/sales-history.php";
		break;
/* ===================
	ADMIN
   ===================*/
   case "admin":
   		include_once "./pages/admin.php";
   		break;

/* ===================
	KASIR
   ===================*/
   case "cashier":
   		include_once "./pages/cashier/main-cashier.php";
   		break;

	case "home":
		include_once "./pages/dasbor.php";
		break;
	// case $page:
	// 	include_once "./pages/".$page.".php";
	// 	break;
	// case 'login':
	// 	include_once "./pages/login.php";
	// 	break;
	// case 'register':
	// 	include_once "./pages/register.php";
	// 	break;
	default:
		include_once "./pages/404page.php";
		break;
}

?>