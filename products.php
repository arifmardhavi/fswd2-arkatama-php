<?php 
	include 'koneksi.php';
	// include 'controller.php';

	$query = "SELECT p.name, p.price, c.name AS category_name FROM products p JOIN categories c ON c.id = p.category_id";
	$result = $conn->query($query);
?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products</title>
  </head>
  <body>
    <div class="container-fluid">
	    <div class="card mt-3">
	      <h3 class="card-title text-center">Data Products</h3>
		  <div class="card-body">
		  	<div class="table-responsive">
		  		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Price</th>
				      <th scope="col">Category</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		if ($result->num_rows > 0) {
				  			$no = 1;
				  			while($data = $result->fetch_assoc()) {
				  	?>
				    <tr>
				      <th scope="row"><?= $no++ ?></th>
				      <td><?= $data['name'] ?></td>
				      <td><?= $data['price'] ?></td>
				      <td><?= $data['category_name'] ?></td>
				    </tr>
					<?php }}else{ ?>
						<tr>
					      <td>-</td>
					      <td>-</td>
					      <td>-</td>
					      <td>-</td>
					    </tr>
					<?php } ?>
				  </tbody>
				</table>
		  	</div>
		  </div>
		</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>