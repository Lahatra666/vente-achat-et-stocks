<?php
header("Content-Type: application/json");
include('function.php');
$tab=Save($info,$idfournisseur);
echo $tab;



?>