<?php

require_once('header.php');

?>

<div>


</div>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Categories</h6>
                    <h2 class="text-right">
                    <i class="fa fa-rocket f-left"></i>
                    <span><?php echo $data['categories']; ?></span></h2>
                    <p class="m-b-0">Product Categories<span class="f-right"><?php echo $data['categories']; ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Products</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span><?php echo $data['products']; ?></span></h2>
                    <p class="m-b-0">All Products<span class="f-right"><?php echo $data['products']; ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span><?php echo $data['orders']; ?></span></h2>
                    <p class="m-b-0">Today<span class="f-right"><?php echo $data['orders']; ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Delivered Orders</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span><?php echo $data['delivers']; ?></span></h2>
                    <p class="m-b-0">Today<span class="f-right"><?php echo $data['delivers']; ?></span></p>
                </div>
            </div>
        </div>
	</div>
</div>

<div class="container">
  <div id="table-wrapper">
		<table id="products" class="display" cellspacing="0" width="100%">
			<thead>
				<th>Id</th>
				<th>Name</th>
                <th>Category</th>
				<th>Description</th>
				<th>Image</th>
                <th>Actions</th>
			</tr>
			</thead>
			<tfoot>
				<tr >
					<th>Id</th>
				    <th>Name</th>
                    <th>Category</th>
				    <th>Description</th>
				    <th>Image</th>
                    <th>Actions</th>
				</tr>
			</tfoot>
			<tbody>
				<tr>

				</tr>
			</tbody>
		</table>
	</div>
</div>


<?php

require_once('footer.php');

?>

<script>
  $(document).ready(function() {
    var dataSet = [];

    $.ajax({
      url: '/admin/api-orders',
      dataType: "json",
      error: function(request) {
        console.error("Error: ", request);
      },
      success: function(array) {
        for (var i = 0; i < array.length; i++) {
          var actions = `<div>
          <a class="btn btn-outline-success">Edit</a>
              <a class="btn btn-outline-danger">Delete</a>
            </div>`;
          dataSet.push([
            array[i].id,
            array[i].name,
            array[i].category,
            array[i].description,
            array[i].photo,
            actions
          ]);
        }

        var table = $('#products').DataTable({
          data: dataSet,
          responsive: true,
          scrollX: 200
        });
      }
    });
  });
</script>