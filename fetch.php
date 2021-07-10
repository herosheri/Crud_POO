<?php 
	include 'model.php';

	$model = new Model();

	$rows = $model->fetch();

	//var_dump($rows);

?>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>

			<th style="text-align: center;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
			if(!empty($rows)) {
				foreach ($rows as $row) { ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['description'];?></td>
						<td style="text-align: center;">
							<a href="#" id="read" class="btn btn-info" value="<?php echo $row['id'];?>"  data-toggle="modal" data-target="#modal_record">Read</a>

							<a href="#" id="del" class="btn btn-danger" value="<?php echo $row['id']; ?>">Delete</a>

							<a href="#" id="edit" class="btn btn-warning" value="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#modal_edit">Edit</a>
						</td>
					</tr>
					<?php
				}
			}else{
				echo "no data";

				echo "
					<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						no data
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
					</div>
					";
			}
		?>
	</tbody>
</table>