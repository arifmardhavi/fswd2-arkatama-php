<?php 


	function addCategories()
	{
		include 'koneksi.php';

		$sql = "insert into categories values 
		(default,'kategori1', NOW(), NOW()),
		(default,'kategori2', NOW(), NOW()),
		(default,'kategori3', NOW(), NOW()),
		(default,'kategori4', NOW(), NOW()),
		(default,'kategori5', NOW(), NOW()),
		(default,'kategori6', NOW(), NOW()),
		(default,'kategori7', NOW(), NOW()),
		(default,'kategori8', NOW(), NOW()),
		(default,'kategori9', NOW(), NOW()),
		(default,'kategori10', NOW(), NOW()),
		(default,'kategori11', NOW(), NOW()),
		(default,'kategori12', NOW(), NOW()),
		(default,'kategori13', NOW(), NOW()),
		(default,'kategori14', NOW(), NOW()),
		(default,'kategori15', NOW(), NOW()),
		(default,'kategori16', NOW(), NOW()),
		(default,'kategori17', NOW(), NOW()),
		(default,'kategori18', NOW(), NOW()),
		(default,'kategori19', NOW(), NOW()),
		(default,'kategori20', NOW(), NOW()),
		(default,'kategori21', NOW(), NOW()),
		(default,'kategori22', NOW(), NOW()),
		(default,'kategori23', NOW(), NOW()),
		(default,'kategori24', NOW(), NOW()),
		(default,'kategori25', NOW(), NOW()),
		(default,'kategori26', NOW(), NOW()),
		(default,'kategori27', NOW(), NOW()),
		(default,'kategori28', NOW(), NOW()),
		(default,'kategori29', NOW(), NOW()),
		(default,'kategori30', NOW(), NOW())
		";

		if ($conn->query($sql) === true ) {
			echo 'success add categories';
		}else{
			echo 'failed add cate';
		}
	}

	function addProducts()
	{
		include 'koneksi.php';

		$sql = "insert into products values 
			(default, 1, 'produk1', 'lorem', 1, 'waiting', now(), now(), 1, now(), 1),
			(default, 2, 'produk2', 'lorem', 2, 'waiting', now(), now(), 2, now(), 2),
			(default, 3, 'produk3', 'lorem', 3, 'waiting', now(), now(), 3, now(), 3),
			(default, 4, 'produk4', 'lorem', 4, 'waiting', now(), now(), 4, now(), 4),
			(default, 5, 'produk5', 'lorem', 5, 'waiting', now(), now(), 5, now(), 5),
			(default, 6, 'produk6', 'lorem', 6, 'waiting', now(), now(), 6, now(), 6),
			(default, 7, 'produk7', 'lorem', 7, 'waiting', now(), now(), 7, now(), 7),
			(default, 8, 'produk8', 'lorem', 8, 'waiting', now(), now(), 8, now(), 8),
			(default, 9, 'produk9', 'lorem', 9, 'waiting', now(), now(), 9, now(), 9),
			(default, 10, 'produk10', 'lorem', 10, 'waiting', now(), now(), 10, now(), 10),
			(default, 11, 'produk11', 'lorem', 11, 'waiting', now(), now(), 11, now(), 11),
			(default, 12, 'produk12', 'lorem', 12, 'waiting', now(), now(), 12, now(), 12),
			(default, 13, 'produk13', 'lorem', 13, 'waiting', now(), now(), 13, now(), 13),
			(default, 14, 'produk14', 'lorem', 14, 'waiting', now(), now(), 14, now(), 14),
			(default, 15, 'produk15', 'lorem', 15, 'waiting', now(), now(), 15, now(), 15),
			(default, 16, 'produk16', 'lorem', 16, 'waiting', now(), now(), 16, now(), 16),
			(default, 17, 'produk17', 'lorem', 17, 'waiting', now(), now(), 17, now(), 17),
			(default, 18, 'produk18', 'lorem', 18, 'waiting', now(), now(), 18, now(), 18),
			(default, 19, 'produk19', 'lorem', 19, 'waiting', now(), now(), 19, now(), 19),
			(default, 20, 'produk20', 'lorem', 20, 'waiting', now(), now(), 20, now(), 20),
			(default, 21, 'produk21', 'lorem', 21, 'waiting', now(), now(), 21, now(), 21),
			(default, 22, 'produk22', 'lorem', 22, 'waiting', now(), now(), 22, now(), 22),
			(default, 23, 'produk23', 'lorem', 23, 'waiting', now(), now(), 23, now(), 23),
			(default, 24, 'produk24', 'lorem', 24, 'waiting', now(), now(), 24, now(), 24),
			(default, 25, 'produk25', 'lorem', 25, 'waiting', now(), now(), 25, now(), 25),
			(default, 26, 'produk26', 'lorem', 26, 'waiting', now(), now(), 26, now(), 26),
			(default, 27, 'produk27', 'lorem', 27, 'waiting', now(), now(), 27, now(), 27),
			(default, 28, 'produk28', 'lorem', 28, 'waiting', now(), now(), 28, now(), 28),
			(default, 29, 'produk29', 'lorem', 29, 'waiting', now(), now(), 29, now(), 29),
			(default, 30, 'produk30', 'lorem', 30, 'waiting', now(), now(), 30, now(), 30)
		";

		if ($conn->query($sql) === true ) {
			echo 'success add products';
		}else{
			echo 'failed add products';
		}
	}

	// addCategories();
	// addProducts();


?>