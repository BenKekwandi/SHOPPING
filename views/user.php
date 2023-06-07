<?php
require_once('header.php');
?>


<div class="container">
  <div id="table-wrapper">
		<table id="products" class="display" cellspacing="0" width="100%">
			<thead>
				<th>Id</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th>Address</th>
                <th>Password</th>
                <th>Registration Date</th>
                <th>Actions</th>
			</tr>
			</thead>
			<tfoot>
				<th>Id</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th>Address</th>
                <th>Password</th>
                <th>Registration Date</th>
                <th>Actions</th>
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
      url: '/admin/api-users',
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
            array[i].surname,
            array[i].email,
            array[i].address,
            array[i].password,
            array[i].created_at,
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