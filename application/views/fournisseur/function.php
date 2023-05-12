<?php
header("Content-Type: application/json");
include('connexion.php');
function Entana($a,$b){
     echo $sql="SELECT designation as designation, nombre as nombre, prixe as montant FROM v_liststock where idfournisseur='$a' and designation='$b'";
    //$sql="select entana.designation as designation, stockfournisseur.nombre as nombre, stockfournisseur.prix as montant from stockfournisseur join entana on stockfournisseur.identana=entana.identana where idfournisseur='$a' and entana.designation='$b'";
    // SELECT designation as designation, nombre as nombre, prixe as montant FROM v_liststock where idfournisseur='1' and designation='Ordinateur Portable'

    $c=dbconnect();
$result = $c->query($sql);
$row = array();

while($ligne=$result->fetch()){
array_push($row,$ligne);
}
 return $row;
}

function Insert($id,$designe,$nombre,$montant){
    $c=dbconnect();
    echo $sql="INSERT INTO  Proforma Values ('$id','$designe','$nombre','$montant')";
    $csx =$c->query($sql);

return  $sql;

}

// function Inserta($id,$idfournisseur){
//     $c=dbconnect();
//     $sql="INSERT INTO  ProformaFournisseur Values ('$id','$idfournisseur')";
//     $csx =$c->query($sql);

// return $sql;

// }

function Save($id,$idfournisseur){
    $c=dbconnect();
    $sql2="INSERT INTO  ProformaFournisseur Values ('$id','$idfournisseur')";
    $csx =$c->query($sql2);
    $i=$id+1;
    $sql="Update idProforma set id='$i'";
    $csx =$c->query($sql);

return  $sql;

}
// function Save($id){
//     $i=$id+1;
//     $c=dbconnect();
//     $sql="Update idProforma set id='$i'";
//     $csx =$c->query($sql);

// return  $sql;

// }
   

?>