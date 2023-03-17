<?php
ob_start();
session_start();
$name = 'user';
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
}


include "app/init.php";
$ids = idselective();
$countelective = countelective();
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
?>
<section data-url="<?php echo $url?>" class='finalsim'>
<span>note:you can take only 2 elective</span>
 <h2>hello <?php echo $name?></h2>
 <hr/>
 <div class='con'>
 <?php
foreach ($newarr as $row) {
    $id = $row['id'];
    $uname = $row['name'];
  echo "<div class='subject' data-id='$id'>
   <h3> $uname </h3> 
   <button>take it </button>
   </div>";
}

?>
</div>
</section>
<?php
include "app/includes/views/footer.php";
ob_end_flush();
?>