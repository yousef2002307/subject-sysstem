<?php
session_start();
$val = $_POST['val'];
$id = $_POST['id'];
if($id  ==  1){
$_SESSION['username'] = $val;
}

?>