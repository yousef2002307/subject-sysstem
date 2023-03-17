<?php



session_start();
include "app/config.php";
include "app/includes/functions/functions.php";

$id = $_POST['id'];
$ids = idselective();
array_push($_SESSION['arr'],$id);
$_SESSION['arr'] = array_unique($_SESSION['arr']);
$countelective = countelective();
echo $countelective . "////";
$vals = '';


print_r($_SESSION['arr']);
$stmt = $db->prepare("SELECT * FROM `materials` where dependent = ?");
$stmt->execute(array(0));
$rows = $stmt->fetchAll();
$newarr = array();
foreach($rows as $index => $row){
    if($countelective > 1){
        if((in_array($row['id'],$ids))) {
          continue;
            }
    }
    if(!(in_array($row['id'],$_SESSION['arr']))) {
    array_push($newarr,$row);
    }
}
////we will make another sql stament to add to newarr an new item that depend on $_session['arr']
for ($i=0; $i < count($_SESSION['arr']); $i++) { 
    $stmt2 = $db->prepare("SELECT * FROM `materials` where dependent = ?");
    $stmt2->execute(array($_SESSION['arr'][$i]));
    $rows2 = $stmt2->fetchAll();
    foreach($rows2 as $index2 => $row2){
        if(!(in_array($row2['id'],$_SESSION['arr']))) {
        array_push($newarr,$row2);
        }
    }
}
foreach ($newarr as $row) {
    $id = $row['id'];
    $uname = $row['name'];
  echo "<div class='subject' data-id='$id'>
   <h3> $uname </h3> 
   <button>take it </button>
   </div>";
}

?>
