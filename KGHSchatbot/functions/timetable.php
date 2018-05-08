<?php
$id = 24 * 5 + 1;
$i = $id % 5;
while($i<4){
  $i = $id % 5;
  echo sprintf("SELECT * FROM user_data WHERE log_num='%d'", $id);
  $id = $id + 1;
}
if($i=4){
  $i = $id % 5;
  echo sprintf("SELECT * FROM user_data WHERE log_num='%d'", $id);
  $id = $id + 1;
}
 ?>
