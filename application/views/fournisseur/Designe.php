<?php
header("Content-Type: application/json");
include('function.php');

$a=1;

$tab=array();
$tab=Entana($a,$info);


echo json_encode($tab);
?>