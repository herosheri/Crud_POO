<?php 

include 'model.php';

$edit_id = $_POST['edit_id'];

$model = new Model();

$row = $model->edit($edit_id);

//var_dump($row);

if(!empty($row)) { ?>

	 <form action="" method="post" id="form">
            <div id="result"></div>
            <div class="form-group">
              <input type="hidden" id="edit_id" value="<?php echo $row['id'];?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" id="edit_title" value="<?php echo $row['title'];?>" class="form-control">
            </div>
             <div class="form-group">
              <label for="">Description</label>
              <textarea type="text" id="edit_description" name="description"  class="form-control" rows="3" cols=""><?php echo $row['description']?></textarea>
            </div>
      </form>


<?php
}
?>