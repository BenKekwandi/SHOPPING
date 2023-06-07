<?php
require_once('header.php');
?>


<div class="container">
  <div id="table-wrapper">
		<table id="products" class="display" cellspacing="0" width="100%">
			<thead>
				<th>Id</th>
				<th>Name</th>
				<!--th>Category</th-->
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
				<!--th>Category</th-->
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
//require_once('footer.php');
?>

<script>
  $(document).ready(function() {
    var dataSet = [];

    $.ajax({
      url: '/admin/api-products',
      dataType: "json",
      error: function(request) {
        console.error("Error: ", request);
      },
      success: function(array) {
        for (var i = 0; i < array.length; i++) {
          var actions = `<div>
          <!--a class="btn btn-outline-success">Edit</a-->
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