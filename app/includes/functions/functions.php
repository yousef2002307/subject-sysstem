<?php
function idselective(){
    global $db;
    $ids = array();
    $stmt4 = $db->prepare('SELECT * FROM `materials` WHERE status = 1');
    $stmt4->execute();
    $rowelective = $stmt4->fetchAll();
    foreach ($rowelective as $key => $value) {
       array_push($ids,$value['id']);

    }
    return $ids;
}
function countelective(){
    global $db;
    $ids = array();
    $stmt4 = $db->prepare('SELECT * FROM `materials` WHERE status = 1');
    $stmt4->execute();
    $rowelective = $stmt4->fetchAll();
    foreach ($rowelective as $key => $value) {
       array_push($ids,$value['id']);

    }
   $count = 0;
   for ($i=0; $i < count($ids) ; $i++) { 
    if(in_array($ids[$i],$_SESSION['arr'])){
        $count++;
    }
   }
   return $count;
}

?>