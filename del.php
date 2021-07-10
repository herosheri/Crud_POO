<?php 
 include 'model.php';


 echo $del_id = $_POST['del_id'];
 $del_id = $_POST['del_id'];


 $model = new Model();

 $del = $model->del($del_id);

?>